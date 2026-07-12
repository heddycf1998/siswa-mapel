<?= $this->extend('/layout/users/siswa') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="profile-container">

    <div class="profile-header">
        <h2><?= $title ?></h2>
        <p>Berikut adalah informasi mengubah password data diri kamu yang terdaftar di sistem.</p>
    </div>

    <form action="/siswa/ubah-password" method="post" class="form-profile" id="formUbahPassword">
        <?= csrf_field() ?>
        <?= view('components/flash_message') ?>
        
        <div class="form-group-profile">
            <label for="password_lama">Password Lama</label>
            <div class="input-password-container">
                <input type="password" name="password_lama" id="password_lama" class="input-profile" placeholder="Masukkan password lama">
                <button type="button" id="toggle-password" class="toggle-password">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                </button>
            </div>
            <?= view('components/form_error', ['field' => 'password_lama']) ?>
        </div>

        <div class="form-group-profile">
            <label for="password_baru">Password Baru</label>
            <div class="input-password-container">
                <input type="password" name="password_baru" id="password_baru" class="input-profile" placeholder="Masukkan password baru">
                <button type="button" id="toggle-new-password" class="toggle-password">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                </button>
            </div>
            <?= view('components/form_error', ['field' => 'password_baru']) ?>
        </div>

        <div class="form-group-profile">
            <label for="password_konfirmasi">Konfirmasi Password Baru</label>
            <div class="input-password-container">
                <input type="password" name="password_konfirmasi" id="password_konfirmasi" class="input-profile" placeholder="Konfirmasi password baru">
                <button type="button" id="toggle-confirm-password" class="toggle-password">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                </button>
            </div>
            <?= view('components/form_error', ['field' => 'password_konfirmasi']) ?>
        </div>

        <div class="form-buttons-profile">
            <a href="/siswa/dashboard" class="btn-batal-profile">Batal</a>
            <button type="submit" class="btn-simpan-profile">Simpan Perubahan</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('assets/js/toggle-password.js') ?>"></script>
<script src="<?= base_url('assets/js/users/siswa/change-password.js') ?>"></script>
<?= $this->endSection() ?>