<?php
/** @var \CodeIgniter\Pager\Pager $pager */  
/** @var string|null $keyword */

$currentPage = $pager->getCurrentPage();
?>

<div class="pagination" style="display: flex; gap: 5px; margin-top: 15px; align-items: center;">
    
    <div style="padding: 5px 10px; border: 1px solid #333; background-color: #222; color: #fff; font-weight: bold; font-size: 14px; margin-right: 10px;">
        Page <?= $currentPage ?> of <?= $pager->getPageCount() ?>
    </div>

    <?php if ($currentPage > 1): ?>
        <a href="?page=<?= $currentPage - 1 ?><?= (!empty($keyword)) ? '&keyword='.urlencode($keyword) : '' ?>" style="padding: 5px 12px; border: 1px solid #ccc; text-decoration: none; color: black; background-color: transparent;">&#9666;</a>
    <?php endif; ?>

    <?php
    $startPage = max(1, $currentPage - 2);
    $endPage   = min($pager->getPageCount(), $currentPage + 2);

    if ($currentPage == 1) {
        $endPage = min($pager->getPageCount(), 3);
    } elseif ($currentPage == 2) {
        $endPage = min($pager->getPageCount(), 4);
    }
    
    for ($i = $startPage; $i <= $endPage; $i++) :
        if ($i == $currentPage) : ?>
            <span style="padding: 5px 15px; border: 1px solid #00bcd4; background-color: #00bcd4; color: white; font-weight: bold; text-align: center;">
                <?= $i ?>
            </span>
        <?php else : ?>
            <a href="?page=<?= $i ?><?= (!empty($keyword)) ? '&keyword='.urlencode($keyword) : '' ?>" style="padding: 5px 12px; border: 1px solid #ccc; text-decoration: none; color: black; background-color: transparent;">
                <?= $i ?>
            </a>
        <?php endif;
    endfor;
    ?>

    <?php if ($currentPage < $pager->getPageCount()): ?>
        <a href="?page=<?= $currentPage + 1 ?><?= (!empty($keyword)) ? '&keyword='.urlencode($keyword) : '' ?>" style="padding: 5px 12px; border: 1px solid #ccc; text-decoration: none; color: black; background-color: transparent;">&#9656;</a>
    <?php endif; ?>

</div>