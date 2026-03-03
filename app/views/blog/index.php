<h1>Heritage Journal</h1>
<div class="product-grid">
<?php foreach ($posts as $post): ?>
  <article class="product-card">
    <h3><?= e($post['title']) ?></h3>
    <p><?= e($post['excerpt']) ?></p>
    <a class="text-link" href="/blog/<?= e($post['slug']) ?>">Read article →</a>
  </article>
<?php endforeach; ?>
</div>
