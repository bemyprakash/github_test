<article class="product-layout">
    <img class="product-hero-image" src="<?= e($product['image'] ?? '/public/assets/images/products/gift-chest.svg') ?>" alt="<?= e($product['name']) ?>">
    <div>
        <h1><?= e($product['name']) ?></h1>
        <p class="price">₹<?= e((string) $product['price']) ?></p>
        <p><?= e($product['description'] ?? 'Premium handcrafted heritage item.') ?></p>
        <ul class="clean-list">
            <li>Authenticity certified</li>
            <li>Secure packaging</li>
            <li>7-day replacement support</li>
        </ul>
        <form method="post" action="/cart/add">
            <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
            <input type="hidden" name="product_id" value="<?= (int) $product['id'] ?>">
            <input type="hidden" name="slug" value="<?= e($product['slug']) ?>">
            <input type="number" name="quantity" value="1" min="1" max="10">
            <button type="submit">Add to Cart</button>
        </form>
    </div>
</article>
<h2>Related Products</h2>
<div class="product-grid">
    <?php foreach ($relatedProducts as $related): ?>
    <div class="product-card"><h3><?= e($related['name']) ?></h3><a class="text-link" href="/product/<?= e($related['slug']) ?>">Open →</a></div>
    <?php endforeach; ?>
</div>
