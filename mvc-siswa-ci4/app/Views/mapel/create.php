<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h2>Form Tambah Mapel</h2>
<a href="/mapel">Kembali</a>
<br>
<br>
<form action=" <?= site_url('mapel/store') ?> " method="post">
    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" required>
    <br>
    <br>
    <button type="submit">Simpan</button>
</form>

<?= $this->endSection(); ?>