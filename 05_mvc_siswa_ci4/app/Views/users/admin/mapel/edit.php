<?php

/** @var array<string,mixed>|null $mapel */ ?>

<?= $this->extend('layout/users/admin') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="form-container">
    <div class="form-header">
        <h1><?= $title ?></h1>
    </div>

    <form action="/admin/mapel/update/<?= $mapel['id_mapel'] ?>" method="post">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="nama_mapel">Nama Mata Pelajaran</label>
            <input type="text" name="nama" id="nama_mapel" class="input-admin" value="<?= old('nama', $mapel['nama']) ?>">
            <?= view('components/form_error', ['field' => 'nama']) ?>
        </div>

        <div class="form-buttons">
            <a href="/admin/mapel" class="btn-kembali">Kembali</a>
            <button type="submit" class="btn-submit">Update</button>
        </div>

    </form>
</div>




<?= $this->endSection() ?>