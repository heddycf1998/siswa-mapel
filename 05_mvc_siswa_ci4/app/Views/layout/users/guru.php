<?= $this->extend('/layout/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/users/guru.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('body') ?>

<div class="guru-wrapper">

    <div class="sidebar">
        <div class="sidebar-brand">
            👨‍🏫 Guru Panel
        </div>
        
        <ul class="sidebar-menu list-unstyled">
            <li>
                <a href="/guru/dashboard" class="<?= url_is('guru/dashboard*') ? 'active' : '' ?>">
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/guru/mapel" class="<?= url_is('guru/mapel*') ? 'active' : '' ?>">
                    <span>Mapel</span>
                </a>
            </li>
            <li>
                <a href="/guru/siswa" class="<?= url_is('guru/siswa*') ? 'active' : '' ?>">
                    <span>Siswa</span>
                </a>
            </li>
            <li>
                <a href="/guru/ubah-password" class="<?= url_is('guru/ubah-password*') ? 'active' : '' ?>">
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