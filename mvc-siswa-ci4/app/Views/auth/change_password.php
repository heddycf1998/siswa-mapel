<!DOCTYPE html>
<html>

<head>
    <title>Ubah Password</title>
</head>

<body>
    <h2>Ubah Password</h2>

    <!-- Tampilkan pesan error atau success -->
    <?php if (session()->getFlashdata('error')): ?>
        <p style="color:red"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <p style="color:green"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <p>NIS : <?= session()->get('username') ?></p>

    <form action="<?= site_url('change-password') ?>" method="post">
        <?= csrf_field() ?>

        <label>Password Lama:</label><br>
        <input type="password" name="old_password" required><br><br>

        <label>Password Baru:</label><br>
        <input type="password" name="new_password" required><br><br>

        <label>Konfirmasi Password Baru:</label><br>
        <input type="password" name="confirm_password" required><br><br>

        <button type="submit">Ubah Password</button>
    </form>

    <p><a href="<?= site_url('dashboard') ?>">Kembali ke Dashboard</a></p>
</body>

</html>