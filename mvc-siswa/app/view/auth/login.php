<h2>Login</h2>
<?php if(isset($_GET['error'])) : ?>
    <div style="color:red">
        <?= htmlspecialchars($_GET['error'])?>
    </div>
<?php endif; ?>
<form action="<?= BASE_URL ?>/index.php?menu=auth&aksi=login" method="POST">
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

<p><a href="<?= BASE_URL ?>/index.php?menu=login&aksi=register">Belum Punya Akun ? Register</a></p>