<h2>Register</h2>
<?php if(isset($_GET['error'])) : ?>
    <div style="color:red">
        <?= htmlspecialchars($_GET['error'])?>
    </div>
<?php endif; ?>
<form action="<?= BASE_URL ?>/index.php?menu=auth&aksi=register" method="POST">
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

<p><a href="<?= BASE_URL ?>/index.php?menu=login&aksi=form">Sudah Punya Akun ? Login</a></p>