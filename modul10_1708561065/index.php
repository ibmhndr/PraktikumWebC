<!DOCTYPE html>
<html>
    <head>
        <title>Paginasi Biodata</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2 align="center">Paginasi Data Biodata</h2>
        </div>
        <div class="container">    
        <br>
        <?php
        $koneksi = mysqli_connect("localhost","root","","biodata") or die(mysqli_error());
        $halaman = 5;
        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
        $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
        $result = mysqli_query($koneksi, "SELECT * FROM data");
        $total = mysqli_num_rows($result);
        $pages = ceil($total/$halaman);  
        $sql = "SELECT * FROM data LIMIT $mulai, $halaman";
        $query = mysqli_query($koneksi, $sql);          
        echo "<table class='tabel' border='1' cellpadding='16' align='center'>";
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
              </tr>";
            
            $no =$mulai+1;
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
                    </tr>
                <?php
                $no++;
            }
            echo "</table>";

?><div class="pagination"> 
  <br><center> 
  <?php for ($i=1; $i<=$pages ; $i++){ ?>
  <a href="?halaman=<?php echo $i; ?>"><?php echo $i;?></a> 
  <?php } ?>
  </center>
        </div>
    </body>
</html>