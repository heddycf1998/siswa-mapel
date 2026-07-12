<?php 
$role = $_SESSION['user']['role'] ?? null;
$username = htmlspecialchars($_SESSION['user']['username'] ?? 'Guest');
?>

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
        <h1>CRUD Sekolah - Hai, <?= $username?></h1>
        <nav>
            <?php if ($role === 'admin') : ?>
                <a href="<?= BASE_URL ?>/siswa">Siswa</a> | 
                <a href="<?= BASE_URL ?>/mapel">Mata Pelajaran</a> | 
                <a href="<?= BASE_URL ?>/auth/logout">Logout</a>
            <?php elseif ($role === 'guru') : ?>
                <a href="<?= BASE_URL ?>/siswa">Siswa</a> | 
                <a href="<?= BASE_URL ?>/mapel">Mata Pelajaran</a> | 
                <a href="<?= BASE_URL ?>/auth/logout">Logout</a>
            <?php elseif ($role === 'siswa') : ?>
                <a href="<?= BASE_URL ?>/siswa/profil">Siswa</a> | 
                <a href="<?= BASE_URL ?>/auth/logout">Logout</a>
            <?php endif?>
        </nav>
        <hr>
        
        <?php include BASE_PATH . '/app/view/partial/flash.php' ?>
        
        <main>
        <?php 
            if (!empty($view_file) && file_exists($view_file)) {
                include $view_file;
            }
        ?>
        </main>
        
    </div>
</body>
</html>