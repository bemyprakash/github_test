<?php

declare(strict_types=1);

$envPath = __DIR__ . '/../.env.php';
if (file_exists($envPath)) {
    $env = require $envPath;
    foreach ($env as $key => $value) {
        $_ENV[$key] = $value;
    }
}

define('APP_NAME', 'A. Prakash & Co.');
define('APP_URL', $_ENV['APP_URL'] ?? 'http://localhost');
define('DB_HOST', $_ENV['DB_HOST'] ?? '127.0.0.1');
define('DB_NAME', $_ENV['DB_NAME'] ?? 'heritage_store');
define('DB_USER', $_ENV['DB_USER'] ?? 'root');
define('DB_PASS', $_ENV['DB_PASS'] ?? '');
define('BASE_PATH', dirname(__DIR__));

spl_autoload_register(static function (string $class): void {
    $prefix = 'App\\';
    if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
        return;
    }

    $relativeClass = substr($class, strlen($prefix));
    $relativePath = str_replace('\\', '/', $relativeClass) . '.php';

    $candidates = [
        BASE_PATH . '/app/' . $relativePath,
        BASE_PATH . '/app/' . lcfirst($relativePath),
        BASE_PATH . '/app/' . strtolower($relativePath),
    ];

    foreach ($candidates as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
