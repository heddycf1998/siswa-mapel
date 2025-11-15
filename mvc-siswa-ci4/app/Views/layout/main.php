<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'CI4 - CRUD Siswa & Mapel'; ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>

<body>
    <aside class="layout-sidebar">
        <h3>Menu</h3>
        <p>
            <strong><?= session('username'); ?></strong>
            (<small><?= ucfirst(session('role')); ?></small>)
        </p>


        <a href="<?= site_url('/dashboard'); ?>" class="<?= (uri_string() === 'dashboard') ? 'active' : '' ?>">Dashboard</a>
        <a href="<?= site_url('/siswa') ?> " class="<?= (uri_string() === 'siswa') ? 'active' : '' ?>">Data Siswa</a>
        <a href=" <?= site_url('/mapel'); ?>" class="<?= (uri_string() === 'mapel') ? 'active' : '' ?>">Data Mapel</a>
        <a href=" <?= site_url('/logout'); ?>">Logout</a>
    </aside>

    <main class="layout-content">
        <?= $this->renderSection('content'); ?>
    </main>
</body>

</html>