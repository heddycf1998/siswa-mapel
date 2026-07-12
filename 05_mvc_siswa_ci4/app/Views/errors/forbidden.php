<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>403 Forbidden</title>
    <link rel="stylesheet" href="/assets/css/errors/error.css">
    <link rel="stylesheet" href="/assets/css/errors/forbidden.css">
</head>

<body>
    <div class="error-container">
        <h1 class="error-code">403</h1>
        <p class="error-message">Access Forbidden</p>
        <p class="error-message">Anda tidak memiliki izin untuk mengakses halaman ini.</p>
        <a href="<?= $buttonUrl ?>" class="error-button"><?= $buttonText ?></a>
    </div>
</body>

</html>