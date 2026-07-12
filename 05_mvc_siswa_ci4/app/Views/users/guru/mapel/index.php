<?php 
/**
 * @var \CodeIgniter\Pager\Pager|null $pager
 * @var string|null $keyword
 */
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
               placeholder="Cari mata pelajaran..." 
               value="<?= esc($keyword ?? '') ?>" 
               class="input-cari">
        <button type="submit" class="btn-cari">
            Cari
        </button>
    </form>
</div>

<?= view('components/flash_message') ?>

<table class="table table-guru">  
    <thead>
        <tr>
            <th class="col-no">No</th>
            <th class="col-fill">Nama Mata Pelajaran</th>
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
    </tr>  
    <?php endforeach ?>  
    </tbody>
</table>

<?= view('components/pagination', ['pager' => $pager, 'keyword' => $keyword]) ?>

<?= $this->endSection() ?>