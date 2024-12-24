<?php
namespace App\Controllers;

use App\Core\Controller;

class DashboardController extends Controller {
    // Admin dashboard
    public function adminDashboard() {
        $this->view('dashboard/admin');
    }

    // User dashboard
    public function userDashboard() {
        $this->view('dashboard/user');
    }
}