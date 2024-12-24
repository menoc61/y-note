<?php
namespace App\Core;

class Model {
    protected $db;

    public function __construct() {
        // Get the database instance
        $this->db = Database::getInstance()->getConnection();
    }
}