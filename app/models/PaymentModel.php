<?php
namespace App\Models;

use App\Core\Model;

class PaymentModel extends Model {
    // Get all payments
    public function getAllPayments() {
        $query = "SELECT * FROM payments";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Get payment by ID
    public function getPaymentById($id) {
        $query = "SELECT * FROM payments WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Create a new payment
    public function createPayment($invoice_id, $amount, $payment_date) {
        $query = "INSERT INTO payments (invoice_id, amount, payment_date) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ids", $invoice_id, $amount, $payment_date);
        return $stmt->execute();
    }

    // Update payment information
    public function updatePayment($id, $amount, $payment_date) {
        $query = "UPDATE payments SET amount = ?, payment_date = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("dsi", $amount, $payment_date, $id);
        return $stmt->execute();
    }

    // Delete a payment
    public function deletePayment($id) {
        $query = "DELETE FROM payments WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>