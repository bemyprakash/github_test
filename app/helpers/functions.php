<?php

declare(strict_types=1);

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function verify_csrf(?string $token): bool
{
    return hash_equals($_SESSION['csrf_token'] ?? '', (string) $token);
}

function is_logged_in(): bool
{
    return !empty($_SESSION['user_id']);
}

function is_admin(): bool
{
    return !empty($_SESSION['admin_id']);
}
