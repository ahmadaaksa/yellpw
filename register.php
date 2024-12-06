<?php
include 'db.php';

$message="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        $message = "<div class='pesan-sukses'>Registrasi berhasil! <a href='login.php'>Login di sini</a></div>";
    } else {
        $message = "<div class='pesan-eror'>Error: " . $conn->error . "</div>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun Baru</title>
   
</head>
<body>
<link rel="stylesheet" href="style.css">
    <header class="header">
        <h1>Selamat Datang di Yellppw</h1>
        <p>Platform untuk berbagi ide dan pengalaman.</p>
        <nav class="nav-menu">        
            <div class="dropdown1">
                <a href="index.php">Beranda</a>
                <div class="dropdown-beranda">
                    <a href="register.php">Daftar Akun Baru</a>
                    <a href="login.php">Login</a>
                </div>
        
            </div>
            <div class="dropdown"> 
                <a href="tentang.php">Tentang Kami</a>
                <div class="dropdown-content">
                    <a href="misi.php">Misi Kami</a>
                    <a href="tim.php">Tim Kami</a>
                </div>
            </div>
            <a href="kontak.php">Kontak</a>
          
        <button class="toggle-btn" onclick="toggleMode()">Ganti Mode</button>
    </div>
        </nav>
    </header>

<main>
<link rel="stylesheet" href="style.css">
    <div class="menu-register">
   
    <h1>Daftar Akun Baru</h1>
    <form action="register.php" method="POST" onsubmit="showLoading()">
        <div class="form-group">
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn-submit">Daftar</button><br>
        <?php if (!empty($message)) echo $message; ?>
        
    </form>
    <div id="loading"></div>
</div>
    <script>
        function showLoading() {
            document.getElementById('loading').style.display = 'block';
        }

        function toggleMode() {
            document.body.classList.toggle('dark-mode');
        }
    </script>
    
</body>
</html>
