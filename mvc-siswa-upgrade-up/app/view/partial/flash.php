
<div class="flash-container">
    <?php if ($msg = Flash::get('success')) : ?>
        <div class="flash success">
            <?php renderFlashMassage($msg) ?>
        </div>
    <?php endif ?>

     <?php if ($msg = Flash::get('error')) : ?>
         <div class="flash error">
            <?php renderFlashMassage($msg) ?>
           </div>
     <?php endif ?>

    <?php if ($msg = Flash::get('info')) : ?>
         <div class="flash info">
            <?php renderFlashMassage($msg) ?>
         </div>
      <?php endif ?>
</div>