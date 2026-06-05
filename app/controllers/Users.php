<?php
class Users extends Controller {
    private $userModel;
    private $abstractModel;
    private $inscriptionModel;

    public function __construct() {
        $this->userModel = $this->model('User');
        $this->abstractModel = $this->model('AbstractModel');
        $this->inscriptionModel = $this->model('Inscription');
        $this->notificationModel = $this->model('Notification');
    }

    public function register() {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            validate_csrf();
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            // Init data and force uppercase (except password)
            $data = [
                'name' => mb_strtoupper(trim($_POST['name']), 'UTF-8'),
                'email' => mb_strtoupper(trim($_POST['email']), 'UTF-8'),
                'dni' => mb_strtoupper(trim($_POST['dni']), 'UTF-8'),
                'university' => mb_strtoupper(trim($_POST['university']), 'UTF-8'),
                'professional_school' => mb_strtoupper(trim($_POST['professional_school']), 'UTF-8'),
                'phone' => mb_strtoupper(trim($_POST['phone']), 'UTF-8'),
                'department' => mb_strtoupper(trim($_POST['department']), 'UTF-8'),
                'user_category' => mb_strtoupper(trim($_POST['user_category']), 'UTF-8'),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'dni_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'category_err' => ''
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = _t('alerts.email_required');
            } else {
                // Check email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = _t('alerts.email_exists');
                }
            }

            // Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = _t('alerts.name_required');
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = _t('alerts.password_required');
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = _t('alerts.password_min');
            }

            // Validate Confirm Password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = _t('alerts.confirm_password_required');
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = _t('alerts.passwords_dont_match');
                }
            }

            // Validate User Category
            if (empty($data['user_category'])) {
                $data['category_err'] = _t('alerts.category_required');
            }

            // Validate Google reCAPTCHA
            if (empty($_POST['g-recaptcha-response'])) {
                $data['category_err'] = _t('alerts.recaptcha_required');
            } else {
                $url = 'https://www.google.com/recaptcha/api/siteverify';
                $fields = [
                    'secret'   => RECAPTCHA_SECRET_KEY,
                    'response' => $_POST['g-recaptcha-response'],
                    'remoteip' => $_SERVER['REMOTE_ADDR']
                ];

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
                $response = curl_exec($ch);
                curl_close($ch);

                $response_data = json_decode($response, true);
                
                // Permitir bypass en localhost si la respuesta de Google falla por SSL o conectividad local
                $isLocal = (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false);
                
                if (!$isLocal && (empty($response_data) || !$response_data['success'])) {
                    $data['category_err'] = _t('alerts.recaptcha_invalid');
                }
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['category_err'])) {
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->userModel->register($data)) {
                    flash('register_success', _t('alerts.register_success'));
                    redirect('users/login');
                } else {
                    die('Algo salió mal');
                }
            } else {
                // If there are validation errors, pick the first one and notify
                $errorMsg = !empty($data['email_err']) ? $data['email_err'] : 
                           (!empty($data['password_err']) ? $data['password_err'] : 
                           (!empty($data['confirm_password_err']) ? $data['confirm_password_err'] : 
                           (!empty($data['category_err']) ? $data['category_err'] : 'Error en el registro')));
                
                flash('register_error', $errorMsg, 'alert alert-danger');
                redirect('pages/inscriptions');
            }

        } else {
            // If someone tries to access /users/register directly by GET, send them to inscriptions
            redirect('pages/inscriptions');
        }
    }

    public function login() {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            validate_csrf();
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            // Init data
            $data = [
                'email' => mb_strtoupper(trim($_POST['email']), 'UTF-8'),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = _t('alerts.email_required');
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = _t('alerts.password_required');
            }

            // Check for user/email
            if ($this->userModel->findUserByEmail($data['email'])) {
                // User found
            } else {
                // User not found
                $data['email_err'] = _t('alerts.user_not_found');
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    // Solo bloqueamos al admin si queremos que use otra entrada, 
                    // pero permitimos que los verificadores pasen
                    if ($loggedInUser->role == 'admin') {
                        $data['password_err'] = 'Acceso denegado para administradores en esta sección.';
                        $this->view('users/login', $data);
                        return;
                    }
                    // Set flag to force preloader on next page load
                    $_SESSION['force_preloader'] = true;
                    // Create Session
                    $this->createUserSession($loggedInUser, $_POST['next'] ?? '');
                } else {
                    $data['password_err'] = _t('alerts.password_incorrect');
                    $this->view('users/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }

        } else {
            // Init data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
                'title' => 'Ingreso al Sistema | ONTA PERU 2026',
                'description' => 'Inicia sesión en tu cuenta del congreso ONTA para gestionar tus inscripciones y resúmenes científicos.'
            ];

            // Load view
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user, $next = '') {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_role'] = $user->role;
        $_SESSION['user_category'] = $user->user_category;

        // Redirigir según el rol de forma específica
        if ($_SESSION['user_role'] == 'admin') {
            redirect('onta_admin/dashboard');
        } elseif ($_SESSION['user_role'] == 'verifier') {
            redirect('verifiers/dashboard');
        } elseif ($_SESSION['user_role'] == 'reviewer') {
            redirect('reviewers/dashboard');
        } else {
            if (!empty($next)) {
                redirect('users/dashboard#' . $next);
            } else {
                // Forzar hash de welcome para asegurar que el JS del dashboard lo capture correctamente
                redirect('users/dashboard#welcome');
            }
        }
    }

    public function dashboard() {
        // Prevent browser caching so "Back" button doesn't show dashboard after logout
        header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
        header("Pragma: no-cache"); // HTTP 1.0.
        header("Expires: 0"); // Proxies.

        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }

        // Bloquear acceso de verificadores y revisores al dashboard de usuarios
        if ($_SESSION['user_role'] == 'verifier') {
            redirect('verifiers/dashboard');
            exit();
        }
        if ($_SESSION['user_role'] == 'reviewer') {
            redirect('reviewers/dashboard');
            exit();
        }

        // Obtener los datos del usuario y sus resúmenes para pasarlos a la vista
        $user = $this->userModel->getUserById($_SESSION['user_id']);
        $abstracts = $this->abstractModel->getAbstractsByUserId($_SESSION['user_id']);
        $inscriptions = $this->inscriptionModel->getInscriptionsByUserId($_SESSION['user_id']);
        
        $pago_status = 'Pendiente';
        if (!empty($inscriptions)) {
            // Assuming the first inscription record holds the current status
            $pago_status = ucfirst(strtolower($inscriptions[0]->payment_status));
        }

        // Actualizar sesión con datos frescos de la DB por si hubo cambios administrativos
        $_SESSION['user_category'] = $user->user_category;
        $_SESSION['user_name'] = $user->name;

        $data = [
            'user' => $user,
            'abstracts' => $abstracts,
            'inscription' => !empty($inscriptions) ? $inscriptions[0] : null,
            'pago_status' => $pago_status,
            'total_resumenes' => count($abstracts),
            'notifications' => $this->notificationModel->getNotifications($_SESSION['user_id'])
        ];

        $this->view('users/dashboard', $data);
    }

    public function submitAbstract() {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            validate_csrf();
            // 1. Verificar si ya tiene un resumen enviado
            $existing = $this->abstractModel->getAbstractsByUserId($_SESSION['user_id']);
            if (!empty($existing)) {
                flash('abstract_error', _t('alerts.abstract_limit'), 'alert alert-danger');
                redirect('users/dashboard#resumenes');
                return;
            }

            // 2. Generar Código Único de 8 dígitos
            $tracking_code = '';
            $is_unique = false;
            while (!$is_unique) {
                $tracking_code = str_pad(mt_rand(10000000, 99999999), 8, '0', STR_PAD_LEFT);
                $is_unique = $this->abstractModel->isCodeUnique($tracking_code);
            }

            // Validate incoming PDF
            $archivo_pdf = '';
            if (isset($_FILES['file_resumen']) && $_FILES['file_resumen']['error'] == 0) {
                $file = $_FILES['file_resumen'];
                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                
                // 5MB limit
                $max_size = 5 * 1024 * 1024;

                if (strtolower($ext) == 'pdf' && $file['size'] <= $max_size) {
                    // Cargar pdf
                    $upload_dir = dirname(dirname(dirname(__FILE__))) . '/public/uploads/abstracts/';
                    if (!is_dir($upload_dir)) {
                        mkdir($upload_dir, 0777, true);
                    }
                    
                    // Obtener los datos del usuario para nombre riguroso
                    $user = $this->userModel->getUserById($_SESSION['user_id']);
                    $nombre_limpio = str_replace(' ', '_', strtoupper(trim($user->name)));
                    $nombre_limpio = preg_replace('/[^A-Z0-9_]/', '', $nombre_limpio); 
                    
                    // Incluir tracking code en el nombre del archivo
                    $filename = $tracking_code . '_' . $nombre_limpio . '.pdf';
                    
                    move_uploaded_file($file['tmp_name'], $upload_dir . $filename);
                    $archivo_pdf = $filename;
                }
            }

            // Datos estructurados convertidos a MAYÚSCULAS según reglas, menos correo
            $data = [
                'user_id' => $_SESSION['user_id'],
                'titulo' => mb_strtoupper(trim($_POST['titulo']), 'UTF-8'),
                'autores' => mb_strtoupper(trim($_POST['autores']), 'UTF-8'),
                'afiliacion' => mb_strtoupper(trim($_POST['afiliacion']), 'UTF-8'),
                'correo' => strtolower(trim($_POST['correo'])),
                'keywords' => mb_strtoupper(trim($_POST['keywords']), 'UTF-8'),
                'linea_investigacion' => trim($_POST['linea_investigacion']),
                'archivo_pdf' => $archivo_pdf,
                'codigo_seguimiento' => $tracking_code
            ];

            if ($this->abstractModel->submit($data)) {
                $successMsg = str_replace(':code', $tracking_code, _t('alerts.abstract_success'));
                flash('abstract_success', $successMsg);
                header('Location: ' . URLROOT . '/users/dashboard#resumenes');
                exit();
            } else {
                die('Error en el servidor al guardar el resumen científico.');
            }
        } else {
            redirect('users/dashboard');
        }
    }

    public function updateProfile() {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            validate_csrf();
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            // Obtener datos actuales para no sobreescribir con vacíos si el formulario es parcial (ej: revisores)
            $currentUser = $this->userModel->getUserById($_SESSION['user_id']);

            $data = [
                'id' => $_SESSION['user_id'],
                'name' => !empty($_POST['name']) ? mb_strtoupper(trim($_POST['name']), 'UTF-8') : $currentUser->name,
                'phone' => isset($_POST['phone']) ? mb_strtoupper(trim($_POST['phone']), 'UTF-8') : $currentUser->phone,
                'university' => isset($_POST['university']) ? mb_strtoupper(trim($_POST['university']), 'UTF-8') : $currentUser->university,
                'professional_school' => isset($_POST['professional_school']) ? mb_strtoupper(trim($_POST['professional_school']), 'UTF-8') : $currentUser->professional_school,
                'department' => isset($_POST['department']) ? mb_strtoupper(trim($_POST['department']), 'UTF-8') : $currentUser->department,
                'password' => !empty($_POST['password']) ? password_hash(trim($_POST['password']), PASSWORD_DEFAULT) : ''
            ];

            if ($this->userModel->updateProfile($data)) {
                flash('profile_updated', _t('alerts.profile_updated'));
                
                // Actualizar nombre en sesión si cambió
                $_SESSION['user_name'] = $data['name'];

                // Redirigir según el rol para que se quede en su dashboard
                if ($_SESSION['user_role'] == 'reviewer') {
                    redirect('reviewers/dashboard#perfil');
                } elseif ($_SESSION['user_role'] == 'verifier') {
                    redirect('verifiers/dashboard#perfil');
                } else {
                    redirect('users/dashboard#perfil');
                }
                exit();
            } else {
                die('Error al actualizar el perfil.');
            }
        } else {
            redirect('users/dashboard');
        }
    }

    public function logout() {
        // Unset all session values
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
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
        
        redirect('users/login');
        exit;
    }
}
