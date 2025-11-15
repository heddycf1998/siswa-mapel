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
$halamanAktif = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
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
    <form action="<?= BASE_URL ?>/index.php" method="get">
        <input type="hidden" name="menu" value="mapel">
        <input type="hidden" name="aksi" value="form">
        <input type="submit" value="Tambah Mapel">
    </form>
    <form action="<?= BASE_URL ?>/index.php" method="get">
        <input type="hidden" name="menu" value="mapel">
        <input type="hidden" name="aksi" value="list">
        <input type="text" name="cari" value="<?= $_GET['cari'] ?? '' ?>" placeholder="Cari nama ...">
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
                <form action="<?= BASE_URL ?>/index.php" method="get" class="aksi-button">
                    <input type="hidden" name="menu" value="mapel">
                    <input type="hidden" name="aksi" value="form">
                    <input type="hidden" name="id_mapel" value="<?= $row['id_mapel']?>">
                    <input type="submit" value="Edit">
                </form>
                <form action="<?= BASE_URL ?>/index.php?menu=mapel&aksi=hapus" method="post" class="aksi-button" 
                    onsubmit="return confirm('Yakin ingin hapus data ini ?')">
                    <input type="hidden" name="aksi" value="hapus">
                    <input type="hidden" name="id" value="<?= $row['id_mapel']?>">
                    <input type="submit" value="Hapus">
                </form>
            </div>
        </td>
    </tr>
    <?php endwhile?>
</table>

<!-- pagination -->
 <div class="pagination">
        <?php
            pagination($jumlahData, $jumlahDataPerHalaman, $halamanAktif, 
            [
                'menu' => 'mapel',
                'aksi' => 'list',
                'cari' => $_GET['cari'] ?? ''
            ]);
        ?>
 </div>
