
<div class="form-baris">
    <?php if ($_SESSION['user']['role'] === 'admin') : ?>
        <a href="<?= BASE_URL ?>/siswa/form" class="btn btn-tambah">Tambah Siswa</a>
    <?php endif ?>  

    <form method="get">
        <input type="text" name="cari" value="<?= $_GET['cari'] ?? '' ?>" placeholder="Cari ...">
        <input type="submit" value="Cari">
    </form>
</div>



<table border="1" cellpadding='10' cellspacing='0'>
    <tr>
        <th>No</th>
        <th>ID</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>Alamat</th>
        <th>Mata Pelajaran</th>
        <th>Aksi</th>
    </tr>
    <?php 
    $no = ($halamanAktif - 1) * $jumlahDataPerHalaman + 1;
    while ($row = $data->fetch_assoc()) :?>
    <tr>
        <td><?= $no++?></td>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nis'] ?></td>
        <td><?= $row['nama']?></td>
        <td><?= $row['umur']?></td>
        <td><?= $row['alamat']?></td>
        <td>
            <?= implode(", ", $siswaMapel->getNamaMapelBySiswa($row['id']))?>
        </td>
        <td>
            <div class="aksi-container">
                <?php if ($_SESSION['user']['role'] === 'admin') : ?>
                    <a href="<?= BASE_URL ?>/siswa/form/<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                    <form action="<?= BASE_URL ?>/siswa/destroy" method="post" class="aksi-button"
                        onsubmit="return confirm('Yakin ingin hapus data ini ?')" >
                        <input type='hidden' name='id' value="<?= $row['id']?>">
                        <button type="submit" class="btn btn-hapus">Hapus</button>
                    </form> 
                <?php elseif ($_SESSION['user']['role'] === 'guru') : ?>
                    <a href="<?= BASE_URL ?>/siswa/form/<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                <?php else : ?>
                    <em>Tidak ada aksi</em>
                <?php endif ?>
            </div>
            
        </td>
    </tr>
    <?php endwhile ?>
</table>

<!-- pagination -->
<div class="pagination">
    <?php 
    pagination(
        $jumlahData, 
        $jumlahDataPerHalaman, 
        $halamanAktif, 
        ['cari' => $_GET['cari'] ?? ''],
        '/siswa'
        );
    ?>

    
</div>