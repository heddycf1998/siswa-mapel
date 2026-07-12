<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="/assets/css/auth/login.css">
</head>

<body>
    <div class="login-container">
        <h2 class="title">Login</h2>

        <?= view('components/flash_message') ?>

        <form action="<?= site_url('login/process') ?>" method="post" class="login-form">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" autocomplete="off" required>
                <?= view('components/form_error', ['field' => 'username']) ?>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-password-container">
                    <input type="password" name="password" id="password" required>
                    <button type="button" id="toggle-password" class="toggle-password">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                </div>

                </button>
                <?= view('components/form_error', ['field' => 'password']) ?>
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>

    <script src="/assets/js/toggle-password.js"></script>
</body>

</html>