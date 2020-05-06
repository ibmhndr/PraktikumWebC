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
				<div class="main">
					<h2 align="center">Tentang Universitas Udayana</h2>
					<hr style=" border-bottom: 3px solid #4183D7;"><br>
	            <img style="width: 300px; float: left; margin-right: 20px;" src="gambar/tentangunud.jpg" alt="Tentang Universitas Udayana">
		        <p>Cikal bakal Unud adalah Fakultas Sastra Udayana cabang Universitas Airlangga yang diresmikan oleh P. J.M. Presiden Republik Indonesia Ir. Soekarno, dibuka oleh J. M. Menteri P.P dan K. Prof. DR. Priyono pada tanggal 29 September 1958 sebagaimana tertulis pada Prasasti di Fakultas Sastra Jalan Nias Denpasar. <br><br> Udayana secara sah berdiri pada tanggal 17 Agustus 1962 dan merupakan perguruan tinggi negeri tertua di daerah Provinsi Bali. Sebelumnya, sejak tanggal 29 September 1958 di Bali sudah berdiri sebuah Fakultas yang bernama Fakultas Sastra Udayana sebagai cabang dari Universitas Airlangga Surabaya. Fakultas Sastra Udayana inilah yang merupakan embrio dari pada berdirinya Universitas Udayana. Berdasarkan Surat Keputusan Menteri PTIPNo.104/1962, tanggal 9 Agustus 1962, Universitas Udayana secara syah berdiri sejak tanggal 17 Agustus 1962. Tetapi oleh karena hari lahir Universitas Udayana jatuh bersamaan dengan hari Proklamasi Kemerdekaan RepublikIndonesia maka perayaan Hari Ulang Tahun Universitas Udayana dialihkan menjadi tanggal 29 September dengan mengambil tanggal peresmian Fakultas Sastra yang telah berdiri sejak tahun 1958.
				</p>
				</div>
				<br>
			</div>
			<div style="position: absolute; margin-top: 38%; width: 90.5%; background-color: #4183D7; color: white; text-align: center; padding: 15px;">Copyright &copy; 2020 Universitas Udayana, All Right Reserved</div>
		</div>
	</body>
</html>