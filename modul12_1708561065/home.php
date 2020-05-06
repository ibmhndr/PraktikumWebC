<!-- 1708561065_Ida Bagus Mahendra -->
<?php 
// mengaktifkan session
session_start();
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	echo "<script>alert('Anda Harus Login Terlebih Dahulu!'); document.location='index.php';</script>";
	exit();
}
else {
	$koneksi = mysqli_connect("localhost","root","","simak_session") or die(mysqli_error());
	$nama = $_SESSION['nama'];
	$level = $_SESSION['level'];
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Home - Universitas Udayana</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="container">
			<div class="sidebar">
				<div id="logo"><img src="gambar/logounud.png" alt="Logo Universitas Udayana"></div>
				<div class="artikel">
					<h4 id="artikel-head">Artikel Populer</h4>
					<p><a href="">Pencegahan Covid-19</a></p>
					<p><a href="">Pengunduran Jadwal<br>Wisuda ke-136</a></p>
					<p><a href="">Penundaan Penerimaan<br>Seleksi Mahasiswa Baru</a></p>
					<p><a href="">Perpanjangan Jeda Masa Kinerja Kampus</a></p>
					<p><a href="">Kondisi Pelaksanaan PJJ Selama Wabah Covid-19</a></p>
				</div>
			</div>
			<div class="content">
				<div id="slide">
					<img src="gambar/rektorat.jpg" alt="Rektorat Universitas Udayana">
				</div>
				<div class="navbar">
					<ul>
						<li class="navlink"><a href="home.php">Home</a></li>
						<li class="navlink"><a href="tentang.php">Tentang</a></li>
						<li class="navlink"><a href="pengajar.php">Pengajar</a></li>
						<li class="navlink"><a href="kontak.php">Kontak</a></li>
						<li class="navlink" id="level"><?php echo $level ?>&nbsp|</li>
						<li class="navlink"><a href="logout.php" id="logout">Log Out</a></li>
					</ul>
				</div>
				<div class="main">
					<h2 align="center">Selamat Datang <span id="username"><?php echo $nama ?></span> di Website Universitas Udayana</h2>
					<hr style=" border-bottom: 3px solid #4183D7;">
					<p align="center">Unud merupakan lembaga pendidikan tinggi atau Universitas di Bali yang <br>menghasilkan sumber daya manusia unggul, mandiri, dan berbudaya.</p><br>	
					<div class="news">
						<h2>Berita Terkini</h2>
						<img src="gambar/berita.jpg" alt="Polda Bali ke Unud" width="50%" style="float: left; margin-right: 20px;">
						<p align="left">Kapolda Bali Irjen Pol. Petrus R. Golose bersama jajaran bertemu Rektor Udayana Prof. A.A Raka Sudewi di Gedung Rektorat Kampus Jimbaran, Senin (30/3/2020). Turut hadir mendampingi Rektor, Wakil Rektor Bidang Perencanaan Kerja Sama dan Informasi, Dekan FMIPA dan Wakil Dekan serta Koorprodi Farmasi. Pertemuan ini dalam...</p>
						<input type="button" class="tombol" style="background-color: white; padding: 5px; color: blue; border-radius: 5px;" value="Baca Selengkapnya">
					</div>
					<h2>Galeri</h2>
					<li class="list"><img src="gambar/penyebarancorona.jpg" alt=""></li>
					<li class="list"><img src="gambar/infrastruktur.jpg" alt=""></li>
					<li class="list"><img src="gambar/tim.jpg" alt=""></li>
				</div>
				<br>
			</div>
			<div style="position: absolute; margin-top: 66%; width: 90.5%; background-color: #4183D7; color: white; text-align: center; padding: 15px;">Copyright &copy; 2020 Universitas Udayana, All Right Reserved</div>
		</div>
	</body>
</html>