!DOCTYPE 
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Landing Page - Yellppw</title>
	</head>
	<body>
		<header class="header">
			<link rel="stylesheet" href="style.css">
			<h1>Selamat Datang di Yellppw</h1>
            <p>&copy; 2024 Yellppw.</p>
			<p>Platform untuk berbagi ide dan pengalaman.</p>
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
		<main>
			<link rel="stylesheet" href="style.css">
			<section class="introduction">
				<h2>Mengapa Memilih Yellppw?</h2>
				<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vulputate neque nec augue pulvinar, a volutpat ipsum venenatis. Morbi condimentum purus vel nulla feugiat, ac cursus risus malesuada. </p>
			</section>
			<section class="features">
				<h2>Fitur Utama</h2>
				<ul>
					<li>
						<strong>Komunitas Aktif:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					</li>
					<li>
						<strong>Privasi Terjamin:</strong> Proin euismod nisl ut ligula facilisis, at ultricies justo tristique.
					</li>
					<li>
						<strong>Interface Modern:</strong> Donec blandit ligula a diam sagittis interdum.
					</li>
					<li>
						<strong>Kategori Beragam:</strong> Nullam fermentum tortor id orci tincidunt facilisis.
					</li>
				</ul>
			</section>
			<section class="testimonials">
				<h2>Apa Kata Mereka?</h2>
				<div class="testimonial">
					<blockquote>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id metus ut mauris placerat tincidunt." <strong>Arif, Jakarta</strong>
					</blockquote>
				</div>
				<div class="testimonial">
					<blockquote>"Vestibulum luctus quam at sem vehicula tincidunt. Proin id lorem quis lorem fringilla lacinia." <strong>Rani, Surabaya</strong>
					</blockquote>
				</div>
				<div class="testimonial">
					<blockquote>"Morbi hendrerit enim in augue pulvinar, nec tincidunt velit dapibus. Suspendisse potenti." <strong>Fitri, Bandung</strong>
					</blockquote>
				</div>
			</section>
		</main>
		<script>
			function toggleMode() {
				document.body.classList.toggle('dark-mode');
			}
		</script>
	</body>
	</html>
