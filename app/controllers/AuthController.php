<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function registerForm(): void
    {
        $this->view('account/register', ['title' => 'Register']);
    }

    public function register(): void
    {
        if (!verify_csrf($_POST['csrf_token'] ?? '')) {
            http_response_code(419);
            exit('Invalid CSRF token.');
        }

        $userModel = new User();
        $userId = $userModel->create([
            'name' => trim($_POST['name'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'password_hash' => password_hash((string) ($_POST['password'] ?? ''), PASSWORD_DEFAULT),
        ]);

        $_SESSION['user_id'] = $userId;
        $this->redirect('/account');
    }

    public function loginForm(): void
    {
        $this->view('account/login', ['title' => 'Login']);
    }

    public function login(): void
    {
        if (!verify_csrf($_POST['csrf_token'] ?? '')) {
            http_response_code(419);
            exit('Invalid CSRF token.');
        }

        $userModel = new User();
        $user = $userModel->findByEmail(trim($_POST['email'] ?? ''));

        if (!$user || !password_verify((string) ($_POST['password'] ?? ''), $user['password_hash'])) {
            $_SESSION['flash_message'] = 'Invalid credentials.';
            $this->redirect('/login');
        }

        $_SESSION['user_id'] = $user['id'];
        $this->redirect('/account');
    }

    public function logout(): void
    {
        session_destroy();
        $this->redirect('/');
    }
}
