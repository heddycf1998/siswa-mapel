<?= $this->extend('/layout/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/users/admin.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('body') ?>

<div class="admin-wrapper">

    <div class="sidebar">
        <div class="sidebar-brand">
            🏫 Admin Panel
        </div>
        
        <ul class="sidebar-menu list-unstyled">
            <li>
                <a href="/admin/dashboard" class="<?= url_is('admin/dashboard*') ? 'active' : '' ?>">
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/admin/mapel" class="<?= url_is('admin/mapel*') ? 'active' : '' ?>">
                    <span>Kelola Mapel</span>
                </a>
            </li>
            <li>
                <a href="/admin/siswa" class="<?= url_is('admin/siswa*') ? 'active' : '' ?>">
                    <span>Kelola Siswa</span>
                </a>
            </li>
            <li>
                <a href="/admin/aktivasi" class="<?=  url_is('admin/aktivasi*') ? 'active' : '' ?>">
                    <span>Aktivasi Akun</span>
                </a>
            </li>
            <li>
                <a href="/admin/reset-password" class="<?=  url_is('admin/reset-password*') ? 'active' : '' ?>">
                    <span>Reset Password</span>
                </a>
            </li>
            <li>
                <hr style="border-color: #334155; margin: 15px 10px;">
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
<script src="<?= base_url('assets/js/layout/users/admin.js') ?>"></script>

<?= $this->renderSection('script') ?>

<?= $this->endSection() ?>