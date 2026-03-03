<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

class AccountController extends Controller
{
    private function guard(): void
    {
        if (!is_logged_in()) {
            $this->redirect('/login');
        }
    }

    public function index(): void
    {
        $this->guard();
        $this->view('account/index', ['title' => 'My Account']);
    }

    public function orders(): void
    {
        $this->guard();
        $orders = [
            ['id' => 1208, 'date' => '2026-02-12', 'status' => 'Delivered', 'total' => '₹3,499'],
            ['id' => 1216, 'date' => '2026-02-24', 'status' => 'Processing', 'total' => '₹2,699'],
        ];
        $this->view('account/orders', ['title' => 'Order History', 'orders' => $orders]);
    }

    public function addresses(): void
    {
        $this->guard();
        $this->view('account/addresses', ['title' => 'Saved Addresses']);
    }

    public function profile(): void
    {
        $this->guard();
        $this->view('account/profile', ['title' => 'Profile Settings']);
    }
}
