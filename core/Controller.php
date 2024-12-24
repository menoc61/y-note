<?php
namespace App\Core;

class Controller {
    // Load view
    protected function view($view, $data = []) {
        // Extract data for use in the view
        extract($data);

        // Check if the view file exists
        if (file_exists("../app/views/{$view}.php")) {
            require_once "../app/views/{$view}.php";
        } else {
            die("View does not exist: {$view}.php");
        }
    }
}