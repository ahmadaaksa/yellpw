<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $profile_pic_name = $user['profile_pic']; // Default ke foto profil yang sudah ada

    // Proses unggah file
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $profile_pic_name = basename($_FILES['profile_pic']['name']);
        $target_file = $target_dir . $profile_pic_name;

        // Validasi file
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

        // Validasi ukuran file (maks 2MB)
        if ($_FILES['profile_pic']['size'] > 2000000) { // 2MB
            echo "Ukuran file terlalu besar. Maksimal 2MB.";
            exit();
        }

        // Validasi format file
        if (!in_array($imageFileType, $allowed_types)) {
            echo "Format file tidak valid. Gunakan JPG, JPEG, PNG, atau GIF.";
            exit();
        }

        // Cek apakah direktori target ada
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true); // Buat folder jika belum ada
        }

        // Pindahkan file ke direktori target
        if (!move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
            echo "Gagal mengunggah file.";
            exit();
        }
    }

    // Perbarui database
    $update_sql = "UPDATE users SET username='$username', profile_pic='$profile_pic_name' WHERE id='$user_id'";
    if ($conn->query($update_sql) === TRUE) {
        $_SESSION['username'] = $username;
        header("Location: profile.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
</head>
<body>
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
<link rel="stylesheet" href="style.css">
<main>
    
    <h1>Edit Profil Anda</h1>
    <form action="edit.php" method="POST" enctype="multipart/form-data">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required><br><br>
        
        <label for="profile_pic">Upload Foto Profil:</label><br>
        <input type="file" id="profile_pic" name="profile_pic" accept="image/*"><br><br>
        
        <input type="submit" value="Simpan">
    </form>

</main>
</body>
</html>
