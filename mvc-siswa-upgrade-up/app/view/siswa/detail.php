<h2>Detail Siswa</h2>

<?php if (!empty($findSiswa)) : ?>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Nama</th>
            <td><?= htmlspecialchars($findSiswa['nama']) ?></td>
        </tr>
        <tr>
            <th>Umur</th>
            <td><?= htmlspecialchars($findSiswa['umur']) ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?= htmlspecialchars($findSiswa['alamat']) ?></td>
        </tr>
        <tr>
            <th>Mata Pelajaran</th>
            <td>
                <?php if (!empty($mapel_terpilih)) : ?>
                    <ul>
                        <?php foreach ($mapel_terpilih as $nama_mapel) :?>
                        <li><?= htmlspecialchars($nama_mapel) ?></li>
                        <?php endforeach ?>
                    </ul>
                <?php else : ?>
                    <em>Tidak ada mata pelajaran terpilih</em>
                <?php endif ?>
            </td>
        </tr>
    </table>
    <br>
<?php else : ?>
    <p>Data siswa tidak ditemukan</p>
<?php endif ?>