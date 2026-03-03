<h1>Product Management</h1>
<div class="table-wrap"><table><thead><tr><th>Product</th><th>Price</th><th>Stock</th><th>Actions</th></tr></thead><tbody>
<?php foreach ($products as $p): ?><tr><td><?= e($p['name']) ?></td><td>₹<?= e((string)$p['price']) ?></td><td><?= e((string)$p['stock_quantity']) ?></td><td><a href="#">Edit</a> · <a href="#">Delete</a></td></tr><?php endforeach; ?>
</tbody></table></div>
<button>Add Product</button>
