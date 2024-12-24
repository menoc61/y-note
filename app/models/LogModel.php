<?php
namespace App\Models;

use App\Core\Model;

class LogModel extends Model {
    // Get all logs
    public function getAllLogs() {
        $query = "SELECT * FROM logs";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Get log by ID
    public function getLogById($id) {
        $query = "SELECT * FROM logs WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Create a new log
    public function createLog($user_id, $action) {
        $query = "INSERT INTO logs (user_id, action) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("is", $user_id, $action);
        return $stmt->execute();
    }

    // Delete a log
    public function deleteLog($id) {
        $query = "DELETE FROM logs WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>