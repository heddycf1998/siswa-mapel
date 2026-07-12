<?php
/**
 * @var string $user
 * @var int $totalSiswaMapel
*/
?>

<?= $this->extend('layout/users/siswa') ?>

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
            <h3>Total Mata Pelajaran</h3>
            <p class="stat-number"><?= $totalSiswaMapel ?></p> 
        </div>
        <div class="card-icon">👥</div>
    </div>

</div>

<div class="welcome-box">
    <h2>Selamat Bekerja!</h2>
    <p>
        Melalui panel Siswa ini, kamu bisa memantau data akademik dengan cepat. Gunakan menu navigasi di sebelah kiri untuk melihat data miliku secara *real-time*.
    </p>
</div>

<?= $this->endSection() ?>