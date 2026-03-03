<?php

declare(strict_types=1);

function dummy_products(): array
{
    return [
        ['id' => 101, 'name' => 'Emerald Heritage Trunk', 'slug' => 'emerald-heritage-trunk', 'price' => 4899, 'description' => 'Vintage-inspired handcrafted storage trunk with brass accents.', 'stock_quantity' => 14, 'category_id' => 1, 'image' => '/public/assets/images/products/emerald-trunk.svg'],
        ['id' => 102, 'name' => '1928 Signature Brass Set', 'slug' => '1928-signature-brass-set', 'price' => 2699, 'description' => 'Elegant daily-use brass set carrying our legacy engraving style.', 'stock_quantity' => 28, 'category_id' => 2, 'image' => '/public/assets/images/products/brass-set.svg'],
        ['id' => 103, 'name' => 'Royal Mint Serving Platter', 'slug' => 'royal-mint-serving-platter', 'price' => 3299, 'description' => 'Premium festive serving platter in mint enamel and hand-finished border.', 'stock_quantity' => 9, 'category_id' => 2, 'image' => '/public/assets/images/products/mint-platter.svg'],
        ['id' => 104, 'name' => 'Prakash Legacy Gift Chest', 'slug' => 'prakash-legacy-gift-chest', 'price' => 5599, 'description' => 'Grand gift chest inspired by original A. Prakash & Co. catalogues.', 'stock_quantity' => 7, 'category_id' => 1, 'image' => '/public/assets/images/products/gift-chest.svg'],
    ];
}

function dummy_categories(): array
{
    return [
        ['name' => 'Heritage Collection', 'slug' => 'heritage-collection'],
        ['name' => 'Premium Daily Use', 'slug' => 'premium-daily-use'],
        ['name' => 'Festive Specials', 'slug' => 'festive-specials'],
    ];
}

function dummy_blog_posts(): array
{
    return [
        ['title' => 'How We Preserve 1928 Craftsmanship Today', 'slug' => 'preserve-1928-craftsmanship', 'excerpt' => 'A walk through our workshop process and family standards.'],
        ['title' => 'Choosing Authentic Heritage Pieces for Your Home', 'slug' => 'choosing-authentic-heritage-pieces', 'excerpt' => 'Simple checks for quality, materials, and finishing.'],
        ['title' => 'Care Guide: Brass, Wood & Enamel', 'slug' => 'care-guide-brass-wood-enamel', 'excerpt' => 'Keep your premium pieces timeless with our care routine.'],
    ];
}
