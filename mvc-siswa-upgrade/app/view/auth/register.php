<h2>Register</h2>
<?php if(isset($_GET['error'])) : ?>
    <div style="color:red">
        <?= htmlspecialchars($_GET['error'])?>
    </div>
<?php endif; ?>
<!-- /auth/register = butuh Controller untuk proses data (login, register) -->
<form action="<?= BASE_URL ?>/auth/register" method="POST">
    <input type="hidden" name="aksi" value="register">

    <label for="username">Username :
        <input type="text" name="username" id="username" required>
    </label>
    <br>
    <label for="password">Password :
        <input type="password" name="password" id="password" required>
    </label>
    <br>
    <label for="confirm_password">Konfirmasi Password :
        <input type="password" name="confirm_password" id="confirm_password" required>
    </label>
    <br>

    <input type="submit" value="Register">
</form>
<!-- a href /login/form = cuma tampilkan halaman form -->
<p><a href="<?= BASE_URL ?>/login/form">Sudah Punya Akun ? Login</a></p>