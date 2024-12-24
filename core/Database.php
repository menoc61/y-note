<?php
namespace App\Core;

use mysqli;

class Database {
    private static $instance = null;
    private $conn;

    private $host = 'localhost'; // Database host
    private $user = 'root';      // Database username
    private $pass = '';          // Database password
    private $name = 'invoice_management'; // Database name

    private function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}