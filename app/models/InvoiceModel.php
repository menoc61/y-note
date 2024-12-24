<?php
namespace App\Models;

use App\Core\Model;

class InvoiceModel extends Model {
    // Get all invoices
    public function getAllInvoices() {
        $query = "SELECT * FROM invoices";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Get invoice by ID
    public function getInvoiceById($id) {
        $query = "SELECT * FROM invoices WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Create a new invoice
    public function createInvoice($contact_id, $user_id, $amount, $status, $due_date) {
        $query = "INSERT INTO invoices (contact_id, user_id, amount, status, due_date) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("iidss", $contact_id, $user_id, $amount, $status, $due_date);
        return $stmt->execute();
    }

    // Update invoice information
    public function updateInvoice($id, $amount, $status, $due_date) {
        $query = "UPDATE invoices SET amount = ?, status = ?, due_date = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("dssi", $amount, $status, $due_date, $id);
        return $stmt->execute();
    }

    // Delete an invoice
    public function deleteInvoice($id) {
        $query = "DELETE FROM invoices WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>