<h1>Order Management</h1>
<div class="table-wrap"><table><thead><tr><th>Order #</th><th>Customer</th><th>Status</th><th>Total</th></tr></thead><tbody>
<?php foreach ($orders as $o): ?><tr><td>#<?= e((string)$o['id']) ?></td><td><?= e($o['name']) ?></td><td><?= e($o['status']) ?></td><td><?= e($o['total']) ?></td></tr><?php endforeach; ?>
</tbody></table></div>
