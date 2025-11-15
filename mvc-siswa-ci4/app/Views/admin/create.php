<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Admin</title>
</head>

<body>
    <h2>Tambah Akun</h2>
    <?php if (session()->getFlashdata('error')) : ?>
        <div style="color:red"><?= session()->getFlashdata('error'); ?></div>
    <?php endif; ?>

    <form action="<?= site_url('admin/store') ?>" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <br>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br>
        <br>
        <label for="confirm_password">Username</label>
        <input type="password" name="confirm_password" id="confirm_password">
        <br>
        <br>
        <button type="submit">Tambah Admin</button>
    </form>
</body>

</html>