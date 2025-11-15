<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Mapel</title>
</head>

<body>
    <h2>Data Mapel</h2>
    <div class="toolbar">
        <a href=" <?= site_url('mapel/create') ?>" class="btn btn-primary">Tambah Mapel</a>

        <form action="<?= site_url('mapel'); ?>" method="get" style="margin-bottom: 15px; display:flex; gap:5px;">
            <input
                type="text"
                name="q"
                placeholder="Cari nama mapel..."
                value="<?= esc($_GET['q'] ?? '') ?>"
                style="padding: 6px 10px; width: 250px;">
            <button type="submit" class="btn btn-primary ">Search</button>
        </form>
    </div>

    <!-- Flash Message -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div style="padding:10px; background: #d4edda; color:#155724; border:1px solid #c3e6bc; margin-bottom:15px;">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
        <?php if (!empty($mapel) && is_array($mapel)) : ?>
            <?php foreach ($mapel as $row) : ?>
                <tr>
                    <td><?= esc($row['id_mapel']); ?></td>
                    <td><?= esc($row['nama']); ?></td>
                    <td>
                        <a href=" <?= site_url('mapel/edit/' . $row['id_mapel']) ?>" class="btn btn-secondary">Edit</a>

                        <form action="<?= site_url('mapel/delete/' . $row['id_mapel']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Yakin Mau Hapus ?')">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan=" 4">Belum ada data mapel
                </td>
            </tr>
        <?php endif; ?>
    </table>

    <?php if (isset($pager)) : ?>
        <?= custom_pagination($pager, 'mapel') ?>
    <?php endif; ?>

</body>

</html>
<?= $this->endSection(); ?>