<?php
include 'auth.php';
include 'koneksi.php';
include $_SERVER['DOCUMENT_ROOT'] . '/latihan-php/procedural/nav.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
        }
        nav {
            background-color: #333;
            display: flex;
            justify-content: center;
        }
        nav a {
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        nav a:hover {
            background-color: #575757;
        }
        main {
            padding: 20px;
        }
        .welcome {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
        }
    </style> -->
</head>
<body>
    <header>
        <h2>Selamat Datang , <?= $_SESSION['username']?></h2>
    </header>
    
    <main>
        <div class="welcome">
            <h2>Dashboard</h2>
            <p>Silahkan Pilih menu dari navigasi di atas untuk mengelola data.</p>
        </div>
    </main>
</body>
</html>
