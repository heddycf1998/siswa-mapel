<?php 
/** @var \CodeIgniter\Pager\Pager|null $pager */ 
/** @var string|null $keyword */ 
/** @var array $siswa */
?>

<?= $this->extend('layout/users/guru') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1><?= $title ?></h1>

<div class="action-header">
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

<table class="table table-guru">
    <thead>
        <tr>
            <th class="col-no">No</th>
            <th class="col-nis">NIS</th>
            <th class="col-nama">Nama</th>
            <th class="col-fill">Mata Pelajaran</th>
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
    </tr>

    <?php endforeach ?>

</table>

<?= view('components/pagination', ['pager' => $pager, 'keyword' => $keyword]) ?>

<?= $this->endSection() ?>