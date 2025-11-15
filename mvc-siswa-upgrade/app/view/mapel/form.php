<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $mapelModel = new Mapel();
    $data = $mapelModel->ambil($id);
}

?>
<h2>Form Mapel</h2>

<?php if (isset($_GET['error'])) : ?>
    <p style="color: red;">
        <?= htmlspecialchars($_GET['error']) ?>
    </p>
<?php endif; ?>

<form action="<?= isset($data) ? BASE_URL .'/mapel/update' :  BASE_URL . '/mapel/simpan'?>" method="POST">
    <input type="hidden" name="aksi" value="<?= isset($data) ? 'update' : 'simpan'?>">

    <?php if(isset($data)) : ?>
            <input type="hidden" name="id" value="<?= $data['id_mapel']?>">
    <?php endif ?>

    <label for="nama">Nama :
        <input type="text" name="nama" id="nama" value="<?=  $_GET['nama']  ?? $data['nama'] ?? '' ?>" required>
    </label>
    <br>
    <input type="submit" value="<?= isset($data) ? 'Update' : 'Simpan' ?>">
</form>