<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;
use Throwable;

class HomeController extends Controller
{
    public function index(): void
    {
        $featuredProducts = dummy_products();

        try {
            $productModel = new Product();
            $dbProducts = $productModel->featured();
            if ($dbProducts !== []) {
                $featuredProducts = $dbProducts;
            }
        } catch (Throwable) {
            $_SESSION['flash_message'] = 'Demo mode active until DB is configured.';
        }

        $this->view('home/index', [
            'title' => 'A. Prakash & Co. | Since 1928',
            'featuredProducts' => $featuredProducts,
        ]);
    }
}
