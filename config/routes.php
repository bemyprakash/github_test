<?php

declare(strict_types=1);

use App\Controllers\AccountController;
use App\Controllers\AdminController;
use App\Controllers\AuthController;
use App\Controllers\BlogController;
use App\Controllers\CartController;
use App\Controllers\CheckoutController;
use App\Controllers\ContactController;
use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\ReviewsController;
use App\Controllers\ShopController;
use App\Controllers\StoryController;

$router->get('/', [HomeController::class, 'index']);
$router->get('/our-story', [StoryController::class, 'index']);
$router->get('/shop', [ShopController::class, 'index']);
$router->get('/product/{slug}', [ProductController::class, 'show']);
$router->get('/cart', [CartController::class, 'index']);
$router->post('/cart/add', [CartController::class, 'add']);
$router->post('/cart/update', [CartController::class, 'update']);
$router->post('/cart/remove', [CartController::class, 'remove']);
$router->get('/checkout', [CheckoutController::class, 'index']);
$router->post('/checkout/place-order', [CheckoutController::class, 'placeOrder']);
$router->get('/contact', [ContactController::class, 'index']);
$router->post('/contact', [ContactController::class, 'submit']);
$router->get('/blog', [BlogController::class, 'index']);
$router->get('/blog/{slug}', [BlogController::class, 'show']);
$router->get('/reviews-recognition', [ReviewsController::class, 'index']);

$router->get('/register', [AuthController::class, 'registerForm']);
$router->post('/register', [AuthController::class, 'register']);
$router->get('/login', [AuthController::class, 'loginForm']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);
$router->get('/account', [AccountController::class, 'index']);
$router->get('/account/orders', [AccountController::class, 'orders']);
$router->get('/account/addresses', [AccountController::class, 'addresses']);
$router->get('/account/profile', [AccountController::class, 'profile']);

$router->get('/admin', [AdminController::class, 'dashboard']);
$router->get('/admin/login', [AdminController::class, 'loginForm']);
$router->post('/admin/login', [AdminController::class, 'login']);
$router->post('/admin/logout', [AdminController::class, 'logout']);
$router->get('/admin/products', [AdminController::class, 'products']);
$router->get('/admin/orders', [AdminController::class, 'orders']);
$router->get('/admin/customers', [AdminController::class, 'customers']);
$router->get('/admin/content', [AdminController::class, 'content']);
