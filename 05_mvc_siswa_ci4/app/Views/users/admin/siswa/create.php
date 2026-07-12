<?= $this->extend('layout/users/admin') ?>

<?= $this->section('title') ?>
    <?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="form-container">

    <div class="form-header">
        <h2><?= $title ?></h2>
    </div>

    <form action="/admin/siswa/store" method="post">
        <?= csrf_field() ?>
        
        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" name="nis" id="nis" class="input-admin" value="<?= old('nis') ?>" placeholder="Masukkan Nomor Induk Siswa...">
            <?= view('components/form_error', ['field' => 'nis']) ?>
        </div>

        <div class="form-group">
            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" name="nama" id="nama_siswa" class="input-admin" value="<?= old('nama') ?>" placeholder="Masukkan Nama Lengkap Siswa...">
            <?= view('components/form_error', ['field' => 'nama']) ?>
        </div>  

        <div class="form-group">
            <label for="umur">Umur (Tahun)</label>
            <input type="number" name="umur" id="umur" class="input-admin" value="<?= old('umur') ?>" placeholder="Contoh: 17">
            <?= view('components/form_error', ['field' => 'umur']) ?>
        </div>  

        <div class="form-group">
            <label for="alamat">Alamat Rumah</label>
            <textarea name="alamat" id="alamat" class="textarea-admin" placeholder="Masukkan Alamat Lengkap Rumah Siswa..."><?= old('alamat') ?></textarea>
            <?= view('components/form_error', ['field' => 'alamat']) ?>
        </div>  

        <div class="form-group">
            <label>Mata Pelajaran yang Diikuti</label>
            <div class="checkbox-grid">
                <?php foreach ($mapel as $m) : ?>
                    <label class="checkbox-card">
                        <input type="checkbox" name="id_mapel[]" value="<?= $m['id_mapel'] ?>" 
                            <?= is_array(old('id_mapel')) && in_array($m['id_mapel'], old('id_mapel')) ? 'checked' : '' ?>>
                        <span class="checkbox-label"><?= $m['nama'] ?></span>
                    </label>
                <?php endforeach; ?>
            </div>
            <?= view('components/form_error', ['field' => 'id_mapel']) ?>
        </div>
        
        <div class="form-buttons">
            <a href="/admin/siswa" class="btn-kembali">Kembali</a>
            <button type="submit" class="btn-submit">Simpan Perubahan</button>
        </div>
    </form>

</div>
<?= $this->endSection() ?>