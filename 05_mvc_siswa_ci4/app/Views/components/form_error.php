<?php
/**
 * @var string $field
 */
$errors = session('_ci_validation_errors');
?>

<?php if (isset($errors[$field])) : ?>
    <small class="form-error-box "> 
        <?= $errors[$field] ?>
    </small>
<?php endif ?>