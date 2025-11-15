<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h2>Dashboard</h2>

<div class="dashboard-grid">
    <div class="card">Total Siswa (Tabel Siswa) : <strong><?= $totalSiswa ?></strong></div>
    <div class="card">Total Siswa Aktif (Punya Akun) : <strong><?= $totalUserSiswa ?></strong></div>
    <div class="card">Siswa Belum Punya Akun : <strong><?= $totalSiswa - $totalUserSiswa ?></strong></div>


    <div class="card">Total Mapel : <strong><?= $totalMapel ?></strong></div>
    <div class="card">Total Siswa (Siswa-Mapel) : <strong><?= $totalRelasi ?></strong></div>

    <div class="card">Total User : <strong><?= $totalUser ?></strong></div>
    <div class="card">Total Admin : <strong><?= $totalAdmin ?></strong></div>

</div>

<?= $this->endSection(); ?>