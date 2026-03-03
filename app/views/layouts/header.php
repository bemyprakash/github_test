<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= e($title ?? APP_NAME) ?></title>
    <meta name="description" content="A. Prakash & Co. | Premium heritage goods since 1928.">
    <meta property="og:title" content="<?= e($title ?? APP_NAME) ?>">
    <meta property="og:description" content="Timeless trust, premium craftsmanship, since 1928.">
    <meta property="og:type" content="website">
    <link rel="stylesheet" href="/public/assets/css/styles.css">
    <script defer src="/public/assets/js/main.js"></script>
</head>
<body>
<header class="topbar">
    <div class="container nav-wrap">
        <a href="/" class="brand">PRAKASH'S <span>Since 1928</span></a>
        <button class="menu-btn" aria-label="Toggle menu" data-menu-toggle>☰ Menu</button>
        <nav class="main-nav" data-menu>
            <a href="/shop">Shop</a>
            <a href="/our-story">Our Story</a>
            <a href="/blog">Journal</a>
            <a href="/reviews-recognition">Recognition</a>
            <a href="/account">Account</a>
            <a href="/admin">Admin</a>
            <a href="/cart" class="pill">Cart</a>
        </nav>
    </div>
</header>
<main class="container main-space">
<?php if (!empty($_SESSION['flash_message'])): ?>
    <p class="flash"><?= e($_SESSION['flash_message']) ?></p>
    <?php unset($_SESSION['flash_message']); endif; ?>
