<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Biodata</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2>Tambah Biodata</h2>
        </div>
        <div class="container">
            <form action="" method="post">
                <br>
                <label>Nama :&nbsp</label><input class="txt" type="text" name="nama" required/><br><br>
                <label>Alamat :&nbsp</label><br>
                <textarea name="alamat" class="txt" cols="45" rows="4" required/></textarea><br><br>
                <label>Jenis Kelamin :&nbsp</label>
                	<input type="radio" name="jenis_kelamin" value="Laki-Laki" required/><a>Laki - Laki &nbsp&nbsp</a>
                	<input type="radio" name="jenis_kelamin" value="Perempuan" required/><a>Perempuan&nbsp&nbsp</a><br><br>
                <label>Tempat Lahir : &nbsp</label><input class="txt" type="text" name="tempat_lahir" placeholder="Tempat Lahir" required/><br><br>
                <label><a>Tanggal Lahir:&nbsp</a></label><input class="txt" type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" required/><br><br>
                <label>Kota Asal :&nbsp</label><input class="txt" type="text" name="kota_asal" placeholder="Kota Asal" required/><br><br>
                <label>Agama :&nbsp</label><select class="select" name="agama" required/>
                    <option value="" hidden>Agama</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Islam">Islam</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Budha">Budha</option>
                    <option value="Lainnya">Lainnya</option>
                </select><br><br>
                <label>Deskripsi :&nbsp</label><br> 
                <textarea name="deskripsi" class="txt" cols="45" rows="4" required/></textarea><br><br>                
                <input class="button" type="submit" name="simpan" value="Simpan">
                <input type="button" value="<< Kembali" onclick="location.href='index.php';"><br><br>

            </form> 
        </div>
    </body>
</html>

<?php
$koneksi = mysqli_connect("localhost","root","","biodata") or die(mysqli_error());
if (isset($_POST['simpan'])){
    $nama  = $_POST['nama'];
    $alamat  = $_POST['alamat'];
    $jenis_kelamin  = $_POST['jenis_kelamin'];
    $tempat_lahir  = $_POST['tempat_lahir'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $kota_asal  = $_POST['kota_asal'];
    $agama  = $_POST['agama'];
    $deskripsi  = $_POST['deskripsi'];

    $sql = "INSERT INTO data (nama, alamat, jenis_kelamin, tempat_lahir, tanggal_lahir, kota_asal, agama, deskripsi) VALUES ('$nama', '$alamat', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$kota_asal', '$agama', '$deskripsi')";
    $save = mysqli_query($koneksi, $sql);
    if($save)
    	{ 
            echo '<script language="javascript">alert("Input Berhasil!");document.location="index.php";</script>';
        }
        else{
            echo '<script language="javascript">alert("Input Gagal");</script>';
       }
    }
?>
