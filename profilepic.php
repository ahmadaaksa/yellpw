<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $profile_pic = $user['profile_pic']; // Default, jika tidak mengunggah gambar baru

    // Jika ada file yang diunggah
    if (!empty($_FILES['profile_pic']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

        // Cek apakah file adalah gambar
        $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
        if ($check === false) {
            echo "File bukan gambar.";
            exit();
        }

        // Cek tipe file gambar yang diperbolehkan
        if (!in_array($imageFileType, $allowed_types)) {
            echo "Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
            exit();
        }

        // Cek apakah file berhasil di-upload
        if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
            $profile_pic = basename($_FILES["profile_pic"]["name"]); // Simpan nama file
        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
            exit();
        }
    }

    // Update username dan profile_pic di database
    $update_sql = "UPDATE users SET username=?, profile_pic=? WHERE id=?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ssi", $username, $profile_pic, $user_id);

    if ($update_stmt->execute()) {
        $_SESSION['username'] = $username;
        header("Location: profile.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

