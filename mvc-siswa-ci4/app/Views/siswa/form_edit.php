<?php

/** @var array<string, mixed> $siswa */
/** @var array<int, array<string, mixed>> $mapel */
/** @var int[] $siswaMapel */

?>

<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h2>Edit Data Siswa</h2>
<a href=" <?= site_url('siswa') ?> ">Kembali</a>
<br>
<br>
<form action=" <?= site_url('siswa/update/' . $siswa['id']) ?> " method="post">
    <label for="nis">NIS</label>
    <input type="text" name="nis" id="nis" value="<?= $siswa['nis']; ?>" required>
    <br>
    <br>
    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" value="<?= $siswa['nama']; ?>" required>
    <br>
    <br>
    <label for="umur">Umur</label>
    <input type="text" name="umur" id="umur" value="<?= $siswa['umur']; ?>" required>
    <br>
    <br>
    <label for="alamat">Alamat</label>
    <textarea name="alamat" id="alamat" required><?= $siswa['alamat']; ?></textarea>
    <br>
    <br>
    <?php foreach ($mapel as $m) : ?>
        <label>
            <input type="checkbox" name="mapel[]" value="<?= $m['id_mapel']; ?>"
                <?= in_array($m['id_mapel'], $siswaMapel) ? 'checked' : '' ?>>
            <?= esc($m['nama']); ?>
        </label>
    <?php endforeach; ?>
    <br>
    <br>
    <button type="submit">Update</button>
</form>

<?= $this->endSection(); ?>