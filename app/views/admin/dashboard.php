<section class="portal-head">
    <h1>Admin Portal</h1>
    <p>Complete control panel for products, orders, customers, and content.</p>
</section>
<div class="stats-grid">
    <article><strong>₹<?= e((string) $revenueToday) ?></strong><span>Revenue Today</span></article>
    <article><strong>18</strong><span>Orders Today</span></article>
    <article><strong>6</strong><span>Low stock alerts</span></article>
</div>
<div class="portal-nav">
    <a href="/admin/products">Products</a>
    <a href="/admin/orders">Orders</a>
    <a href="/admin/customers">Customers</a>
    <a href="/admin/content">Content</a>
    <form method="post" action="/admin/logout"><input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>"><button>Logout</button></form>
</div>
