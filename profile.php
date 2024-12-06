<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header(header: "Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query(query: $sql);
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    
    $update_sql = "UPDATE users SET username='$username' WHERE id='$user_id'";
    
    if ($conn->query(query: $update_sql) === TRUE) {
        $_SESSION['username'] = $username;
        header(header: "Location: profile.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <h1>Halo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        
        <!-- Menampilkan foto profil jika ada -->
        <?php if (!empty($user['profile_pic'])): ?>
            <img src="uploads/<?php echo htmlspecialchars($user['profile_pic']); ?>" alt="Foto Profil" width="150"><br>
        <?php else: ?>
            <p>Belum ada foto profil.</p>
        <?php endif; ?>

        <a class="button-link" href="edit.php">Perbarui</a>
        <a class="button-link" href="logout.php">Logout</a>
    </header>
</body>
</html>

