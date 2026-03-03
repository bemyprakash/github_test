<?php

declare(strict_types=1);

$base = rtrim($_ENV['APP_URL'] ?? 'https://example.com', '/');
$urls = ['/', '/our-story', '/shop', '/contact', '/blog', '/reviews-recognition'];
$xml = new SimpleXMLElement('<urlset/>');
$xml->addAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

foreach ($urls as $path) {
    $url = $xml->addChild('url');
    $url->addChild('loc', $base . $path);
    $url->addChild('changefreq', 'weekly');
}

$xml->asXML(__DIR__ . '/../sitemap.xml');
echo "Generated sitemap.xml\n";
