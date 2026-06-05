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
                // Aquí iría la llamada al API de Culqi para hacer el cargo real
                // Por ahora, como es prueba local, simulamos éxito
                
                $data = [
                    'user_id' => $_SESSION['user_id'],
                    'transaction_id' => 'CULQI_TEST_' . time(),
                    'amount' => $request->amount / 100 // Culqi usa céntimos
                ];

                if ($this->inscriptionModel->processCulqiPayment($data)) {
                    // Agregar notificación real a la BD
                    $this->notificationModel->add(
                        $_SESSION['user_id'], 
                        'Pago realizado con éxito', 
                        'Su pago mediante Culqi ha sido verificado instantáneamente. ¡Bienvenido a ONTA 2026!',
                        'payment'
                    );

                    $_SESSION['payment_submitted'] = true;
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error en base de datos']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Datos inválidos']);
            }
        }
    }
}
