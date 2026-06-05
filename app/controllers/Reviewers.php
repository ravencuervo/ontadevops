<?php
class Reviewers extends Controller {
    public function __construct() {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'reviewer') {
            redirect('users/login');
        }
        $this->abstractModel = $this->model('AbstractModel');
        $this->userModel = $this->model('User');
        $this->notificationModel = $this->model('Notification');
    }

    public function dashboard() {
        $abstracts = $this->abstractModel->getAllAbstracts();
        
        // Estadísticas para los gráficos
        $stats = [
            'total' => count($abstracts),
            'status' => [
                'aprobado' => 0,
                'pendiente' => 0,
                'rechazado' => 0,
                'observado' => 0
            ]
        ];

        foreach ($abstracts as $abs) {
            $st = strtolower($abs->estado);
            if ($st == 'aprobado') $stats['status']['aprobado']++;
            elseif ($st == 'pendiente') $stats['status']['pendiente']++;
            elseif ($st == 'rechazado') $stats['status']['rechazado']++;
            elseif ($st == 'observado') $stats['status']['observado']++;
        }

        $data = [
            'title' => 'Panel de Revisión por Pares | ONTA 2026',
            'abstracts' => $abstracts,
            'stats' => $stats
        ];

        $this->view('reviewers/dashboard', $data);
    }

    public function handleAction() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            validate_csrf();
            
            $id = $_POST['id'];
            $status = $_POST['status'];
            $comment = $_POST['comment'];
            $title = $_POST['title_notif'];

            $abs = $this->abstractModel->getAbstractById($id);

            if ($this->abstractModel->updateStatus($id, $status)) {
                // Notificar al usuario (Argumentos individuales según el modelo)
                $this->notificationModel->add(
                    $abs->user_id, 
                    $title, 
                    $comment, 
                    'abstract'
                );

                flash('reviewer_msg', 'Trabajo actualizado y autor notificado correctamente');
                redirect('reviewers/dashboard#revision');
            } else {
                die('Algo salió mal');
            }
        }
    }

    public function getAbstractJson($id) {
        $abs = $this->abstractModel->getAbstractById($id);
        echo json_encode($abs);
    }
}
