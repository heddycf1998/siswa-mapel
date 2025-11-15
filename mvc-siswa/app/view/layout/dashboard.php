<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/style.css">
</head>
<body>
    <div class="container">
        <h1>CRUD Sekolah</h1>
        <nav>
            <a href="<?= BASE_URL ?>?menu=siswa&aksi=list">Siswa</a> | 
            <a href="<?= BASE_URL ?>?menu=mapel&aksi=list">Mata Pelajaran</a> | 
            <a href="<?= BASE_URL ?>?menu=auth&aksi=logout">Logout</a>
        </nav>
        <hr>
        <?php 
        if (!empty($view_file) && file_exists($view_file)) {
            include $view_file;
        }
        ?>
    </div>
</body>
</html>