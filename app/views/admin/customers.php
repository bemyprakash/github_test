<h1>Customer Management</h1>
<div class="table-wrap"><table><thead><tr><th>Name</th><th>Email</th><th>Orders</th></tr></thead><tbody>
<?php foreach ($customers as $c): ?><tr><td><?= e($c['name']) ?></td><td><?= e($c['email']) ?></td><td><?= e((string)$c['orders']) ?></td></tr><?php endforeach; ?>
</tbody></table></div>
