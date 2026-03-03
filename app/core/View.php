<?php

declare(strict_types=1);

namespace App\Core;

class View
{
    public static function render(string $template, array $data = []): void
    {
        extract($data, EXTR_SKIP);

        $templatePath = BASE_PATH . '/app/views/' . $template . '.php';

        if (!file_exists($templatePath)) {
            http_response_code(404);
            exit('View not found.');
        }

        require BASE_PATH . '/app/views/layouts/header.php';
        require $templatePath;
        require BASE_PATH . '/app/views/layouts/footer.php';
    }
}
