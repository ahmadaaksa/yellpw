<?php
include 'db.php'; // Koneksi ke database
session_start();  // Memulai sesi

// Memeriksa apakah form dikirimkan menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Membuat prepared statement untuk menghindari SQL Injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    if ($stmt) {
        // Mengikat parameter 'username' (tipe 's' = string) ke query
        $stmt->bind_param("s", $username);
        
        // Menjalankan statement
        $stmt->execute();
        
        // Mengambil hasil eksekusi
        $result = $stmt->get_result();

        // Memeriksa apakah username ditemukan
        if ($result->num_rows > 0) {
            // Mendapatkan data pengguna dari hasil query
            $user = $result->fetch_assoc();
            
            // Memverifikasi password yang diinput dengan hash di database
            if (password_verify($password, $user['password'])) {
                // Jika password benar, set sesi pengguna
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                
                // Redirect ke halaman profil
                header("Location: profile.php");
                exit(); // Menghentikan eksekusi script setelah redirect
            } else {
                // Jika password salah
                echo "Password salah!<br><a href='login.php'>Coba lagi</a>";
            }
        } else {
            // Jika username tidak ditemukan
            echo "Username tidak ditemukan!<br><a href='login.php'>Coba lagi</a>";
        }

        // Menutup statement
        $stmt->close();
    } else {
        echo "Terjadi kesalahan dalam query.";
    }

    // Menutup koneksi database
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun Baru</title>
</head>
<body>
    <!-- Header -->
    <header class="header">
    <link rel="stylesheet" href="style.css">

        <h1>Selamat Datang di Yellppw</h1>
        <p>Platform untuk berbagi ide dan pengalaman.</p>

        <!-- Menu Navigasi -->
        <nav class="nav-menu">
            
            <div class="dropdown1">
                <a href="index.php">Beranda</a>
                <div class="dropdown-beranda">
                    <a href="register.php">Daftar Akun Baru</a>
                    <a href="login.php">Login</a>
                </div>
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

    <script>
        // Fungsi untuk mengubah mode terang/gelap
        function toggleMode() {
            document.body.classList.toggle('dark-mode');
        }
    </script>
        </nav>
        
    </header>
    <div class="frame">
    <link rel="stylesheet" href="style.css">
    <h2>Masukkan informasi login Anda:</h2>
    
    <!-- Form untuk login -->
    <form action="login.php" method="POST" onsubmit="showLoading()">
        <div class="form-group">
    <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        </div>
    <div class="form-group">
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" class="button-link" value="Login"><br><br> <!-- Tombol login dengan class button-link -->
    </form>
    </div>
    <script>
        // Fungsi untuk mengubah mode terang/gelap
        function toggleMode() {
            document.body.classList.toggle('dark-mode');
        }
    </script>
</body>
</html>
