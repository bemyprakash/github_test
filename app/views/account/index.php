<section class="portal-head">
    <h1>User Portal</h1>
    <p>Manage your profile, addresses, and order history from one place.</p>
</section>
<div class="portal-nav">
    <a href="/account/orders">Order History</a>
    <a href="/account/addresses">Saved Addresses</a>
    <a href="/account/profile">Profile Settings</a>
    <form method="post" action="/logout"><input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>"><button>Logout</button></form>
</div>
