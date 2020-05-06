<!-- 1708561065_Ida Bagus Mahendra -->
<?php 
// mengaktifkan session
session_start();
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	echo"<script>alert('Anda Harus Login Terlebih Dahulu!'); document.location='index.php';</script>";
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
		<title>Tentang - Universitas Udayana</title>
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
				<div class="main" align="center">
		            <h2>Universitas Udayana</h2>
					<hr style=" border-bottom: 3px solid #4183D7;">
		            <p>Jl. Raya Kampus UNUD, Bukit Jimbaran, Kuta Selatan, Badung-Bali-803611</p>
		            <p>Phone Number: +62 (361) 701954, 704845</p>
		            <p>Fax: +62 (361) 701907</p>
		            <p>Email: info@unud.ac.id</p> <br>
		            <h2>Pembuat Web</h2>
		            <hr style=" border-bottom: 3px solid #4183D7;">
		            <div class="garis"></div>
		            <p>Ida Bagus Mahendra</p>
		            <p><img style="width: 20px; margin-right: 20px;" src="gambar/wa.png" alt="">081238368984</p>
		            <p><img style="width: 20px; margin-right: 20px;" src="gambar/email.png" alt=""> ibmhndr@gmail.com</p>
		            <p><img style="width: 20px; margin-right: 20px;" src="gambar/line.png" alt="">
		             @gushendra69</p>
				</div>
				<br>
			</div>
			<div style="position: absolute; margin-top: 35%; width: 90.5%; background-color: #4183D7; color: white; text-align: center; padding: 15px;">Copyright &copy; 2020 Universitas Udayana, All Right Reserved</div>
		</div>
	</body>
</html>