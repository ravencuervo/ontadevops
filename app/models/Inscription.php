<?php
class Inscription {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Register Inscription
    public function register($data) {
        $this->db->query('INSERT INTO inscriptions (user_id, full_name, email, phone, country, institution, payment_receipt) VALUES(:user_id, :full_name, :email, :phone, :country, :institution, :payment_receipt)');
        // Bind values
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':full_name', $data['full_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':country', $data['country']);
        $this->db->bind(':institution', $data['institution']);
        $this->db->bind(':payment_receipt', $data['payment_receipt']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Get Inscriptions by User ID
    public function getInscriptionsByUserId($user_id) {
        $this->db->query('SELECT * FROM inscriptions WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);

        return $this->db->resultSet();
    }

    // Get All Inscriptions (for Admin)
    public function getAllInscriptions() {
        $this->db->query('SELECT i.*, u.dni 
                          FROM inscriptions i 
                          JOIN users u ON i.user_id = u.id 
                          ORDER BY i.created_at DESC');
        return $this->db->resultSet();
    }

    // Get Inscription by ID
    public function getInscriptionById($id) {
        $this->db->query('SELECT * FROM inscriptions WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // Update Status
    public function updateStatus($id, $status) {
        $this->db->query('UPDATE inscriptions SET payment_status = :status WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Process BCP Payment (Upsert logic)
    public function processBcpPayment($data) {
        try {
            // 1. Verificar si ya existe un registro para este usuario
            $this->db->query('SELECT id FROM inscriptions WHERE user_id = :user_id');
            $this->db->bind(':user_id', $data['user_id']);
            $exists = $this->db->single();

            if ($exists) {
                // 2. Si existe, ACTUALIZAMOS
                $this->db->query('UPDATE inscriptions SET 
                    payment_method = :payment_method,
                    operation_number = :operation_number,
                    payer_dni = :payer_dni,
                    payment_date = :payment_date,
                    amount = :amount,
                    payment_receipt = :payment_receipt,
                    payment_status = "pending"
                    WHERE user_id = :user_id');
            } else {
                // 3. Si NO existe, JALAMOS datos de users y CREAMOS el registro
                $this->db->query('SELECT name, email, phone, university as institution FROM users WHERE id = :user_id');
                $this->db->bind(':user_id', $data['user_id']);
                $user = $this->db->single();

                $this->db->query('INSERT INTO inscriptions 
                    (user_id, full_name, email, phone, institution, payment_method, operation_number, payer_dni, payment_date, amount, payment_receipt, payment_status) 
                    VALUES (:user_id, :full_name, :email, :phone, :institution, :payment_method, :operation_number, :payer_dni, :payment_date, :amount, :payment_receipt, "pending")');
                
                $this->db->bind(':full_name', $user->name);
                $this->db->bind(':email', $user->email);
                $this->db->bind(':phone', $user->phone);
                $this->db->bind(':institution', $user->institution);
            }
            
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':payment_method', 'bcp');
            $this->db->bind(':operation_number', $data['operation_number']);
            $this->db->bind(':payer_dni', $data['payer_dni']);
            $this->db->bind(':payment_date', $data['payment_date']);
            $this->db->bind(':amount', $data['amount']);
            $this->db->bind(':payment_receipt', $data['payment_receipt']);

            return $this->db->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    // Process Culqi Payment (Upsert logic)
    public function processCulqiPayment($data) {
        try {
            // 1. Verificar si ya existe
            $this->db->query('SELECT id FROM inscriptions WHERE user_id = :user_id');
            $this->db->bind(':user_id', $data['user_id']);
            $exists = $this->db->single();

            if ($exists) {
                // 2. Actualizar
                $this->db->query('UPDATE inscriptions SET 
                    payment_method = :payment_method,
                    transaction_id = :transaction_id,
                    amount = :amount,
                    payment_status = "verified"
                    WHERE user_id = :user_id');
            } else {
                // 3. Insertar nuevo jalando datos del usuario
                $this->db->query('SELECT name, email, phone, university as institution FROM users WHERE id = :user_id');
                $this->db->bind(':user_id', $data['user_id']);
                $user = $this->db->single();

                $this->db->query('INSERT INTO inscriptions 
                    (user_id, full_name, email, phone, institution, payment_method, transaction_id, amount, payment_status) 
                    VALUES (:user_id, :full_name, :email, :phone, :institution, :payment_method, :transaction_id, :amount, "verified")');
                
                $this->db->bind(':full_name', $user->name);
                $this->db->bind(':email', $user->email);
                $this->db->bind(':phone', $user->phone);
                $this->db->bind(':institution', $user->institution);
            }
            
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':payment_method', 'culqi');
            $this->db->bind(':transaction_id', $data['transaction_id']);
            $this->db->bind(':amount', $data['amount']);

            return $this->db->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    // Delete inscription
    public function delete($id) {
        $this->db->query('DELETE FROM inscriptions WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
