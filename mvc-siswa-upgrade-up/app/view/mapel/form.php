<h2>Form Mapel</h2>

<?php if($error = Flash::get('error')) : ?>
    <div style="color: red; margin-bottom: 10px">
        <?php foreach ($error as $e) : ?>
            <div><?= htmlspecialchars($e) ?></div>
        <?php endforeach?>
    </div>
<?php endif ?>

<?php $old = Flash::get('old')  ?>

<form action="<?= isset($data['id_mapel']) ? BASE_URL .'/mapel/update' :  BASE_URL . '/mapel/store'?>" method="POST">

    <?php if(isset($data['id_mapel'])) : ?>
            <input type="hidden" name="id" value="<?= $data['id_mapel']?>">
    <?php endif ?>

    <label for="nama">Nama :
        <input type="text" name="nama" id="nama" value="<?=  $old['nama']  ?? $data['nama'] ?? '' ?>" required>
    </label>
    <br>
    <input type="submit" value="<?= isset($data['id_mapel']) ? 'Update' : 'Simpan' ?>">
</form>