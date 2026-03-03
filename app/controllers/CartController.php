<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;

class CartController extends Controller
{
    public function index(): void
    {
        $this->view('cart/index', ['title' => 'Cart']);
    }

    public function add(): void
    {
        if (!verify_csrf($_POST['csrf_token'] ?? '')) {
            http_response_code(419);
            exit('Invalid CSRF token.');
        }

        $productId = (int) ($_POST['product_id'] ?? 0);
        $qty = max(1, (int) ($_POST['quantity'] ?? 1));
        $productModel = new Product();

        $product = $productModel->findBySlug($_POST['slug'] ?? '');
        if (!$product || (int) $product['id'] !== $productId) {
            http_response_code(400);
            exit('Invalid product.');
        }

        $_SESSION['cart'][$productId] = [
            'id' => $productId,
            'name' => $product['name'],
            'price' => (float) $product['price'],
            'qty' => $qty,
        ];

        $this->redirect('/cart');
    }

    public function update(): void
    {
        if (!verify_csrf($_POST['csrf_token'] ?? '')) {
            http_response_code(419);
            exit('Invalid CSRF token.');
        }

        foreach ($_POST['qty'] ?? [] as $productId => $qty) {
            if (isset($_SESSION['cart'][(int) $productId])) {
                $_SESSION['cart'][(int) $productId]['qty'] = max(1, (int) $qty);
            }
        }

        $this->redirect('/cart');
    }

    public function remove(): void
    {
        if (!verify_csrf($_POST['csrf_token'] ?? '')) {
            http_response_code(419);
            exit('Invalid CSRF token.');
        }

        $productId = (int) ($_POST['product_id'] ?? 0);
        unset($_SESSION['cart'][$productId]);
        $this->redirect('/cart');
    }
}
