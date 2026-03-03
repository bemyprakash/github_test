<h1>Create Account</h1>
<form method="post" action="/register">
    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
    <input name="name" required placeholder="Full Name">
    <input type="email" name="email" required placeholder="Email">
    <input type="password" name="password" required placeholder="Password">
    <button type="submit">Register</button>
</form>
