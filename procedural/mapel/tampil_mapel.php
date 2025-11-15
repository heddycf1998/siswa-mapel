<?php
include '../auth.php';
include '../koneksi.php';

$result = $koneksi->query("SELECT * FROM mapel");
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr>
        <th>ID Mapel</th>    
        <th>Nama Mapel</th>   
        <th>Aksi</th>   
    </tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id_mapel']}</td>
            <td>{$row['nama']}</td>
            <td>
                <form action='hapus_mapel.php' method='post' style='display:inline' onsubmit='return confirm(\"Yakin Ingin Hapus Data ?\")'>
                <input type='hidden' name='id_mapel' value='{$row['id_mapel']}'>
                <input type='submit' value='Hapus'>
                </form>

                <form action='update_mapel.php' method='post' style='display:inline'>
                <input type='hidden' name='id_mapel' value='{$row['id_mapel']}'>
                <input type='submit' value='Update'>
                </form>
                </td>
        </tr>";
}
echo "</table>";
?>