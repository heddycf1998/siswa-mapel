<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
</head>

<body>
    <h2>Register</h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <p style="color:green"><?= session()->getFlashdata('success'); ?></p>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <p style="color:red"><?= session()->getFlashdata('error'); ?></p>
    <?php endif; ?>

    <form action=" <?= site_url('register/process') ?> " method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
        <br>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <br>
        <br>
        <button type="submit">Register</button>
    </form>
    <br>
    <hr>
</body>

</html>