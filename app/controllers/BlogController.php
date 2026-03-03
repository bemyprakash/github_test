<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

class BlogController extends Controller
{
    public function index(): void
    {
        $this->view('blog/index', ['title' => 'Articles', 'posts' => dummy_blog_posts()]);
    }

    public function show(string $slug): void
    {
        $post = null;
        foreach (dummy_blog_posts() as $item) {
            if ($item['slug'] === $slug) {
                $post = $item;
            }
        }

        $this->view('blog/show', [
            'title' => $post['title'] ?? ucfirst(str_replace('-', ' ', $slug)),
            'slug' => $slug,
            'post' => $post,
        ]);
    }
}
