<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

class ReviewsController extends Controller
{
    public function index(): void
    {
        $this->view('reviews/index', ['title' => 'Reviews & Recognition']);
    }
}
