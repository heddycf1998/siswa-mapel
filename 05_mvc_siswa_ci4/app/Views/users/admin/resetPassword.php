<?php

/**
 * @var \CodeIgniter\Pager\Pager|null $pager
 * @var int $currentPage
 * @var string $keyword
 * @var int $perPage
 * @var array $users
 */
?>

<?= $this->extend('layout/users/admin') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1><?= $title ?></h1>

<div class="action-header">
    <form method="get" class="search-form">
        <input type="text"
            name="keyword"
            placeholder="Cari user atau role..."
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
            <th class="">Username (NIS/ID)</th>
            <th class="">Role</th>
            <th class="col-aksi">Keterangan</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $no = 1 + ($pager->getCurrentPage() - 1) * $pager->getPerPage();
        foreach ($users as $m) :
        ?>

            <tr>
                <td><?= $no++ ?></td>
                <td class="col-username">
                    <?= esc($m['username']) ?>
                    <?php if ($m['role'] === 'admin') : ?>
                        <small style="font-size: 11px; color: #7f8c8d; font-weight: normal; margin-left: 6px;">(Utama)</small>
                    <?php endif; ?>
                </td>
                <td><?= esc($m['role']) ?></td>
                <td>
                    <form action="/admin/reset-password" method="post" class="form-reset-password m-0">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" value="<?= esc($m['id']) ?>">
                        <button type="submit" class="btn-reset">
                            Reset Password
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= view('components/pagination', ['pager' => $pager, 'keyword' => $keyword]) ?>
</div>
<?= $this->endSection() ?>

<?=  $this->section('script') ?>
<script src="<?= base_url('assets/js/users/admin/resetPassword.js') ?>"></script>
<?= $this->endSection() ?>