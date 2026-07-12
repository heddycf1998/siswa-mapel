<?php 
/** @var \CodeIgniter\Pager\Pager|null $pager */ 
/** @var string|null $keyword */ 
?>

<?= $this->extend('layout/users/admin') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1><?= $title ?></h1>

<div class="action-header">
    <div>
        <a href="/admin/mapel/create" class="btn-tambah">
            Tambah Mata Pelajaran
        </a>
    </div>

    <form action="" method="get" class="search-form">
        <input type="text" 
               name="keyword" 
               placeholder="Cari mata pelajaran..." 
               value="<?= esc($keyword ?? '') ?>" 
               class="input-cari">
        <button type="submit" class="btn-cari">
            Cari
        </button>
    </form>
</div>

<?= view('components/flash_message') ?>

<table class="table table-admin">  
    <thead>
        <tr>
            <th class="col-no">No</th>
            <th class="col-fill">Nama Mata Pelajaran</th>
            <th class="col-aksi" colspan="2">Keterangan</th>
        </tr>
    </thead> 
    
    <tbody> 
    <?php 
    $no = 1 + ($pager->getCurrentPage() - 1 ) * $pager->getPerPage(); 
    foreach ($mapel as $m) : 
    ?>
    <tr>
        <td class="col-no"><?= $no++ ?></td>
        <td class="col-fill"><?= $m['nama'] ?></td>
        <td>
            <a href="/admin/mapel/edit/<?= $m['id_mapel'] ?>" class="btn-edit">
            Edit
            </a>
        </td>
        <td>
            <form action="/admin/mapel/delete/<?= $m['id_mapel'] ?>" method="post" class="form-inline">
                <?= csrf_field() ?>
                <button type="submit" 
                        class="btn-hapus"
                        data-nama="<?= esc($m['nama']) ?>">
                    Hapus
                </button>
            </form>
        </td>
    </tr>  
    <?php endforeach ?>  
    </tbody>
</table>

<?= view('components/pagination', ['pager' => $pager, 'keyword' => $keyword]) ?>

<?= $this->endSection() ?>