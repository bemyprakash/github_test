<section class="hero">
    <p class="eyebrow">Heritage House Since 1928</p>
    <h1>Modern Elegance, Rooted in Tradition.</h1>
    <p>Discover trusted handcrafted pieces inspired by nearly a century of legacy.</p>
    <div class="cta-row">
        <a class="btn" href="/shop">Explore Collection</a>
        <a class="btn btn-outline" href="/our-story">Read Our Story</a>
    </div>
</section>

<section>
    <h2>Featured Products</h2>
    <div class="product-grid">
        <?php foreach ($featuredProducts as $product): ?>
            <article class="product-card">
                <img src="<?= e($product['image'] ?? '/public/assets/images/products/emerald-trunk.svg') ?>" alt="<?= e($product['name']) ?>">
                <h3><?= e($product['name']) ?></h3>
                <p class="price">₹<?= e((string) $product['price']) ?></p>
                <a class="text-link" href="/product/<?= e($product['slug']) ?>">View details →</a>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="stats-grid">
    <article><strong>96+ Years</strong><span>Legacy of trust</span></article>
    <article><strong>25,000+</strong><span>Happy customers</span></article>
    <article><strong>4.8/5</strong><span>Average customer rating</span></article>
</section>
