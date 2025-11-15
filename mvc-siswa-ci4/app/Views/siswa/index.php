<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Siswa</title>
</head>

<body>
    <h2>Data Siswa</h2>

    <div class="toolbar">
        <!-- Tombol Tambah -->
        <a href=" <?= site_url('siswa/create') ?> " class="btn btn-primary">Tambah Siswa</a>

        <!-- Search Form -->
        <form action="<?= site_url('siswa'); ?>" method="get" style="margin-bottom: 15px; display:flex; gap:5px;">
            <input
                type="text"
                name="q"
                placeholder="Cari nama / NIS / alamat / mapel..."
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
            <th>NIS</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th>Mapel</th>
            <th>Aksi</th>

        </tr>
        <?php if (!empty($siswa) && is_array($siswa)) : ?>
            <?php foreach ($siswa as $row) : ?>
                <tr>
                    <td><?= esc($row['id']); ?></td>
                    <td><?= esc($row['nis']); ?></td>
                    <td><?= esc($row['nama']); ?></td>
                    <td><?= esc($row['umur']); ?></td>
                    <td><?= esc($row['alamat']); ?></td>
                    <td>
                        <?= !empty($row['mapel_list']) ? esc($row['mapel_list']) : '-' ?>
                    </td>
                    <td>
                        <a href=" <?= site_url('siswa/edit/' . $row['id']) ?>" class="btn btn-secondary">Edit</a>

                        <form action=" <?= site_url('siswa/delete/' . $row['id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Yakin Mau Hapus ?')">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        <a href=" <?= site_url('siswa/reset-password/' . $row['id']) ?>"
                            onclick="return confirm('Yakin reset password siswa <?= $row['nis']; ?> ini ?')" class="btn btn-warning">
                            Reset
                        </a>
                    </td>

                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="5">Belum ada data siswa.</td>
            </tr>
        <?php endif; ?>
    </table>

    </table>

    <?php if (isset($pager)) : ?>
        <?= custom_pagination($pager, 'siswa') ?>
    <?php endif; ?>


</body>

</html>
<?= $this->endSection(); ?>