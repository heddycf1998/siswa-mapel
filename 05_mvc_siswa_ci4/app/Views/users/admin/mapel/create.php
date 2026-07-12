<?= $this->extend('layout/users/admin') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="form-container">

    <div class="form-header">
        <h2><?= $title ?></h2>
    </div>

    <form action="/admin/mapel/store" method="post">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="nama_mapel">Nama Mata Pelajaran</label>
            <input type="text" name="nama" id="nama_mapel" class="input-admin" value="<?= old('nama') ?>">
            <?= view('components/form_error', ['field' => 'nama']) ?>
        </div>

        <div class="form-buttons">
            <a href="/admin/mapel" class="btn-kembali">Kembali</a>
            <button type="submit" class="btn-submit">Simpan</button>
        </div>
    </form>
</div>

</form>
<?= $this->endSection() ?>