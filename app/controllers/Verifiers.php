<?php
class Verifiers extends Controller {
    private $userModel;
    private $inscriptionModel;
    private $notificationModel;

    public function __construct() {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'verifier') {
            redirect('users/login');
        }
        $this->userModel = $this->model('User');
        $this->inscriptionModel = $this->model('Inscription');
        $this->notificationModel = $this->model('Notification');
    }

    public function dashboard() {
        $inscriptions = $this->inscriptionModel->getAllInscriptions();
        $users = $this->userModel->getAllUsers();
        
        // Calcular estadísticas para los gráficos
        $stats = [
            'payments_by_status' => [
                'aprobado' => 0,
                'pendiente' => 0,
                'rechazado' => 0,
                'observado' => 0
            ]
        ];

        foreach ($inscriptions as $ins) {
            $st = strtolower($ins->payment_status);
            if (in_array($st, ['aprobado', 'verified', 'success'])) $stats['payments_by_status']['aprobado']++;
            elseif ($st == 'pendiente') $stats['payments_by_status']['pendiente']++;
            elseif ($st == 'rechazado') $stats['payments_by_status']['rechazado']++;
            elseif ($st == 'observado') $stats['payments_by_status']['observado']++;
        }

        $data = [
            'inscriptions' => $inscriptions,
            'users_count' => count($users),
            'stats' => $stats,
            'title' => 'Panel Verificador | ONTA 2026'
        ];

        $this->view('verifiers/dashboard', $data);
    }

    public function getUserJson($id) {
        $user = $this->userModel->getUserById($id);
        $notifications = $this->notificationModel->getNotifications($id);
        $inscriptions = $this->inscriptionModel->getInscriptionsByUserId($id);

        header('Content-Type: application/json');
        echo json_encode([
            'user' => $user,
            'notifications' => $notifications,
            'inscriptions' => $inscriptions
        ]);
        exit();
    }

    public function approve($id) {
        if ($this->inscriptionModel->updateStatus($id, 'aprobado')) {
            $inscription = $this->inscriptionModel->getInscriptionById($id);
            if ($inscription) {
                $this->notificationModel->add(
                    $inscription->user_id,
                    '¡Pago Aprobado!',
                    'Su pago ha sido validado correctamente por el comité organizador. Su acceso total está confirmado.',
                    'payment'
                );
            }
            flash('verifier_msg', 'Pago aprobado y usuario notificado.');
            redirect('verifiers/dashboard');
        }
    }

    public function handleAction() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $status = $_POST['status']; // 'rechazado' u 'observado'
            $message = trim($_POST['message']);

            if ($this->inscriptionModel->updateStatus($id, $status)) {
                $inscription = $this->inscriptionModel->getInscriptionById($id);
                if ($inscription) {
                    $title = ($status == 'rechazado') ? 'Pago Rechazado' : 'Observación de Pago';
                    $type = ($status == 'rechazado') ? 'error' : 'payment';
                    
                    $this->notificationModel->add(
                        $inscription->user_id,
                        $title,
                        $message,
                        $type
                    );
                }

                flash('verifier_msg', 'El pago fue marcado como ' . strtoupper($status) . ' y se notificó al participante.');
                redirect('verifiers/dashboard');
            }
        }
    }

    public function exportExcel() {
        $inscriptions = $this->inscriptionModel->getAllInscriptions();
        $filename = "control_pagos_onta_" . date('Y-m-d') . ".csv";
        
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $filename);
        
        $output = fopen('php://output', 'w');
        // UTF-8 BOM
        fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
        
        fputcsv($output, ['VOUCHER ID', 'USUARIO', 'DNI/PASAPORTE', 'CORREO', 'MÉTODO DE PAGO', 'MONTO ($)', 'N° OPERACIÓN', 'FECHA PAGO', 'ESTADO'], ';');
        
        foreach ($inscriptions as $ins) {
            fputcsv($output, [
                $ins->id,
                $ins->full_name,
                $ins->dni ?? 'N/A',
                $ins->email,
                strtoupper($ins->payment_method),
                $ins->amount,
                $ins->operation_number ?? $ins->transaction_id,
                $ins->payment_date,
                strtoupper($ins->payment_status)
            ], ';');
        }
        
        fclose($output);
        exit();
    }
}

