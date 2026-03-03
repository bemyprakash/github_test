<h1>Checkout</h1>
<?php if (!empty($_GET['success'])): ?>
    <p>Your order has been placed successfully.</p>
<?php else: ?>
<form method="post" action="/checkout/place-order" class="checkout-form">
    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
    <input name="name" required placeholder="Full Name">
    <input type="email" name="email" required placeholder="Email">
    <input name="phone" required placeholder="Phone">
    <input name="address" required placeholder="Address">
    <input name="city" required placeholder="City">
    <input name="state" required placeholder="State">
    <input name="postal_code" required placeholder="Postal Code">
    <select name="payment_method">
        <option value="cod">Cash on Delivery</option>
        <option value="razorpay">Razorpay (sandbox)</option>
        <option value="stripe">Stripe (sandbox)</option>
    </select>
    <button type="submit">Place Order</button>
</form>
<?php endif; ?>
