<?= $this->extend('/layout/users/siswa') ?>

<?= $this->section('title') ?>
    <?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="profile-container">

    <div class="profile-header">
        <h2>Edit Profil Saya</h2>
        <p>Silakan ubah data Nama, Umur, atau Alamat kamu di bawah ini.</p>
    </div>

    <form action="/siswa/profil/update" method="post" class="form-profile">
        <?= csrf_field() ?>

        <!-- NIS (Readonly) -->
        <div class="form-group">
            <label>Nomor Induk (NIS)</label>
            <input type="text" value="<?= esc($siswa['nis'] ?? '-') ?>" readonly class="input-readonly">
            <small class="text-muted">* NIS diatur oleh sistem dan tidak dapat diubah.</small>
        </div>

        <!-- NAMA (Menggunakan old() untuk persistensi data) -->
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" value="<?= old('nama', esc($siswa['nama'] ?? '')) ?>" class="input-profile" placeholder="Masukkan nama lengkap">
            <?= view('components/form_error', ['field' => 'nama']) ?>
        </div>

        <!-- UMUR (Menggunakan old()) -->
        <div class="form-group">
            <label>Umur (Tahun)</label>
            <input type="number" name="umur" value="<?= old('umur', esc($siswa['umur'] ?? '')) ?>" class="input-profile" placeholder="Contoh: 24">
            <?= view('components/form_error', ['field' => 'umur']) ?>
        </div>

        <!-- ALAMAT (Menggunakan old()) -->
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" rows="4" class="textarea-profile" placeholder="Masukkan alamat lengkap rumah..."><?= old('alamat', esc($siswa['alamat'] ?? '')) ?></textarea>
            <?= view('components/form_error', ['field' => 'alamat']) ?>
        </div>

        <!-- Tombol Aksi -->
        <div class="form-buttons">
            <a href="/siswa/profil" class="btn-batal">Batal</a>
            <button type="submit" class="btn-simpan">Simpan Perubahan</button>
        </div>
    </form>

</div>
<?= $this->endSection() ?>