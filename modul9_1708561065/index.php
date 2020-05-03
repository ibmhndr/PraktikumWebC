<!DOCTYPE html>
<html>
<head>
	<title>BIODATA</title>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="isi">
<h1>BIODATA</h1>
<div class="formkot">
<?php
// --- koneksi ke database
$koneksi = mysqli_connect("localhost","root","","biodata") or die(mysqli_error());

// --- Fngsi tambah data (Create)
function tambah($koneksi){
	
	if (isset($_POST['btn_simpan'])){
       		$nama  = $_POST['nama'];
  			$alamat  = $_POST['alamat'];
  			$jenis_kelamin  = $_POST['jenis_kelamin'];
  			$tempat_lahir  = $_POST['tempat_lahir'];
  			$tanggal_lahir  = $_POST['tanggal_lahir'];
  			$kota_asal  = $_POST['kota_asal'];
  			$agama  = $_POST['agama'];
  			$deskripsi  = $_POST['deskripsi'];
		
		if(!empty($nama) && !empty($alamat) && !empty($jenis_kelamin) && !empty($tempat_lahir) && !empty($tanggal_lahir) && !empty($kota_asal) && !empty($agama) && !empty($deskripsi)){
			$sql = "INSERT INTO data (nama, alamat, jenis_kelamin, tempat_lahir, tanggal_lahir, kota_asal, agama, deskripsi) VALUES ('$nama', '$alamat', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$kota_asal', '$agama', '$deskripsi')";
			$simpan = mysqli_query($koneksi, $sql);
			if($simpan && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'create'){
					echo '<script language="javascript">alert("Input Berhasil!");document.location="index.php";</script>';
				}
				else{
					echo '<script language="javascript">alert("Input Gagal");</script>';
				}
			}
		} else {
			$pesan = "Tidak dapat menyimpan, data belum lengkap!";
		}
	}

	?> 
		<form action="" method="post">
        	<input class="kotak" type="text" name="nama" placeholder="Nama Lengkap" required/><br><br>
       		<input class="kotak" type="text" name="alamat" placeholder="Alamat Tinggal" required/><br><br>
        	<input type="radio" name="jenis_kelamin" value="Laki-Laki" required/><a>Laki - Laki &nbsp&nbsp</a><input type="radio" name="jenis_kelamin" value="Perempuan" required/><a>Perempuan&nbsp&nbsp</a>
        	<input class="kecil" type="text" name="tempat_lahir" placeholder="Tempat Lahir" required/><br><br>
        	<label><a>Tanggal Lahir: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></label><input class="kecil" type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" required/><br><br>
        	<input class="kotak" type="text" name="kota_asal" placeholder="Kota Asal" required/><br><br>
        	<select class="select"  name="agama" />
        		<option value="" hidden>Agama</option>
        		<option value="Hindu">Hindu</option>
        		<option value="Islam">Islam</option>
        		<option value="Protestan">Protestan</option>
        		<option value="Katolik">Katolik</option>
        		<option value="Budha">Budha</option>
        		<option value="Lainnya">Lainnya</option>
       		</select><br><br>
        	<input class="kotak" type="textfield" name="deskripsi" placeholder="Deskripsi..." required/><br><br>
			<input class="btn" type="submit" name="btn_simpan" value="REGISTRASI"><br>
    	</form>
	<?php

}
// --- Tutup Fngsi tambah data


// --- Fungsi Baca Data (Read)
function tampil_data($koneksi){
	$sql = "SELECT * FROM data";
	$query = mysqli_query($koneksi, $sql);
	$no = 1;
	echo "<table class='tabel'>";
	echo "<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Kota Asal</th>
			<th>Agama</th>
			<th>Deskripsi</th>
			<th>Aksi</th>
		  </tr>";
	
	while($data = mysqli_fetch_array($query)){
		?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><?php echo $data['jenis_kelamin']; ?></td>
				<td><?php echo $data['tempat_lahir']; ?></td>
				<td><?php echo $data['tanggal_lahir']; ?></td>
				<td><?php echo $data['kota_asal']; ?></td>
				<td><?php echo $data['agama']; ?></td>
				<td><?php echo $data['deskripsi']; ?></td>
				<td>
					<a href="index.php?aksi=update&id=<?php echo $data['no']; ?>"><i class="material-icons">edit</i></button></a>
					<a href="index.php?aksi=delete&id=<?php echo $data['no']; ?>"><i class="material-icons">close</i></button></a>
				</td>
			</tr>
		<?php
		$no++;
	}
	echo "</table>";
}
// --- Tutup Fungsi Baca Data (Read)


// --- Fungsi Ubah Data (Update)
function ubah($koneksi){
	$no = $_GET['no'];
	// ubah data
	if(isset($_POST['btnubah'])){
       		$nama  = $_POST['nama'];
  			$alamat  = $_POST['alamat'];
  			$jenis_kelamin  = $_POST['jenis_kelamin'];
  			$tempat_lahir  = $_POST['tempat_lahir'];
  			$tanggal_lahir  = $_POST['tanggal_lahir'];
  			$kota_asal  = $_POST['kota_asal'];
  			$agama  = $_POST['agama'];
  			$deskripsi  = $_POST['deskripsi'];
		if(!empty($nama) && !empty($alamat) && !empty($jenis_kelamin) && !empty($tempat_lahir) && !empty($tanggal_lahir) && !empty($kota_asal) && !empty($agama) && !empty($deskripsi)){
			$sql_update = "UPDATE `data` SET `nama`='$nama',`alamat`='$alamat',`jenis_kelamin`='$jenis_kelamin',`tempat_lahir`='$tempat_lahir' ,`tanggal_lahir`='$tanggal_lahir',`kota_asal`='$kota_asal',`agama`='$agama',`deskripsi`='$deskripsi' WHERE `no`='$no'";
            $update = mysqli_query($koneksi, $sql_update);
			if($update && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'update'){
					echo '<script language="javascript">alert("UPDATE BERHASIL");document.location="index.php";</script>';
				}
				else{
					echo '<script language="javascript">alert("UPDATE GAGAL");</script>';
				}
			}
		} else {
			$pesan = "Data tidak lengkap!";
		}
	}
	$sql = "SELECT * FROM data WHERE no='$no'";
	$query = mysqli_query($koneksi, $sql);
	$data = mysqli_fetch_array($query);
	// tampilkan form ubah
	if(isset($_GET['no'])){
		?>
			<a href="index.php"> &laquo; Home</a> | 
			<a href="index.php?aksi=create"> (+) Tambah Data</a>
			<hr>
			
			<form action="" method="post">
        		<input class="kotak" type="text" name="nama" placeholder="Nama Lengkap" value="<?php echo $data['nama']; ?>" required/><br><br>
        		<input class="kotak" type="text" name="alamat" placeholder="Alamat" value="<?php echo $data['alamat']; ?>"required/><br><br>
        		<?php
          			if($data['jenis_kelamin']=="Laki-Laki")
          			{
            			echo "<input type='radio'  name='jenis_kelamin'  value='Laki-Laki' checked=''><a>
            			Laki-laki &nbsp&nbsp</a>
            			<input type='radio' name='jenis_kelamin'value='Perempuan' >
            			<a>Perempuan </a>"; 
          			}else{ 
          				echo "<input type='radio'  name='jenis_kelamin'  value='Laki-Laki' >
            			<a>Laki-laki  &nbsp&nbsp </a>
            			<input type='radio' name='jenis_kelamin' value='Perempuan' checked='' >
            			<a>Perempuan  </a>"; 
          			}
          		?>
        		<input class="kecil" type="text" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $data['tempat_lahir']; ?>" required/><br><br>

        		<label><a>Tanggal Lahir: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></label>
        		<input class="kecil" type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $data['tanggal_lahir']; ?>" required/><br><br>

        		<input class="kotak" type="text" name="kota_asal" placeholder="Kota Asal" value="<?php echo $data['kota_asal']; ?>"required/><br><br>
        		<select class="select" name="agama" />
        			<option hidden><?php echo $data['agama']; ?></option>
	        		<option value="Hindu">Hindu</option>
	        		<option value="Islam">Islam</option>
	        		<option value="Protestan">Protestan</option>
	        		<option value="Katolik">Katolik</option>
	        		<option value="Budha">Budha</option>
	        		<option value="Lainnya">Lainnya</option>
        		</select><br><br>
        		<input class="kotak" type="textfield" name="deskripsi" value="<?php echo $data['deskripsi']; ?>"placeholder="Deskripsi" required/><br><br>
				<input class="btn" type="submit" name="btnubah" value="Simpan Perubahan"><br>
    		</form>
		<?php
	}
}
// --- Tutup Fungsi Update


// --- Fungsi Delete
function hapus($koneksi){

	if(isset($_GET['no']) && isset($_GET['aksi'])){
		$no = $_GET['no'];
		$sql_hapus = "DELETE FROM data WHERE no='$no'";
		$hapus = mysqli_query($koneksi, $sql_hapus);
		
		if($hapus){
			if($_GET['aksi'] == 'delete'){
				echo '<script language="javascript">alert("DELETE BERHASIL");document.location="index.php";</script>';
			}
			else{
				echo '<script language="javascript">alert("DELETE GAGAL");</script>';
			}
		}
	}	
}
// --- Tutup Fungsi Hapus


// ===================================================================
// --- Program Utama
if (isset($_GET['aksi'])){
	switch($_GET['aksi']){
		case "create":
			echo '<a href="index.php"> &laquo; Home</a>';
			tambah($koneksi);
			break;
		case "read":
			tampil_data($koneksi);
			break;
		case "update":
			ubah($koneksi);
			tampil_data($koneksi);
			break;
		case "delete":
			hapus($koneksi);
			break;
		default:
			echo "<h3>Aksi <i>".$_GET['aksi']."</i> tidaka ada!</h3>";
			tambah($koneksi);
			tampil_data($koneksi);
	}
} else {
	tambah($koneksi);
	tampil_data($koneksi);
}

?></div></div>
</body>
</html>
