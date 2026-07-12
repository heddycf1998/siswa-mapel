<?php
/**
 * @var string $title
 * @var int $totalSiswa
 * @var int $totalMapel
 * @var string $user
 */
?>

<?= $this->extend('layout/users/admin') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="dashboard-header">
    <h1><?= $title ?></h1>
    <p>Selamat datang kembali <?= $user ?> ! Berikut adalah ringkasan data sekolah hari ini.</p>
</div>

<div class="dashboard-cards">
    
    <div class="card-stat">
        <div class="card-info">
            <h3>Total Siswa</h3>
            <p class="stat-number"><?= $totalSiswa ?></p> 
        </div>
        <div class="card-icon">👥</div>
    </div>

    <div class="card-stat">
        <div class="card-info">
            <h3>Total Mapel</h3>
            <p class="stat-number"><?= $totalMapel ?></p>
        </div>
        <div class="card-icon">📚</div>
    </div>

</div>

<div class="welcome-box">
    <h2>Selamat Bekerja!</h2>
    <p>
        Melalui panel admin ini, kamu bisa memantau dan mengelola seluruh data akademik dengan cepat. Gunakan menu navigasi di sebelah kiri untuk menambah, mengedit, atau menghapus data siswa dan mata pelajaran secara *real-time*.
    </p>
</div>

<?= $this->endSection() ?>