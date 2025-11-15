<?php
// Berubah sesuai halaman tempat kode dijalankan X
// $base = dirname($_SERVER['SCRIPT_NAME']);

require_once BASE_PATH . '/app//model/Mapel.php';
require_once BASE_PATH . '/app/model/SiswaMapel.php';

$mapel = new Mapel();
$daftar_mapel = $mapel->tampil();

$siswaMapel = new SiswaMapel();
$mapel_terpilih = [];

if (isset($_GET['mapel'])) {
    $mapel_terpilih = $_GET['mapel'];
} elseif (isset($data['id'])) {
    $mapel_terpilih = $siswaMapel->getMapelBySiswa($data['id']);
} else {
    $mapel_terpilih = [];
}

?>

<h2>Form Siswa</h2>

<?php if(isset($_GET['error'])) : ?>
    <div style="color: red; margin-bottom: 10px">
        <?php foreach (explode('|', $_GET['error']) as $error) : ?>
            <div><?= htmlspecialchars($error) ?>
            </div>
        <?php endforeach?>
    </div>
<?php endif?>

<form action="<?= BASE_URL ?>/index.php?menu=siswa&aksi=simpan" method="POST">
    <input type="hidden" name="aksi" value="<?= isset($data) ? 'update' : 'simpan'?>">
    
    <?php if(isset($data)) : ?>
        <input type="hidden" name="id" value="<?= $data['id']?>">
    <?php endif ?>
    
    <label for="nama">Nama :
        <input type="text" name="nama" id="nama" value="<?= $_GET['nama'] ?? $data['nama'] ?? '' ?>" required>
    </label>
    <br>
    <label for="umur">Umur :
        <input type="number" name="umur" id="umur"  value="<?= $_GET['umur'] ?? $data['umur'] ?? '' ?>" required>
    </label>
    <br>
    <label for="alamat">Alamat :
        <input type="text" name="alamat" id="alamat" value="<?= $_GET['alamat'] ?? $data['alamat'] ?? '' ?>" required>
    </label>
    <br>
    <label>Mata Pelajaran : </label>
    <br>
    <?php while($m = $daftar_mapel->fetch_assoc()) :?>
        <label>
            <input type="checkbox" name="mapel[]" value="<?= $m['id_mapel']?>" <?= in_array($m['id_mapel'], $mapel_terpilih)? 'checked' : '' ?> >
            <?= $m['nama']?>
        </label>
        <br>
    <?php endwhile ?>
    
    <input type="submit" value="<?= isset($data) ? 'Update' : 'Simpan'?>">
</form>