<!DOCTYPE html>
<html>
    <head>
        <title>Ubah Biodata</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
        $koneksi = mysqli_connect("localhost","root","","biodata") or die(mysqli_error());
        $no = $_GET['no'];
        $sql = "SELECT * FROM data WHERE no='$no'";
        $query = mysqli_query($koneksi, $sql);
        $data = mysqli_fetch_array($query);?>
        <div class="header">
            <h2>Ubah Biodata</h2>
        </div>
        <div class="container">
            <form action="" method="post">
                <br>
                <label>Nama :&nbsp</label><input class="txt" type="text" name="nama" value="<?php echo $data['nama']; ?>" required/><br><br>
                <label>Alamat :&nbsp</label><br>
                <textarea name="alamat" class="txt" cols="45" rows="4" required/><?php echo $data['alamat']; ?></textarea><br><br>
                <label>Jenis Kelamin :&nbsp</label>
                <?php
                    if($data['jenis_kelamin']=="Laki-Laki")
                    {
                        echo "<input type='radio'  name='jenis_kelamin'  value='Laki-Laki' checked=''><a>
                        Laki-laki &nbsp&nbsp</a>
                        <input type='radio' name='jenis_kelamin'value='Perempuan' >
                        <a>Perempuan </a>"; 
                    }else{ 
                        echo "<input type='radio'  name='jenis_kelamin' value='Laki-Laki' >
                        <a>Laki-laki  &nbsp&nbsp </a>
                        <input type='radio' name='jenis_kelamin' value='Perempuan' checked='' >
                        <a>Perempuan </a>"; 
                    }
                ?><br><br>
                <label>Tempat Lahir : &nbsp</label><input class="txt" type="text" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $data['tempat_lahir']; ?>" required/><br><br>
                <label><a>Tanggal Lahir:&nbsp</a></label><input class="txt" type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $data['tanggal_lahir']; ?>" required/><br><br>
                <label>Kota Asal :&nbsp</label><input class="txt" type="text" name="kota_asal" placeholder="Kota Asal" value="<?php echo $data['kota_asal']; ?>"required/><br><br>
                <label>Agama :&nbsp</label><select class="select"  name="agama" />
                    <option hidden><?php echo $data['agama']; ?></option>
                    <option value="Hindu">Hindu</option>
                    <option value="Islam">Islam</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Budha">Budha</option>
                    <option value="Lainnya">Lainnya</option>
                </select><br><br>
                <label>Deskripsi :&nbsp</label><br> 
                <textarea name="deskripsi" class="txt" cols="45" rows="4" required/><?php echo $data['deskripsi']; ?></textarea><br><br>
                <input class="button" type="submit" name="simpan" value="Simpan">
                <input type="button" value="<< Kembali" onclick="location.href='index.php';"><br><br>
            </form> 
        </div>
    </body>
</html>

<?php
if(isset($_POST['simpan'])){
    $nama  = $_POST['nama'];
    $alamat  = $_POST['alamat'];
    $jenis_kelamin  = $_POST['jenis_kelamin'];
    $tempat_lahir  = $_POST['tempat_lahir'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $kota_asal  = $_POST['kota_asal'];
    $agama  = $_POST['agama'];
    $deskripsi  = $_POST['deskripsi'];

    $sql = "UPDATE data SET nama='$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', kota_asal='$kota_asal', agama='$agama', deskripsi='$deskripsi' WHERE no='$no'";
    $save = mysqli_query($koneksi, $sql);
    if($save)
        { 
            echo '<script language="javascript">alert("Data Tersimpan!");document.location="index.php";</script>';
        }
        else{
            echo '<script language="javascript">alert("Penyimpanan Gagal!");</script>';
       }
    }
?>
