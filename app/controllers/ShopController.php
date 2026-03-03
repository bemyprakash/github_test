<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Category;
use App\Models\Product;
use Throwable;

class ShopController extends Controller
{
    public function index(): void
    {
        $filters = [
            'search' => $_GET['search'] ?? '',
            'category' => $_GET['category'] ?? '',
            'sort' => $_GET['sort'] ?? '',
        ];

        $products = dummy_products();
        $categories = dummy_categories();

        try {
            $page = max(1, (int) ($_GET['page'] ?? 1));
            $productModel = new Product();
            $categoryModel = new Category();
            $dbProducts = $productModel->paginated($filters, $page);
            $dbCategories = $categoryModel->all();
            if ($dbProducts !== []) {
                $products = $dbProducts;
            }
            if ($dbCategories !== []) {
                $categories = $dbCategories;
            }
        } catch (Throwable) {
        }

        $this->view('shop/index', [
            'title' => 'Shop',
            'products' => $products,
            'categories' => $categories,
            'filters' => $filters,
        ]);
    }
}
