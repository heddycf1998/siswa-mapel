<h2>Form Mapel</h2>
<form action="<?= BASE_URL?>/index.php?menu=mapel&aksi=simpan" method="POST">
    <input type="hidden" name="aksi" value="<?= isset($data) ? 'update' : 'simpan'?>">
    <?php if(isset($data)) : ?>
            <input type="hidden" name="id" value="<?= $data['id_mapel']?>">
    <?php endif?>
    <label for="nama">Nama :
        <input type="text" name="nama" id="nama" value="<?= $data['nama'] ?? '' ?>" required>
    </label>
    <br>
    <input type="submit" value="<?= isset($data) ? 'Update' : 'Simpan' ?>">
</form>