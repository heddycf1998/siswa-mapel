<?php
// Variabel yang di-passing: $code, $title, $message
?>

<h2><?= $code ?> - <?= $title?></h2>
<p><?= $message ?></p>

<!-- $_SERVER['HTTP_REFERER'] = Klik Link dari mana user datang -->
<!-- history.back = nulis URL ngawur -->
<?php if (!empty($_SERVER['HTTP_REFERER'])) : ?>
    <p><a href="<?= $_SERVER['HTTP_REFERER']?>"> Kembali </a></p>
<?php else: ?>
    <a href="javascript:history.back()"> Kembali</a>
<?php endif ?>

<!-- javascript: ... , menjalankan Javascript -->
<!-- <a href="javascript:alert('Halo!')">Klik aku</a> -->
<!-- <br> -->
<?php if (!empty($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'siswa' )  :?>
    <a href="<?= BASE_URL ?>/siswa/profil">Ke Profil</a>
<?php elseif (!empty($_SESSION['user']['role'] ) && ($_SESSION['user']['role'] === 'admin' || $_SESSION['user']['role'] === 'guru') ) : ?>
    <a href="<?= BASE_URL ?>/siswa">Ke Siswa</a>
<?php else :?>
    <a href="<?= BASE_URL ?>/auth">Ke Login</a>
<?php endif ?>