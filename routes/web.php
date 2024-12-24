<?php
use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;

// Initialize the router
$router = new Router();

// Landing page
$router->get('/', function() {
    require_once '../public/index.php';
});

// Authentication routes
$router->get('/login', [AuthController::class, 'showLoginForm']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/register', [AuthController::class, 'showRegistrationForm']);
$router->post('/register', [AuthController::class, 'register']);
$router->get('/logout', [AuthController::class, 'logout']);

// Dashboard routes
$router->get('/admin/dashboard', [DashboardController::class, 'adminDashboard']);
$router->get('/user/dashboard', [DashboardController::class, 'userDashboard']);

// Middleware for admin dashboard
$router->before('/admin/dashboard', function() {
    if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
        $_SESSION['error'] = 'Access denied. Only admins can access this page.';
        header('Location: /login');
        exit();
    }
});

// Middleware for user dashboard
$router->before('/user/dashboard', function() {
    if (!isset($_SESSION['user_id'])) {
        $_SESSION['error'] = 'Access denied. Please log in.';
        header('Location: /login');
        exit();
    }
});

// Run the router
$router->run();