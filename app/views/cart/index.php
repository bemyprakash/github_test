<h1>Cart</h1>
<form method="post" action="/cart/update">
    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
    <?php $cart = $_SESSION['cart'] ?? []; $subtotal = 0; ?>
    <?php foreach ($cart as $item): $subtotal += $item['price']*$item['qty']; ?>
        <div class="row">
            <span><?= e($item['name']) ?></span>
            <input type="number" name="qty[<?= (int)$item['id'] ?>]" value="<?= (int)$item['qty'] ?>" min="1">
            <span>₹<?= e((string) ($item['price']*$item['qty'])) ?></span>
        </div>
    <?php endforeach; ?>
    <p>Subtotal: ₹<?= e((string)$subtotal) ?></p>
    <button type="submit">Update Cart</button>
</form>
<a class="btn" href="/checkout">Proceed to Checkout</a>
