<?php 
$koneksi = mysqli_connect("localhost","root","","biodata") or die(mysqli_error());
    $no = $_GET['no'];
    $sql = "DELETE FROM data WHERE no='$no'";
    $hapus = mysqli_query($koneksi, $sql); 
    if($hapus)
    {
        echo '<script language="javascript">alert("Data Berhasil Dihapus");document.location="index.php";</script>';
    }
    else
    {
        echo '<script language="javascript">alert("Data Gagal Dihapus");</script>';
    }
?>