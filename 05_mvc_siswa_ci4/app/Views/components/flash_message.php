<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif ?>

<?php if (session()->getFlashdata('errors')) : ?>
    <div class="alert alert-error">
        <?= session()->getFlashdata('errors') ?>
    </div>
<?php endif ?>