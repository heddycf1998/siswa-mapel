
<div class="form-baris">
    <?php if ($_SESSION['user']['role'] === 'admin') : ?>
        <a href="<?= BASE_URL ?>/mapel/form" class="btn btn-tambah">Tambah Mapel</a>
    <?php endif?>

    <form method="get">
        <input type="text" name="cari" value="<?= $_GET['cari'] ?? '' ?>" placeholder="Cari ...">
        <input type="submit" value="Cari">
    </form>
</div>

<table border="1"> 
    <tr>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = $data->fetch_assoc()) : ?>
    <tr>
        <td><?= $row['nama']?></td>
        <td>
            <div class="aksi-container">
                <?php if ($_SESSION['user']['role'] === 'admin') : ?>
                    <a href="<?= BASE_URL ?>/mapel/form/<?= $row['id_mapel'] ?>" class="btn btn-edit">Edit</a>
                    <form action="<?= BASE_URL ?>/mapel/destroy" method="post" class="aksi-button" 
                    onsubmit="return confirm('Yakin ingin hapus data ini ?')">
                    <input type="hidden" name="id" value="<?= $row['id_mapel']?>">
                    <button type="submit" class="btn btn-hapus">Hapus</button>
                </form>
                <?php elseif ($_SESSION['user']['role'] === 'guru') : ?>
                    <a href="<?= BASE_URL ?>/mapel/form/<?= $row['id_mapel'] ?>" class="btn btn-edit">Edit</a>
                <?php else : ?>
                    <em>Tidak ada aksi</em>
                <?php endif?> 
            </div>
        </td>
    </tr>
    <?php endwhile?>
</table>

<!-- pagination -->
 <div class="pagination">
        <?php
            pagination(
                $jumlahData, 
                $jumlahDataPerHalaman, 
                $halamanAktif, 
                ['cari' => $_GET['cari'] ?? ''],
                '/mapel/list');
        ?>
 </div>
