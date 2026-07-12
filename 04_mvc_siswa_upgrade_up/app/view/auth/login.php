<h2>Login</h2>

<?php include BASE_PATH . '/app/view/partial/flash.php' ?>


<form action="<?= BASE_URL ?>/auth/login" method="POST">
    <input type="hidden" name="aksi" value="login">

    <label for="username">Username :
        <input type="text" name="username" id="username" required>
    </label>
    <br>
    <label for="password">Password :
        <input type="password" name="password" id="password" required>
    </label>
    <br>

    <input type="submit" value="login">
</form>

<p><a href="<?= BASE_URL ?>/auth/registerForm">Belum Punya Akun ? Register</a></p>