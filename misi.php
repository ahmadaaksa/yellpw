<!DOCTYPE html>
<lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>etc</title>
</head>
<bo>
    <!-- Header -->
    <header class="header">
    <link rel="stylesheet" href="style.css">
        <h1>Yellppw etc</h1>
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
        </nav>
        
    </header>
    <!-- Konten Utama -->
    <main>
    <link rel="stylesheet" href="style.css">
    <h1>Misi Kami</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Kami berkomitmen untuk:</p>
    <ul>
        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
        <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco.</li>
        <li>Duis aute irure dolor in reprehenderit in voluptate.</li>
        <li>Excepteur sint occaecat cupidatat non proident.</li>
    </ul>
    <p>Nulla facilisi. Cras dapibus ligula id odio tincidunt, a volutpat enim molestie.</p>
    </main>
    </body>
    <script>

        function toggleMode() {
            document.body.classList.toggle('dark-mode');
        }
    </script>
    <footer class="footer">
        <p>&copy; 2024 Yellppw. Semua Hak Dilindungi.</p>
    </footer>