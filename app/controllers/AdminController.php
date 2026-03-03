<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Order;
use App\Models\User;
use Throwable;

class AdminController extends Controller
{
    private function guard(): void
    {
        if (!is_admin()) {
            $this->redirect('/admin/login');
        }
    }

    public function loginForm(): void
    {
        $this->view('admin/login', ['title' => 'Admin Login']);
    }

    public function login(): void
    {
        if (!verify_csrf($_POST['csrf_token'] ?? '')) {
            http_response_code(419);
            exit('Invalid CSRF token.');
        }

        $userModel = new User();
        $admin = $userModel->findByEmail(trim($_POST['email'] ?? ''));

        if (!$admin || $admin['role'] !== 'admin' || !password_verify((string) ($_POST['password'] ?? ''), $admin['password_hash'])) {
            $_SESSION['flash_message'] = 'Invalid admin credentials.';
            $this->redirect('/admin/login');
        }

        $_SESSION['admin_id'] = $admin['id'];
        $this->redirect('/admin');
    }

    public function dashboard(): void
    {
        $this->guard();
        $revenueToday = 0;
        try {
            $orderModel = new Order();
            $revenueToday = $orderModel->revenueToday();
        } catch (Throwable) {
        }

        $this->view('admin/dashboard', ['title' => 'Admin Dashboard', 'revenueToday' => $revenueToday]);
    }

    public function products(): void
    {
        $this->guard();
        $this->view('admin/products', ['title' => 'Admin Products', 'products' => dummy_products()]);
    }

    public function orders(): void
    {
        $this->guard();
        $orders = [
            ['id' => 1301, 'name' => 'Ishita Sharma', 'status' => 'Pending', 'total' => '₹4,899'],
            ['id' => 1302, 'name' => 'Arjun Mehta', 'status' => 'Shipped', 'total' => '₹2,699'],
        ];
        $this->view('admin/orders', ['title' => 'Admin Orders', 'orders' => $orders]);
    }

    public function customers(): void
    {
        $this->guard();
        $customers = [
            ['name' => 'Ishita Sharma', 'email' => 'ishita@example.com', 'orders' => 7],
            ['name' => 'Arjun Mehta', 'email' => 'arjun@example.com', 'orders' => 4],
        ];
        $this->view('admin/customers', ['title' => 'Admin Customers', 'customers' => $customers]);
    }

    public function content(): void
    {
        $this->guard();
        $this->view('admin/content', ['title' => 'Admin Content']);
    }

    public function logout(): void
    {
        unset($_SESSION['admin_id']);
        $this->redirect('/admin/login');
    }
}
