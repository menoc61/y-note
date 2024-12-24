<?php
namespace App\Models;

use App\Core\Model;

class ContactModel extends Model {
    // Get all contacts
    public function getAllContacts() {
        $query = "SELECT * FROM contacts";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Get contact by ID
    public function getContactById($id) {
        $query = "SELECT * FROM contacts WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Create a new contact
    public function createContact($user_id, $name, $email, $phone, $image_url) {
        $query = "INSERT INTO contacts (user_id, name, email, phone, image_url) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("issss", $user_id, $name, $email, $phone, $image_url);
        return $stmt->execute();
    }

    // Update contact information
    public function updateContact($id, $name, $email, $phone, $image_url) {
        $query = "UPDATE contacts SET name = ?, email = ?, phone = ?, image_url = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssssi", $name, $email, $phone, $image_url, $id);
        return $stmt->execute();
    }

    // Delete a contact
    public function deleteContact($id) {
        $query = "DELETE FROM contacts WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>