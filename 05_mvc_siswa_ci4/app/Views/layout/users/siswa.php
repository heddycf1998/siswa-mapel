<?= $this->extend('/layout/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/users/siswa.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('body') ?>

<div class="siswa-wrapper">

    <div class="sidebar">
        <div class="sidebar-brand">
            👨‍🎓 Siswa Panel
        </div>

        <ul class="sidebar-menu list-unstyled">
            <li>
                <a href="/siswa/dashboard" class="<?= url_is('siswa/dashboard*') ? 'active' : '' ?>">
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/siswa/mapel" class="<?= url_is('siswa/mapel*') ? 'active' : '' ?>">
                    <span>Mapel</span>
                </a>
            </li>
            <li>
                <a href="/siswa/profil" class="<?= url_is('siswa/profil*') ? 'active' : '' ?>">
                    <span>Profil</span>
                </a>
            </li>
            <li>
                <a href="/siswa/ubah-password" class="<?= url_is('siswa/ubah-password*') ? 'active' : '' ?>">
                    <span>Ubah Password</span>
                </a>
            </li>

            <li>
                <hr style="border-color: #cbd5e1; margin: 15px 10px;">
            </li>
            
            <li>
                <a href="/logout" class="logout">
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <main class="content">
        <?= $this->renderSection('content') ?>
    </main>
</div>

<script src="<?= base_url('assets/js/vendors/sweetalert2.all.min.js') ?>"></script>

<?= $this->renderSection('script') ?>

<?= $this->endSection() ?>