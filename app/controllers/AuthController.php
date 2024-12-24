<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Core\Controller;

class AuthController extends Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    // Show login form
    public function showLoginForm() {
        $this->view('auth/login');
    }

    // Handle login
    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Find user by email
        $user = $this->userModel->getUserByEmail($email);

        if ($user && $this->userModel->verifyPassword($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on role
            if ($user['role'] === 'admin') {
                header('Location: /admin/dashboard');
            } else {
                header('Location: /user/dashboard');
            }
        } else {
            // Set error message
            $_SESSION['error'] = 'Invalid email or password';
            header('Location: /login');
        }
    }

    // Show registration form (only accessible to admins)
    public function showRegistrationForm() {
        // Check if the user is an admin
        if ($_SESSION['role'] !== 'admin') {
            $_SESSION['error'] = 'Access denied. Only admins can create users.';
            header('Location: /login');
            return;
        }

        $this->view('auth/register');
    }

    // Handle registration (only accessible to admins)
    public function register() {
        // Check if the user is an admin
        if ($_SESSION['role'] !== 'admin') {
            $_SESSION['error'] = 'Access denied. Only admins can create users.';
            header('Location: /login');
            return;
        }

        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $role = 'user'; // Default role

        // Check if user already exists
        if ($this->userModel->getUserByEmail($email)) {
            $_SESSION['error'] = 'Email already exists';
            header('Location: /register');
            return;
        }

        // Create user
        if ($this->userModel->createUser($username, $password, $email, $role)) {
            $_SESSION['success'] = 'User created successfully.';
            header('Location: /admin/dashboard');
        } else {
            $_SESSION['error'] = 'User creation failed. Please try again.';
            header('Location: /register');
        }
    }

    // Logout
    public function logout() {
        session_destroy();
        header('Location: /login');
    }
}