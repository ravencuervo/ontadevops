<?php
class Notification {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Obtener notificaciones del usuario
    public function getNotifications($user_id) {
        $this->db->query('SELECT * FROM notifications WHERE user_id = :user_id ORDER BY created_at DESC');
        $this->db->bind(':user_id', $user_id);
        return $this->db->resultSet();
    }

    // Crear una nueva notificación
    public function add($user_id, $title, $message, $type = 'info') {
        $this->db->query('INSERT INTO notifications (user_id, title, message, type) VALUES (:user_id, :title, :message, :type)');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':title', $title);
        $this->db->bind(':message', $message);
        $this->db->bind(':type', $type);
        return $this->db->execute();
    }

    // Marcar como leídas
    public function markAsRead($user_id) {
        $this->db->query('UPDATE notifications SET is_read = 1 WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);
        return $this->db->execute();
    }
}
