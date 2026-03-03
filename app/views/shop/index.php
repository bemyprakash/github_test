<h1>Shop Collection</h1>
<form method="get" class="filters">
    <input name="search" placeholder="Search products" value="<?= e($filters['search']) ?>">
    <select name="category">
        <option value="">All Categories</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?= e($category['slug']) ?>" <?= $filters['category'] === $category['slug'] ? 'selected' : '' ?>><?= e($category['name']) ?></option>
        <?php endforeach; ?>
    </select>
    <select name="sort">
        <option value="">Newest</option>
        <option value="price_asc">Price: Low to High</option>
        <option value="price_desc">Price: High to Low</option>
        <option value="popular">Popularity</option>
    </select>
    <button type="submit">Apply Filters</button>
</form>

<div class="product-grid">
<?php foreach ($products as $product): ?>
    <article class="product-card">
        <img src="<?= e($product['image'] ?? '/public/assets/images/products/brass-set.svg') ?>" alt="<?= e($product['name']) ?>">
        <h3><?= e($product['name']) ?></h3>
        <p class="price">₹<?= e((string) $product['price']) ?></p>
        <p class="badge <?= (int)($product['stock_quantity'] ?? 0) > 0 ? 'ok' : 'warn' ?>"><?= (int)($product['stock_quantity'] ?? 0) > 0 ? 'In Stock' : 'Out of Stock' ?></p>
        <a class="text-link" href="/product/<?= e($product['slug']) ?>">Details →</a>
    </article>
<?php endforeach; ?>
</div>
