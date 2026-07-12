<?= $this->extend('/layout/users/siswa') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="profile-container">

    <div class="profile-header">
        <h2>Profil Biodata Siswa</h2>
        <p>Berikut adalah informasi data diri kamu yang terdaftar di sistem.</p>
    </div>

    <div class="profile-layout-flex">
        <div class="profile-info-box">
            <?= view('components/flash_message') ?>
            <table class="table-profile">
                <tbody>
                    <tr>
                        <td>Nomor Induk (NIS)</td>
                        <td><strong><?= esc($siswa['nis'] ?? '-') ?></strong></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td><?= esc($siswa['nama'] ?? '-') ?></td>
                    </tr>
                    <tr>
                        <td>Umur</td>
                        <td><?= esc($siswa['umur'] ?? '-') ?> Tahun</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?= esc($siswa['alamat'] ?? '-') ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="profile-actions">
                <a href="/siswa/profil/edit" class="btn-edit">Edit Profil</a>
            </div>
        </div>

    </div>



</div>
<?= $this->endSection() ?>