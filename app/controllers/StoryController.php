<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

class StoryController extends Controller
{
    public function index(): void
    {
        $this->view('story/index', ['title' => 'Our Story']);
    }
}
