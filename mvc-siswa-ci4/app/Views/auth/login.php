<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>

    <?php if (session()->getFlashdata('error')) : ?>
        <p style="color:red"><?= session()->getFlashdata('error'); ?></p>
    <?php endif; ?>

    <form action=" <?= site_url('login/process') ?> " method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
        <br>
        <br>
        <label for="password">password</label>
        <input type="password" name="password" id="password" required>
        <br>
        <br>
        <button type="submit">Login</button>
    </form>
    <br>
    <hr>
</body>

</html>