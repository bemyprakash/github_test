<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

class ContactController extends Controller
{
    public function index(): void
    {
        $this->view('contact/index', ['title' => 'Contact']);
    }

    public function submit(): void
    {
        if (!verify_csrf($_POST['csrf_token'] ?? '')) {
            http_response_code(419);
            exit('Invalid CSRF token.');
        }

        $_SESSION['flash_message'] = 'Thank you for contacting us. We will reply shortly.';
        $this->redirect('/contact');
    }
}
