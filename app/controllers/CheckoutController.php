<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function index(): void
    {
        $this->view('checkout/index', ['title' => 'Checkout']);
    }

    public function placeOrder(): void
    {
        if (!verify_csrf($_POST['csrf_token'] ?? '')) {
            http_response_code(419);
            exit('Invalid CSRF token.');
        }

        $cartItems = array_values($_SESSION['cart'] ?? []);
        if ($cartItems === []) {
            $this->redirect('/cart');
        }

        $subtotal = array_reduce($cartItems, static fn ($sum, $item) => $sum + ($item['price'] * $item['qty']), 0.0);
        $tax = round($subtotal * 0.18, 2);
        $shipping = $subtotal > 1500 ? 0.0 : 99.0;
        $total = $subtotal + $tax + $shipping;

        $orderModel = new Order();
        $orderId = $orderModel->create([
            ':user_id' => $_SESSION['user_id'] ?? null,
            ':customer_name' => trim($_POST['name'] ?? ''),
            ':customer_email' => trim($_POST['email'] ?? ''),
            ':customer_phone' => trim($_POST['phone'] ?? ''),
            ':shipping_address' => trim($_POST['address'] ?? ''),
            ':city' => trim($_POST['city'] ?? ''),
            ':state' => trim($_POST['state'] ?? ''),
            ':postal_code' => trim($_POST['postal_code'] ?? ''),
            ':subtotal' => $subtotal,
            ':tax_amount' => $tax,
            ':shipping_amount' => $shipping,
            ':discount_amount' => 0,
            ':total_amount' => $total,
            ':payment_method' => $_POST['payment_method'] ?? 'cod',
            ':payment_status' => 'pending',
            ':order_status' => 'pending',
        ], $cartItems);

        unset($_SESSION['cart']);
        $_SESSION['flash_message'] = "Order #{$orderId} placed successfully.";
        $this->redirect('/checkout?success=1');
    }
}
