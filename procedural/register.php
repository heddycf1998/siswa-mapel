<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form action="register_proses.php" method="post">
        <label for="username">Username:
            <input type="text" name="username" id="username" required><br><br>
        </label>
        <label for="password">Password:
            <input type="password" name="password" id="password" required><br><br>
        </label>
        <input type="submit" value="Daftar">
    </form>
    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
</body>
</html>
