<?php
class Legal extends Controller {
    public function __construct() {
        // Legal pages are public
    }

    public function index() {
        redirect('legal/terminos');
    }

    public function terminos() {
        $data = [
            'title' => 'Términos y Condiciones | ONTA PERU 2026',
            'description' => 'Términos y condiciones de uso y participación para la 56ª Reunión Anual ONTA.'
        ];
        $this->view('legal/terminos', $data);
    }

    public function privacidad() {
        $data = [
            'title' => 'Política de Privacidad | ONTA PERU 2026',
            'description' => 'Política de protección de datos personales y privacidad para los usuarios de ONTA 2026.'
        ];
        $this->view('legal/privacidad', $data);
    }

    public function devoluciones() {
        $data = [
            'title' => 'Política de Devoluciones y Cancelación | ONTA PERU 2026',
            'description' => 'Información sobre reembolsos, devoluciones y cancelaciones de inscripciones para ONTA 2026.'
        ];
        $this->view('legal/devoluciones', $data);
    }

    public function reclamaciones() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $json = file_get_contents('php://input');
            $request = json_decode($json);

            if ($request) {
                $claim_id = "ONTA-" . date('Ymd') . "-" . rand(100, 999);
                $to = COMPANY_EMAIL;
                $subject = "HOJA DE RECLAMACIÓN {$claim_id} - LIBRO VIRTUAL";
                
                $message = "DETALLE DE LA HOJA DE RECLAMACIÓN: {$claim_id}\n";
                $message .= "================================================\n\n";
                $message .= "TIPO: " . strtoupper($request->type) . "\n";
                $message .= "NOMBRE: " . $request->name . "\n";
                $message .= "DNI: " . $request->dni . "\n";
                $message .= "DOMICILIO: " . ($request->address ?? 'No proporcionado') . "\n";
                $message .= "TELEFONO: " . ($request->phone ?? 'No proporcionado') . "\n";
                $message .= "EMAIL: " . $request->email . "\n\n";
                
                $message .= "BIEN O SERVICIO:\n";
                $message .= "SERVICIO: " . ($request->service ?? 'Inscripción') . "\n";
                $message .= "MONTO RECLAMADO: $ " . ($request->amount ?? '0.00') . "\n\n";
                
                $message .= "DETALLE DEL RECLAMO/QUEJA:\n";
                $message .= $request->details . "\n\n";
                
                $message .= "PEDIDO DEL CONSUMIDOR:\n";
                $message .= ($request->request ?? 'No especificado') . "\n\n";
                
                $message .= "================================================\n";
                $message .= "Plazo de respuesta: 30 días calendario.\n";
                
                $headers = "From: " . $to . "\r\n";
                $headers .= "Reply-To: " . $request->email . "\r\n";
                $headers .= "X-Mailer: PHP/" . phpversion();

                // Send email
                @mail($to, $subject, $message, $headers);
                @mail($request->email, "Copia de su Reclamación - {$claim_id}", $message, $headers);
                
                echo json_encode(['success' => true, 'message' => 'Reclamación enviada con éxito', 'id' => $claim_id]);
                return;
            }
            echo json_encode(['success' => false, 'message' => 'Datos inválidos']);
            return;
        }

        $data = [
            'title' => 'Libro de Reclamaciones | ONTA PERU 2026',
            'description' => 'Formulario virtual para el Libro de Reclamaciones de ONTA PERU 2026 conforme a la ley peruana.'
        ];
        $this->view('legal/reclamaciones', $data);
    }
}
