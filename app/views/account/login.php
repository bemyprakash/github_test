<h1>Login</h1>
<form method="post" action="/login">
    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
    <input type="email" name="email" required placeholder="Email">
    <input type="password" name="password" required placeholder="Password">
    <button type="submit">Login</button>
</form>
