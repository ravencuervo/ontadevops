<?php
class Onta_admin extends Controller {
    
    private $userModel;
    private $abstractModel;
    private $inscriptionModel;
    private $notificationModel;
    
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->abstractModel = $this->model('AbstractModel');
        $this->inscriptionModel = $this->model('Inscription');
        $this->notificationModel = $this->model('Notification');
    }

    public function index() {
        if ($this->isAdminLoggedIn()) {
            redirect('onta_admin/dashboard');
        }

        $data = [
            'email' => '',
            'password' => '',
            'email_err' => '',
            'password_err' => ''
        ];

        $this->view('admin/login', $data);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            
            $data = [
                'email' => mb_strtoupper(trim($_POST['email']), 'UTF-8'),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];

            if (empty($data['email'])) {
                $data['email_err'] = 'Por favor ingrese su correo';
            }
            if (empty($data['password'])) {
                $data['password_err'] = 'Por favor ingrese su contraseña';
            }

            if (empty($data['email_err']) && empty($data['password_err'])) {
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    // Check role for admin
                    if ($loggedInUser->role == 'admin') {
                        // Set flag to force preloader on next page load
                        $_SESSION['force_preloader'] = true;
                        $this->createAdminSession($loggedInUser);
                    } else {
                        $data['password_err'] = 'Correo o contraseña incorrectos';
                        $this->view('admin/login', $data);
                    }
                } else {
                    $data['password_err'] = 'Correo o contraseña incorrectos';
                    $this->view('admin/login', $data);
                }
            } else {
                $this->view('admin/login', $data);
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];
            $this->view('admin/login', $data);
        }
    }

    public function createAdminSession($user) {
        $_SESSION['admin_id'] = $user->id;
        $_SESSION['admin_email'] = $user->email;
        $_SESSION['admin_name'] = $user->name;
        // Optional session security tokens
        redirect('onta_admin/dashboard');
    }

    public function logout() {
        // Unset all session values
        $_SESSION = array();

        // Kill the session cookie
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();
        
        // Start a new session just for the preloader flag
        session_start();
        $_SESSION['force_preloader'] = true;

        redirect('onta_admin');
        exit;
    }

    public function dashboard() {
        // Prevent browser caching so "Back" button doesn't show dashboard after logout
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");

        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        // Obtener datos para el panel
        $abstracts = $this->abstractModel->getAllAbstracts();
        $inscriptions = $this->inscriptionModel->getAllInscriptions();
        $users = $this->userModel->getAllUsers();

        // Estadísticas para Gráficos
        $stats = [
            'users_by_category' => [
                'nacional' => 0,
                'extranjero' => 0,
                'miembro_onta' => 0,
                'no_miembro' => 0
            ],
            'payments_by_status' => [
                'aprobado' => 0,
                'pendiente' => 0,
                'rechazado' => 0,
                'observado' => 0
            ],
            'abstracts_by_status' => [
                'en_reunion' => 0,
                'aprobado' => 0,
                'rechazado' => 0,
                'observado' => 0
            ]
        ];

        foreach($users as $u) {
            if(isset($stats['users_by_category'][$u->user_category])) {
                $stats['users_by_category'][$u->user_category]++;
            }
        }

        foreach($inscriptions as $i) {
            $st = strtolower($i->payment_status);
            if(in_array($st, ['aprobado','verified','success'])) $st = 'aprobado';
            if(isset($stats['payments_by_status'][$st])) {
                $stats['payments_by_status'][$st]++;
            }
        }

        foreach($abstracts as $a) {
            $st = strtolower($a->estado);
            if(isset($stats['abstracts_by_status'][$st])) {
                $stats['abstracts_by_status'][$st]++;
            }
        }

        $data = [
            'abstracts' => $abstracts,
            'inscriptions' => $inscriptions,
            'users' => $users,
            'stats' => $stats
        ];
        $this->view('admin/dashboard', $data);
    }

    public function updateAbstractStatus() {
        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['abstract_id'];
            $status = $_POST['status']; // 'pendiente', 'aprobado', 'rechazado'
            
            if ($this->abstractModel->updateStatus($id, $status)) {
                // Redirigir de vuelta al panel de resúmenes
                header('Location: ' . URLROOT . '/onta_admin/dashboard#resumenes');
                exit();
            } else {
                die('Error al actualizar el estado del resumen.');
            }
        } else {
            redirect('onta_admin/dashboard');
        }
    }

    public function updateInscriptionStatus() {
        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['inscription_id'];
            $status = $_POST['status']; // 'pendiente', 'aprobado', 'rechazado'
            
            if ($this->inscriptionModel->updateStatus($id, $status)) {
                
                // Notificar al usuario si el pago fue aprobado
                if ($status == 'aprobado') {
                    $ins = $this->inscriptionModel->getInscriptionById($id);
                    if ($ins) {
                        $this->notificationModel->add(
                            $ins->user_id, 
                            '¡Pago Validado!', 
                            'Su pago ha sido validado con éxito. Ya puede descargar sus credenciales de acceso.', 
                            'payment'
                        );
                    }
                }

                // Redirigir de vuelta al panel de pagos
                header('Location: ' . URLROOT . '/onta_admin/dashboard#pagos');
                exit();
            } else {
                die('Error al actualizar el estado de pago.');
            }
        } else {
            redirect('onta_admin/dashboard');
        }
    }

    public function handlePaymentAction() {
        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['inscription_id'];
            $status = $_POST['status'];
            $message = trim($_POST['message']);
            
            // 1. Actualizar estado
            if ($this->inscriptionModel->updateStatus($id, $status)) {
                
                // 2. Obtener datos de la inscripción para saber el user_id
                $ins = $this->inscriptionModel->getInscriptionById($id);
                
                if ($ins) {
                    // 3. Crear notificación para el usuario
                    $title = ($status == 'observado') ? 'Pago Observado' : 'Pago Rechazado';
                    
                    // Corregido: pasar argumentos individuales según el modelo
                    $this->notificationModel->add($ins->user_id, $title, $message, 'payment');
                }

                header('Location: ' . URLROOT . '/onta_admin/dashboard#pagos');
                exit();
            } else {
                die('Error al procesar la acción de pago.');
            }
        }
    }

    public function exportPaymentsExcel() {
        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        $inscriptions = $this->inscriptionModel->getAllInscriptions();
        
        $filename = "pagos_onta2026_" . date('Y-m-d') . ".csv";
        
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $filename);
        
        $output = fopen('php://output', 'w');
        
        // UTF-8 BOM for Excel to recognize special characters correctly
        fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
        
        // Headers
        fputcsv($output, [
            'ID', 
            'Fecha Registro', 
            'Nombre Completo', 
            'DNI Participante',
            'Institución', 
            'Método Pago', 
            'Num Operación / Transacción', 
            'DNI Pagador', 
            'Monto ($)', 
            'Fecha Pago Informada', 
            'Estado'
        ], ';');
        
        foreach ($inscriptions as $ins) {
            fputcsv($output, [
                $ins->id,
                $ins->created_at,
                $ins->full_name,
                $ins->dni,
                $ins->institution,
                strtoupper($ins->payment_method),
                $ins->operation_number ?? $ins->transaction_id,
                $ins->payer_dni,
                $ins->amount,
                $ins->payment_date,
                strtoupper($ins->payment_status)
            ], ';');
        }
        
        fclose($output);
        exit();
    }

    public function exportUsersExcel() {
        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        $users = $this->userModel->getAllUsers();
        
        $filename = "usuarios_onta2026_" . date('Y-m-d') . ".csv";
        
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $filename);
        
        $output = fopen('php://output', 'w');
        fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
        
        fputcsv($output, ['ID', 'Nombre', 'Email', 'DNI', 'Teléfono', 'Institución', 'Escuela', 'Departamento', 'Categoría', 'Rol', 'Fecha Registro'], ';');
        
        foreach ($users as $u) {
            fputcsv($output, [
                $u->id,
                $u->name,
                $u->email,
                $u->dni,
                $u->phone,
                $u->university,
                $u->professional_school,
                $u->department,
                strtoupper($u->user_category),
                $u->role,
                $u->created_at
            ], ';');
        }
        
        fclose($output);
        exit();
    }

    public function exportAbstractsExcel() {
        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        $abstracts = $this->abstractModel->getAllAbstracts();
        
        $filename = "resumenes_onta2026_" . date('Y-m-d') . ".csv";
        
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $filename);
        
        $output = fopen('php://output', 'w');
        fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
        
        fputcsv($output, ['ID', 'Código', 'Fecha Envío', 'Título', 'Autores', 'Afiliación', 'Email Contacto', 'Keywords', 'Línea', 'Estado'], ';');
        
        foreach ($abstracts as $a) {
            fputcsv($output, [
                $a->id,
                $a->codigo_seguimiento,
                $a->fecha_envio,
                $a->titulo,
                $a->autores,
                $a->afiliacion,
                $a->correo,
                $a->keywords,
                $a->linea_investigacion,
                strtoupper($a->estado)
            ], ';');
        }
        
        fclose($output);
        exit();
    }

    public function deleteUser($id) {
        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->userModel->deleteUser($id)) {
                redirect('onta_admin/dashboard#usuarios');
            } else {
                die('Algo salió mal al eliminar el usuario');
            }
        } else {
            redirect('onta_admin/dashboard');
        }
    }

    public function deleteAbstract($id) {
        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->abstractModel->delete($id)) {
                redirect('onta_admin/dashboard#resumenes');
            } else {
                die('Algo salió mal al eliminar el resumen');
            }
        } else {
            redirect('onta_admin/dashboard');
        }
    }

    public function deleteInscription($id) {
        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->inscriptionModel->delete($id)) {
                redirect('onta_admin/dashboard#pagos');
            } else {
                die('Algo salió mal al eliminar la inscripción');
            }
        } else {
            redirect('onta_admin/dashboard');
        }
    }

    public function getUserJson($id) {
        if (!$this->isAdminLoggedIn()) {
            http_response_code(403);
            exit();
        }

        $user = $this->userModel->getUserById($id);
        $abstracts = $this->abstractModel->getAbstractsByUserId($id);
        $inscriptions = $this->inscriptionModel->getInscriptionsByUserId($id);
        $notifications = $this->notificationModel->getNotifications($id);

        header('Content-Type: application/json');
        echo json_encode([
            'user' => $user,
            'abstracts' => $abstracts,
            'inscriptions' => $inscriptions,
            'notifications' => $notifications
        ]);
        exit();
    }

    public function updateUser() {
        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $_POST['id'],
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'dni' => trim($_POST['dni']),
                'phone' => trim($_POST['phone']),
                'university' => trim($_POST['university']),
                'professional_school' => trim($_POST['professional_school']),
                'department' => trim($_POST['department']),
                'user_category' => $_POST['user_category'],
                'role' => $_POST['role'],
                'password' => !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : ''
            ];

            if ($this->userModel->updateByAdmin($data)) {
                redirect('onta_admin/dashboard#usuarios');
            } else {
                die('Error al actualizar el usuario');
            }
        }
    }

    public function addUser() {
        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => trim($_POST['name']),
                'email' => mb_strtoupper(trim($_POST['email']), 'UTF-8'),
                'dni' => trim($_POST['dni']),
                'phone' => trim($_POST['phone']),
                'university' => trim($_POST['university']),
                'professional_school' => trim($_POST['professional_school']),
                'department' => trim($_POST['department']),
                'user_category' => $_POST['user_category'],
                'role' => $_POST['role'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
            ];

            try {
                if ($this->userModel->createByAdmin($data)) {
                    redirect('onta_admin/dashboard#usuarios');
                } else {
                    // Si falla por duplicado u otro motivo
                    echo "<script>alert('Error: El correo o DNI ya están registrados.'); window.location.href='".URLROOT."/onta_admin/dashboard#usuarios';</script>";
                }
            } catch (Exception $e) {
                die("Error crítico en la base de datos: " . $e->getMessage());
            }
        }
    }

    public function getAbstractJson($id) {
        if (!$this->isAdminLoggedIn()) {
            http_response_code(403);
            exit();
        }

        $abstract = $this->abstractModel->getAbstractById($id);
        header('Content-Type: application/json');
        echo json_encode($abstract);
        exit();
    }

    public function updateAbstract() {
        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $_POST['id'],
                'titulo' => trim($_POST['titulo']),
                'autores' => trim($_POST['autores']),
                'afiliacion' => trim($_POST['afiliacion']),
                'correo' => trim($_POST['correo']),
                'keywords' => trim($_POST['keywords']),
                'linea_investigacion' => $_POST['linea_investigacion']
            ];

            if ($this->abstractModel->update($data)) {
                redirect('onta_admin/dashboard#resumenes');
            } else {
                die('Error al actualizar el resumen');
            }
        }
    }

    private function isAdminLoggedIn() {
        if (isset($_SESSION['admin_id'])) {
            return true;
        }
        
        if (isset($_SESSION['user_id']) && isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
            return true;
        }
        return false;
    }
}
