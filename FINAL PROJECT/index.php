<!-- 1708561065_Ida Bagus Mahendra -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Website Universitas Udayana</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body onload="masuk()">
		<div class="log">
			<div class="head"><h2 align="center">Selamat Datang di Website <br>Universitas Udayana</h2></div>
			<img src="gambar/logounud.png" alt="Logo Universitas Udayana"><br>
			
			<div id="masuk">
			<table border="0" align="center">
				<form action="" method="POST">
				<tr>
					<td colspan="2" align="center"><h3>Login</h3></td>
				</tr>
				<tr>
					<td>E-mail &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </td>
					<td><input type="text" name="email" required></td>
				</tr>
				<tr>
					<td>Password &nbsp: </td>
					<td><input type="password" name="password" required id="tombol"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" value="Masuk" name="submit1"></td>
				</tr>
				</form>
			</table>
			<label></label>
				<p align="center" class="par" onclick="return daftar();">Daftar Sebagai Mahasiswa?</p>
			</div>

			<div id="daftarr">
			<table border="0" align="center">
				<form action="" method="POST">
				<tr>
					<td colspan="2" align="center"><h3>Daftar Sebagai Mahasiswa</h3></td>
				</tr>
				<tr>
					<td>NIM &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </td>
					<td><input type="text" name="nim" required></td>
				</tr>
				<tr>
					<td>Nama &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </td>
					<td><input type="text" name="nama" required></td>
				</tr>
				<tr>
					<td>E-mail &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </td>
					<td><input type="text" name="email" required></td>
				</tr>
				<tr>
					<td>Password &nbsp: </td>
					<td><input type="password" name="password" required id="tombol"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" value="Daftar" name="submit2"></td>
				</tr>
				</form>
			</table>
			<label></label>
			<p align="center" class="par" onclick="return masuk();">Kembali Ke Halaman Login</a></p>
			</div>

		</div>
			<div style="margin-top: 3%; background-color: #4183D7; color: white; text-align: center; padding: 15px;">Copyright &copy; 2020 Universitas Udayana, All Right Reserved</div>
		</div>
	</body>
	<?php 
	    if(isset($_POST["submit1"]))
	    {
		   	session_start();
		    $koneksi = mysqli_connect("localhost","root","","simak") or die(mysqli_error());
	        $email = $_POST['email'];
			$password = $_POST['password'];
			$login = mysqli_query($koneksi, "SELECT * FROM login WHERE email = '$email' AND password='$password'");
			$row = mysqli_fetch_array($login);
			$cek = mysqli_num_rows($login);
			$level = $row['level'];
			if($cek > 0){
				if($level == 'Mahasiswa'){
			      	$cek = mysqli_query($koneksi,"SELECT mahasiswa.nama, mahasiswa.status FROM mahasiswa INNER JOIN login ON login.email = mahasiswa.email WHERE login.email = '$email' AND login.password = '$password'");
			    	$hasil = mysqli_fetch_array($cek);
			    	$status = $hasil['status'];
			    	if($status == 'Aktif')
			    	{
						$_SESSION['nama'] = $hasil['nama'];
	      				$_SESSION['level'] = $row['level'];
	      				$_SESSION['email'] = $row['email'];
						$_SESSION['status'] = "login";
	      				echo'<script language="javascript">alert("Anda berhasil login sebagai Mahasiswa"); document.location="home.php"; </script>';
			    	}
			    	else
			    	{
						echo"<script>alert('Status anda saat ini adalah ".$status.", mohon kontak administrator untuk pengaktifan');</script>";	
			    	}
	     		}
	     		else if($level == 'Dosen'){
			      	$cek = mysqli_query($koneksi,"SELECT dosen.nama, dosen.status FROM dosen INNER JOIN login ON login.email = dosen.email WHERE login.email = '$email' AND login.password = '$password'");
			    	$hasil = mysqli_fetch_array($cek);
			    	$status = $hasil['status'];
			    	if($status == 'Aktif')
			    	{
				    	$status = $hasil['status'];
		      			$_SESSION['nama'] = $hasil['nama'];
		      			$_SESSION['level'] = $row['level'];
		      			$_SESSION['email'] = $row['email'];
						$_SESSION['status'] = "login";
		      			echo'<script language="javascript">alert("Anda berhasil login sebagai Dosen"); document.location="home.php"; </script>';
		      		}
		      		else
			    	{
						echo"<script>alert('Status anda saat ini adalah ".$status.", mohon kontak administrator untuk pengaktifan');</script>";	
			    	}
	     		}
	     		else if($level == 'Admin'){
			      	$cek = mysqli_query($koneksi,"SELECT admin.nama FROM admin INNER JOIN login ON login.email = admin.email WHERE login.email = '$email' AND login.password = '$password'");
			    	$hasil = mysqli_fetch_array($cek);
	      			$_SESSION['nama'] = $hasil['nama'];
	      			$_SESSION['level'] = $row['level'];
	      			$_SESSION['email'] = $row['email'];
					$_SESSION['status'] = "login";
	      			echo'<script language="javascript">alert("Anda berhasil login sebagai Admin"); document.location="home.php"; </script>';
	     		}
			}
			else
			{
				echo"<script>alert('Username dan Password Salah !');</script>";	
			}
		}?>

		<?php
		if (isset($_POST['submit2'])){
	    	$koneksi = mysqli_connect("localhost","root","","simak") or die(mysqli_error());
		    $nim  = $_POST['nim'];
		    $nama  = $_POST['nama'];
		    $email = $_POST['email'];
			$password = $_POST['password'];
			$login = "INSERT INTO login (email, password, level) VALUES ('$email', '$password', 'Mahasiswa')";
		    $simlog = mysqli_query($koneksi, $login);
		    $mahasiswa = "INSERT INTO mahasiswa (nim, nama, email, status) VALUES ('$nim', '$nama', '$email', 'Belum Divalidasi')";
		    $simmhs = mysqli_query($koneksi, $mahasiswa);
		    if($simmhs && $simlog)
		    	{ 
		            echo '<script language="javascript">alert("Berhasil Mendaftar!, Mohon Menunggu Validasi Admin");document.location="index.php";</script>';
		        }
		    else{
		            echo '<script language="javascript">alert("Gagal Mendaftar!");</script>';
		       }
		    }
		?>

		<script language="javascript">
			function daftar()
			{
				var masuk = document.getElementById("masuk");
			    var daftar = document.getElementById("daftarr");
			    masuk.style.display = "none";
			    daftar.style.display = "block";
			}

			function masuk()
			{
				var masuk = document.getElementById("masuk");
			    var daftar = document.getElementById("daftarr");
			    masuk.style.display = "block";
			    daftar.style.display = "none";
			}
			
		</script>
</html>