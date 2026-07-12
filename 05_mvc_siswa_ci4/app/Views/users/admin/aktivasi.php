<?php

/**
 * @var int $totalGlobalTanpaAkun
 * @var array $siswaTanpaAkun
 * @var \CodeIgniter\Pager\Pager $pager
 * @var string|null $keyword
 */
?>

<?= $this->extend('layout/users/admin') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1><?= $title ?></h1>

<div class="dashboard-cards">
    <div class="card-stat">
        <div class="card-info">
            <h3>Total Siswa Tanpa Akun 👥</h3>
            <p class="stat-number"><?= $totalGlobalTanpaAkun ?></p>
        </div>
        <div class="card-icon">
            <?php if ($totalGlobalTanpaAkun > 0): ?>
                <form action="/admin/aktivasi/massal" method="post" id="form-generate-massal" class="m-0">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn-massal">
                        ⚡ Generate Semua Akun (Massal)
                    </button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="action-header">
    <form action="" method="get" class="search-form">
        <input type="text"
            name="keyword"
            placeholder="Cari siswa..."
            value="<?= esc($keyword ?? '') ?>"
            class="input-cari">
        <button type="submit" class="btn-cari">Cari</button>
    </form>
</div>

<?= view('components/flash_message') ?>

<?php if ($totalGlobalTanpaAkun === 0): ?>
    <div class="empty-state-box">
        <p class="empty-state-title">🎉 **All Clear!**</p>
        <p class="empty-state-description">Semua siswa yang terdaftar di sistem saat ini sudah memiliki akun login.</p>
    </div>

<?php elseif (empty($siswaTanpaAkun)): ?>
    <div class="empty-state-box">
        <p class="empty-state-title">🔍 **Tidak Ditemukan**</p>
        <p class="empty-state-description">Tidak ada siswa tanpa akun yang cocok dengan kata kunci **"<?= esc($keyword) ?>"**.</p>
        <p class="empty-state-description"><a href="/admin/aktivasi" class="btn-kembali">Lihat Semua Siswa</a></p>
    </div>

<?php else: ?>
    <table class="table table-admin">
        <thead>
            <tr>
                <th class="col-no">No</th>
                <th class="col-nis">(Calon NIS Username)</th>
                <th class="col-nama">Nama Siswa</th>
                <th class="col-umur">Umur</th>
                <th class="col-alamat">Alamat</th>
                <th class="col-aksi text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $currentPage = $pager->getCurrentPage();
            $no = 1 + ($currentPage - 1) * $pager->getPerPage();
            foreach ($siswaTanpaAkun as $siswa): ?>
                <tr>
                    <td class="col-no"><?= $no++ ?></td>
                    <td class="col-nis"><strong><?= $siswa['nis'] ?></strong></td>
                    <td class="col-nama"><?= $siswa['nama'] ?></td>
                    <td class="col-umur"><?= $siswa['umur'] ?> Tahun</td>
                    <td class="col-alamat"><?= $siswa['alamat'] ?></td>
                    <td class="col-aksi text-center">
                        <form action="/admin/aktivasi/<?= $siswa['id'] ?>" method="post" class="form-aktivasi-satuan m-0">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn-aktifkan">
                                Aktifkan
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?= view('components/pagination', ['pager' => $pager, 'keyword' => $keyword]) ?>
<?= $this->endSection() ?>

<?=  $this->section('script') ?>
<script src="<?= base_url('assets/js/users/admin/aktivasi.js') ?>"></script>
<?= $this->endSection() ?>