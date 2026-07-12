<?php
include '../auth.php';
include '../koneksi.php';

$result = $koneksi->query("SELECT * FROM siswa");
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>Alamat</th>
        <th>Mata Pelajaran</th>
        <th>Aksi</th>
    </tr>";
while($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['nama']}</td>
        <td>{$row['umur']}</td>
        <td>{$row['alamat']}</td>
        <td>";
        $id_siswa = $row['id'];
        $mapel_result = $koneksi->query("SELECT mapel.nama 
                                FROM siswa_mapel
                                JOIN mapel ON siswa_mapel.id_mapel = mapel.id_mapel
                                WHERE siswa_mapel.id_siswa = $id_siswa
                                ");
        $nama_mapel = [];
        while($mapel = $mapel_result->fetch_assoc()) {
            $nama_mapel[] = $mapel['nama'];
        }
        echo implode(', ', $nama_mapel);
    echo  "</td>
        <td>
            <form action='hapus.php' method='post' style='display:inline' onsubmit='return confirm(\"Yakin Ingin Hapus Data ?\")'>
            <input type='hidden' name='id' value='{$row['id']}'>
            <input type='submit' value='Hapus'>
            </form>

            <form action='update.php' method='post' style='display:inline'>
            <input type='hidden' name='id' value='{$row['id']}'>
            <input type='submit' value='Update'>
            </form>
            </td>
    </tr>";
}
echo "</table>";
?>