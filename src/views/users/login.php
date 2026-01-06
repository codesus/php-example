<?php
ob_start();
?>
<div>
    <h1>Login</h1>
    <form method="post" action="/users/login">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required placeholder="TU usuario">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="TU contraseña">
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</div>
<?php
$cualquierCosa = ob_get_clean();
require __DIR__ . '/../layouts/auth.php';
?>