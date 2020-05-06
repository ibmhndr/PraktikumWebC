<!-- 1708561065_Ida Bagus Mahendra -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login - Universitas Udayana</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="log">
			<div class="head"><h2 align="center">Selamat Datang di Website <br>Universitas Udayana</h2></div>
			<img src="gambar/logounud.png" alt="Logo Universitas Udayana"><br>
			<table border="0" align="center">
				<form action="" method="POST">
				<tr>
					<td colspan="2" align="center"><h3>LOGIN</h3></td>
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
					<td colspan="2" align="center"><input type="submit" value="Masuk" name="submit"></td>
				</tr>
				</form>
			</table>
			<label></label>
		</div>
			<div style="margin-top: 3%; background-color: #4183D7; color: white; text-align: center; padding: 15px;">Copyright &copy; 2020 Universitas Udayana, All Right Reserved</div>
		</div>
	</body>
	<?php 
	    if(isset($_POST["submit"]))
	    {
		    $koneksi = mysqli_connect("localhost","root","","simak_session") or die(mysqli_error());
	        $email = $_POST['email'];
			$password = $_POST['password'];
			$login = mysqli_query($koneksi, "SELECT * FROM login WHERE email='$email' AND password='$password'");
			$row = mysqli_fetch_array($login);
			$cek = mysqli_num_rows($login);
			if($cek > 0){
				session_start();
				$_SESSION['nama'] = $row['nama'];
				$_SESSION['level'] = $row['level'];
				$_SESSION['status'] = "login";
				echo"<script>alert('Anda Berhasil Login'); document.location='home.php';</script>";
			}
			else
			{
				echo"<script>alert('Username dan Password Salah !');</script>";	
			}
		}?>
</html>