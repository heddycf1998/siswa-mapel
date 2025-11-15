<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login_cek.php" method="post">
        <label for="username">Username:
            <input type="text" name="username" id="username"><br><br>
        </label> 
        <label for="password">
            Password: <input type="password" name="password" id="password"><br><br>
        </label>
        <input type="submit" value="Login">
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </form>
</body>
</html>