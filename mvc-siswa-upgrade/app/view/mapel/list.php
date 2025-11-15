<?php
require_once BASE_PATH . '/app/model/Mapel.php';
require_once BASE_PATH . '/app/helper/pagination.php';

$mapel = new Mapel();
// $data = $mapel->tampil();

if (isset($_GET['pesan']) && $_GET['pesan'] === 'sukses') {
    echo "Data Berhasil Tersimpan";
}
if (isset($_GET['pesan']) && $_GET['pesan'] === 'hapus') {
    echo "Data Berhasil Terhapus";
}
if (isset($_GET['pesan']) && $_GET['pesan'] === 'update') {
    echo "Data Berhasil Teredit";
}

// persiapan pagination
$jumlahDataPerHalaman = 5;
$halamanAktif = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($halamanAktif - 1) * $jumlahDataPerHalaman;

// searching + pagination
if (isset($_GET['cari']) && $_GET['cari'] !== '') {
    $keyword = $_GET['cari'];
    $data = $mapel->cari($keyword, $jumlahDataPerHalaman, $offset);
    $jumlahData = $mapel->countCariByMapel($keyword);
} else {
    $data = $mapel->tampil($jumlahDataPerHalaman, $offset);
    $jumlahData = $mapel->countAll();
}
$totalHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

?>

<div class="form-baris">
    <a href="<?= BASE_URL ?>/mapel/form" class="btn btn-tambah">Tambah Mapel</a>
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
                <a href="<?= BASE_URL ?>/mapel/form/<?= $row['id_mapel'] ?>" class="btn btn-edit">Edit</a>

                <form action="<?= BASE_URL ?>/mapel/hapus" method="post" class="aksi-button" 
                    onsubmit="return confirm('Yakin ingin hapus data ini ?')">
                    <input type="hidden" name="id" value="<?= $row['id_mapel']?>">
                    <button type="submit" class="btn btn-hapus">Hapus</button>
                </form>
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
