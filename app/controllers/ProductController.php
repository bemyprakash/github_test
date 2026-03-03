<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;
use Throwable;

class ProductController extends Controller
{
    public function show(string $slug): void
    {
        $dummy = collectDummy($slug);
        $product = $dummy['product'];
        $related = $dummy['related'];

        try {
            $productModel = new Product();
            $dbProduct = $productModel->findBySlug($slug);
            if ($dbProduct) {
                $product = $dbProduct;
                $related = $productModel->related((int) $product['category_id'], (int) $product['id']);
            }
        } catch (Throwable) {
        }

        if (!$product) {
            http_response_code(404);
            exit('Product not found');
        }

        $this->view('product/show', [
            'title' => $product['name'],
            'product' => $product,
            'relatedProducts' => $related,
        ]);
    }
}

function collectDummy(string $slug): array
{
    $all = dummy_products();
    $product = null;

    foreach ($all as $item) {
        if ($item['slug'] === $slug) {
            $product = $item;
            break;
        }
    }

    return ['product' => $product, 'related' => array_slice($all, 0, 3)];
}
