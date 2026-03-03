<h1>My Orders</h1>
<div class="table-wrap"><table><thead><tr><th>Order #</th><th>Date</th><th>Status</th><th>Total</th></tr></thead><tbody>
<?php foreach ($orders as $o): ?><tr><td>#<?= e((string)$o['id']) ?></td><td><?= e($o['date']) ?></td><td><?= e($o['status']) ?></td><td><?= e($o['total']) ?></td></tr><?php endforeach; ?>
</tbody></table></div>
