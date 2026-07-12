<?php
include '../auth.php';
include '../koneksi.php';
include $_SERVER['DOCUMENT_ROOT'] . '/latihan-php/procedural/nav.php';

$id = $_POST['id'];
$result = $koneksi->query("SELECT * FROM siswa WHERE id = '$id'");
$data = $result->fetch_assoc();

$mapel_terpilih = [];
$result_siswa_mapel = $koneksi->query("SELECT id_mapel FROM siswa_mapel WHERE id_siswa = '$id'");
while($row = $result_siswa_mapel->fetch_assoc()) {
    $mapel_terpilih[] = $row['id_mapel'];
}
?>

<h2>Form Input Siswa</h2>
    <form action="update_db.php" method="post">
        <input type="hidden" name="id" value="<?= $data['id']?>">
        Nama : <input type="text" name="nama" value="<?= $data['nama']?>"/><br/><br/>
        Umur : <input type="number" name="umur" value="<?= $data['umur']?>"/><br/><br/>
        Alamat : <input type="text" name="alamat" value="<?= $data['alamat']?>"/><br/><br/>
        <h4>Pilih Mata Pelajaran</h4>
        <?php 
        $result_mapel = $koneksi->query("SELECT * FROM mapel");
        while ($row = $result_mapel->fetch_assoc()) {
            $checked = in_array($row['id_mapel'], $mapel_terpilih) ? 'checked' : '';
            echo "<label>
                    <input type='checkbox' name='mapel[]' value='{$row['id_mapel']}' $checked> {$row['nama']} 
                </label>
                <br/>" ;
        }
        ?>
        <input type="submit" value="Update"></input>
    </form>