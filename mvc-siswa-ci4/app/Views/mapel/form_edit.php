<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h2>Edit Data Mapel</h2>
<a href="<?= site_url('mapel') ?>">Kembali</a>
<br>
<br>
<form action=" <?= site_url('mapel/update/' . $mapel['id_mapel']) ?>" method="post">
    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" value="<?= $mapel['nama']; ?>" required>
    <br>
    <br>
    <button type="submit">Update</button>
</form>

<?= $this->endSection(); ?>