<?php
class Payments extends Controller {
    private $inscriptionModel;
    private $userModel;

    public function __construct() {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->inscriptionModel = $this->model('Inscription');
        $this->userModel = $this->model('User');
        $this->notificationModel = $this->model('Notification');
    }

    // Process BCP Voucher Upload
    public function bcp() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Verificar CSRF antes de procesar
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                flash('payment_error', 'Error de seguridad (Sesión expirada). Por favor, intente de nuevo.', 'alert alert-danger');
                redirect('users/dashboard#pagos');
                return;
            }

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            $data = [
                'user_id' => $_SESSION['user_id'],
                'operation_number' => trim($_POST['operation_number']),
                'payer_dni' => trim($_POST['payer_dni']),
                'payment_date' => trim($_POST['payment_date']),
                'amount' => trim($_POST['amount']),
                'payment_receipt' => ''
            ];

            // Handle File Upload
            if (isset($_FILES['voucher_file']) && $_FILES['voucher_file']['error'] == 0) {
                $file = $_FILES['voucher_file'];
                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png', 'pdf'];

                if (in_array($ext, $allowed)) {
                    $user = $this->userModel->getUserById($_SESSION['user_id']);
                    $dni = $user->dni;

                    $upload_dir = PUBROOT . '/uploads/vouchers/';
                    if (!is_dir($upload_dir)) {
                        mkdir($upload_dir, 0777, true);
                    }

                    $filename = 'voucher_' . $_SESSION['user_id'] . '_' . time() . '.' . $ext;
                    if (move_uploaded_file($file['tmp_name'], $upload_dir . $filename)) {
                        $data['payment_receipt'] = $filename;
                    } else {
                        flash('payment_error', 'Error crítico: No se pudo mover el archivo al servidor. Verifique permisos de carpeta.', 'alert alert-danger');
                        redirect('users/dashboard#pagos');
                        return;
                    }
                } else {
                    flash('payment_error', 'Formato no permitido. Solo se aceptan JPG, PNG o PDF.', 'alert alert-danger');
                    redirect('users/dashboard#pagos');
                    return;
                }
            } else {
                $error_msg = 'No se seleccionó ningún archivo o el archivo es demasiado grande.';
                if(isset($_FILES['voucher_file'])) {
                    $error_msg .= ' Error Code: ' . $_FILES['voucher_file']['error'];
                }
                flash('payment_error', $error_msg, 'alert alert-danger');
                redirect('users/dashboard#pagos');
                return;
            }

            if (!empty($data['payment_receipt']) && $this->inscriptionModel->processBcpPayment($data)) {
                // Agregar notificación real a la BD
                $this->notificationModel->add(
                    $_SESSION['user_id'], 
                    'Pago en proceso de verificación', 
                    'Hemos recibido su información de pago (BCP). Se le notificará dentro de las 24 horas si se confirma su registro.',
                    'payment'
                );

                $_SESSION['payment_submitted'] = true;
                flash('payment_success', 'Voucher enviado correctamente. El administrador lo revisará pronto.');
                redirect('users/dashboard#notificaciones');
            } else {
                flash('payment_error', 'Error en la base de datos: No se pudo registrar la información. Verifique que existan las columnas necesarias.', 'alert alert-danger');
                redirect('users/dashboard#pagos');
            }
        }
    }

    // Process Culqi Payment (Simple version for now)
    public function culqi() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recibir el token de Culqi
            $json = file_get_contents('php://input');
            $request = json_decode($json);

            if (isset($request->token) && isset($request->amount)) {
                // Obtener datos del usuario
                $user = $this->userModel->getUserById($_SESSION['user_id']);
                $email = isset($user->email) ? $user->email : 'cliente@ejemplo.com';

                // Llamada al API de Culqi para crear el cargo real
                $url = 'https://api.culqi.com/v2/charges';
                
                $cat_name = isset($user->user_category) ? $user->user_category : 'N/A';
                $cat_key = strtolower(str_replace(['ñ', ' '], ['n', '_'], $cat_name));
                $translated_category = _t('login.type_' . $cat_key);
                
                // Dividir el nombre del usuario en primer nombre y apellido para client_details
                $name_parts = explode(' ', trim($user->name ?? ''));
                $first_name = $name_parts[0] !== '' ? $name_parts[0] : 'Cliente';
                $last_name = count($name_parts) > 1 ? implode(' ', array_slice($name_parts, 1)) : '-';
                
                // Limpiar el número de teléfono
                $phone_number = isset($user->phone) && !empty($user->phone) ? preg_replace('/[^0-9+]/', '', $user->phone) : '999999999';
                if (empty($phone_number)) {
                    $phone_number = '999999999';
                }

                $culqi_data = [
                    'amount' => $request->amount, // Culqi espera el monto en céntimos
                    'currency_code' => 'USD', // Moneda utilizada (Dólares)
                    'email' => $email,
                    'source_id' => $request->token,
                    'description' => 'Inscripción ONTA 2026 - ' . (isset($user->name) ? $user->name : 'Cliente') . ' (' . $translated_category . ')',
                    'client_details' => [
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'email' => $email,
                        'phone_number' => $phone_number
                    ],
                    'metadata' => [
                        'nombre_cliente' => isset($user->name) ? $user->name : 'N/A',
                        'dni' => isset($user->dni) ? $user->dni : 'N/A',
                        'telefono' => isset($user->phone) ? $user->phone : 'N/A',
                        'institucion' => isset($user->university) ? $user->university : 'N/A'
                    ]
                ];

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Authorization: Bearer ' . CULQI_SECRET_KEY,
                    'Content-Type: application/json'
                ]);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($culqi_data));
                
                $response = curl_exec($ch);
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                $response_data = json_decode($response);

                // Verificar si la respuesta de Culqi fue exitosa
                if ($http_status >= 200 && $http_status < 300 && isset($response_data->object) && $response_data->object === 'charge') {
                    // Éxito real en Culqi
                    $data = [
                        'user_id' => $_SESSION['user_id'],
                        'transaction_id' => $response_data->id, // Guardamos el ID real de Culqi
                        'amount' => $request->amount / 100 // Guardamos el monto real (en USD, no en céntimos)
                    ];

                    if ($this->inscriptionModel->processCulqiPayment($data)) {
                        // Agregar notificación a la BD
                        $this->notificationModel->add(
                            $_SESSION['user_id'], 
                            'Pago realizado con éxito', 
                            'Su pago mediante Culqi ha sido verificado y cobrado correctamente. ¡Bienvenido a ONTA 2026!',
                            'payment'
                        );

                        $_SESSION['payment_submitted'] = true;
                        echo json_encode(['success' => true]);
                    } else {
                        // El cobro en Culqi fue exitoso, pero falló al guardar en DB
                        echo json_encode(['success' => false, 'message' => 'Cobro exitoso en Culqi, pero hubo un error guardando en la base de datos local.']);
                    }
                } else {
                    // Fallo al cobrar en Culqi (ej. fondos insuficientes, tarjeta rechazada)
                    $error_message = isset($response_data->user_message) ? $response_data->user_message : 'Hubo un error al procesar la tarjeta con Culqi.';
                    echo json_encode(['success' => false, 'message' => $error_message]);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Datos inválidos recibidos del token de Culqi.']);
            }
        }
    }
}
