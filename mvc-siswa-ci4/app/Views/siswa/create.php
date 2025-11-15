<?php

/** @var array<int, array<string, mixed>> $mapel */

?>
<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h2>Form Tambah Siswa</h2>
<a href="/siswa">Kembali</a>
<br>
<br>
<form action=" <?= site_url('siswa/store') ?>" method="post">
    <label for="nis">NIS</label>
    <input type="text" name="nis" id="nis" required>
    <br>
    <br>
    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" required>
    <br>
    <br>
    <label for="umur">Umur</label>
    <input type="text" name="umur" id="umur" required>
    <br>
    <br>
    <label for="alamat">Alamat</label>
    <textarea name="alamat" id="alamat" required></textarea>
    <br>
    <br>
    <?php foreach ($mapel as $m) : ?>
        <label>
            <input type="checkbox" name="mapel[]" value="<?= $m['id_mapel']; ?>">
            <?= esc($m['nama']); ?>
        </label>
    <?php endforeach; ?>
    <br>
    <br>
    <button type="submit">Simpan</button>
</form>

<?= $this->endSection(); ?>