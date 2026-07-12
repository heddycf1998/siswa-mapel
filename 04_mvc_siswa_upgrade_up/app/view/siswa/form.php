<h2>Form Siswa</h2>

<?php if($error = Flash::get('error')) : ?>
    <div style="color: red; margin-bottom: 10px">
        <?php foreach ($error as $e) : ?>
            <div><?= htmlspecialchars($e) ?></div>
        <?php endforeach?>
    </div>
<?php endif ?>

<?php $old = Flash::get('old')  ?>

<form action="<?= isset($data['id']) ? BASE_URL . '/siswa/update' : BASE_URL . '/siswa/store' ?>" method="POST">
  
    <?php if(isset($data['id'])) : ?>
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <?php endif ?>
    
    <label for="nama">Nama :
        <input type="text" name="nama" id="nama" value="<?= $old['nama'] ?? $data['nama'] ?? '' ?>" required>
    </label>
    <br>
    <label for="umur">Umur :
        <input type="number" name="umur" id="umur"  value="<?= $old['umur'] ?? $data['umur'] ?? '' ?>" required>
    </label>
    <br>
    <label for="alamat">Alamat :
        <input type="text" name="alamat" id="alamat" value="<?= $old['alamat'] ?? $data['alamat'] ?? '' ?>" required>
    </label>
    <br>
    <label>Mata Pelajaran : </label>
    <br>
    
    <?php foreach($daftar_mapel as $m) :?>
        <label>
            <input type="checkbox" name="mapel[]" value="<?= $m['id_mapel'] ?>" 
            <?= in_array($m['id_mapel'], $mapel_terpilih) ? 'checked' : '' ?> >
            <?= htmlspecialchars($m['nama']) ?>
        </label>
        <br>
    <?php endforeach ?>
    
    <input type="submit" value="<?= isset($data['id']) ? 'Update' : 'Simpan'?>">
</form>