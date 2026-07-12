<?php 
/** @var \CodeIgniter\Pager\Pager|null $pager */ 
/** @var string|null $keyword */ 
/** @var array $siswa */
?>

<?= $this->extend('layout/users/admin') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1><?= $title ?></h1>

<div class="action-header">
    <div>
        <a href="/admin/siswa/create" class="btn-tambah">
            Tambah Siswa
        </a>
    </div>

    <form action="" method="get" class="search-form">
        <input type="text" 
                name="keyword" 
                placeholder="Cari siswa..." 
                value="<?= esc($keyword ?? '') ?>" 
                class="input-cari">
        <button type="submit" class="btn-cari">Cari</button>
    </form>
</div>

<?= view('components/flash_message') ?>

<table class="table table-admin">
    <thead>
        <tr>
            <th class="col-no">No</th>
            <th class="col-nis">NIS</th>
            <th class="col-nama">Nama</th>
            <th class="col-fill">Mata Pelajaran</th>
            <th class="col-aksi" colspan="3">Keterangan</th>
        </tr>
    </thead>
    
     <?php
     $currentPage = $pager->getCurrentPage();
     $no = 1 + ($currentPage - 1) * $pager->getPerPage();
     foreach ($siswa as $m) : 
     ?>

    <tr>
        <td class="col-no"><?= $no++ ?></td>
        <td><?= $m['nis'] ?></td>
        <td class="col-nama"><?= $m['nama'] ?></td>
        <td class="col-fill"><?= $m['mapel_list'] ?? '-' ?></td>
        <td><a href="/admin/siswa/edit/<?= $m['id'] ?>" class="btn-edit">Edit</a></td>
        <td>
            <form action="/admin/siswa/delete/<?= $m['id'] ?>" method="post" class="form-inline">
                <?= csrf_field() ?>
                <button type="submit" 
                        class="btn-hapus">
                    Hapus
                </button>
            </form>
        </td>
    </tr>

    <?php endforeach ?>

</table>

<?= view('components/pagination', ['pager' => $pager, 'keyword' => $keyword]) ?>

<?= $this->endSection() ?>