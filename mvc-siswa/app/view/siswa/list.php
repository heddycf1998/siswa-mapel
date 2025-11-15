<?php
require_once BASE_PATH . '/app/model/Siswa.php';
require_once BASE_PATH . '/app/model/SiswaMapel.php';
require_once BASE_PATH . '/app/helper/pagination.php';

$siswa = new Siswa();

$siswaMapel = new SiswaMapel();

if (isset($_GET['pesan']) && $_GET['pesan'] === 'sukses') {
    echo "Data Berhasil Tersimpan";
}
if (isset($_GET['pesan']) && $_GET['pesan'] === 'hapus') {
    echo "Data Berhasil Terhapus";
}
if (isset($_GET['pesan']) && $_GET['pesan'] === 'update') {
    echo "Data Berhasil Teredit";
}

$jumlahDataPerHalaman = 5;
$halamanAktif = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$offset = ($halamanAktif - 1) * $jumlahDataPerHalaman;

if (isset($_GET['cari']) && $_GET['cari'] !== '') {
    $keyword = $_GET['cari'];
    $data = $siswa->cari($keyword, $jumlahDataPerHalaman, $offset);
    $jumlahData = $siswa->countCariByMapel($keyword);
} else {
    $data = $siswa->tampil($jumlahDataPerHalaman, $offset);
    $jumlahData = $siswa->countAll();
}
$totalHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
?>

<div class="form-baris">
    <form action="<?= BASE_URL ?>/index.php" method="get">
        <input type="hidden" name="menu" value="siswa">
        <input type="hidden" name="aksi" value="form">
        <input type="submit" value="Tambah Siswa">
    </form>
    <form action="<?= BASE_URL ?>/index.php" method="get">
        <input type="hidden" name="menu" value="siswa">
        <input type="hidden" name="aksi" value="list">
        <input type="text" name="cari" value="<?= $_GET['cari'] ?? '' ?>" placeholder="Cari nama ...">
        <input type="submit" value="Cari">
    </form>
</div>

<?php
// tes REQUEST_URI
$request =  $_SERVER['REQUEST_URI'];
?>
<p><?= $request?></p>

<table border="1" cellpadding='10' cellspacing='0'>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>Alamat</th>
        <th>Mata Pelajaran</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = $data->fetch_assoc()) :?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nama']?></td>
        <td><?= $row['umur']?></td>
        <td><?= $row['alamat']?></td>
        <td>
            <?= implode(", ", $siswaMapel->getNamaMapelBySiswa($row['id']))?>
        </td>
        <td>
            <div class="aksi-container">
                <form action="<?= BASE_URL ?>/index.php" method="get" class="aksi-button">
                    <input type="hidden" name="menu" value="siswa">
                    <input type="hidden" name="aksi" value="form">
                    <input type='hidden' name='id' value="<?= $row['id']?>">
                    <input type="submit" value="Edit">
                </form>

                <form action="<?= BASE_URL ?>/index.php?menu=siswa&aksi=hapus" method="post" class="aksi-button"
                    onsubmit="return confirm('Yakin ingin hapus data ini ?')" >
                    <input type="hidden" name="aksi" value="hapus">
                    <input type='hidden' name='id' value="<?= $row['id']?>">
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
                'menu' => 'siswa',
                'aksi' => 'list',
                'cari' => $_GET['cari'] ?? ''
            ]);
    ?>

    
</div>