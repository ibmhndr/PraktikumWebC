<!DOCTYPE html>
<html>
    <head>
        <title>Biodata</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2 align="center"> Data Biodata</h2>
        </div>
        <div class="container">    
        <br>&nbsp<input type="button" value="Tambah Data" onclick="location.href='tambah.php';"><br><br>
        <?php
        $koneksi = mysqli_connect("localhost","root","","biodata") or die(mysqli_error());
        $sql = "SELECT * FROM data";
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
                <th>Aksi</th>
              </tr>";
            
            $no = 1;
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
                            <a href="ubah.php?no=<?php echo $data['no']; ?>"><i class="material-icons">edit</i></button></a>
                            <a href="hapus.php?no=<?php echo $data['no']; ?>"><i class="material-icons">close</i></button></a>
                        </td>
                    </tr>
                <?php
                $no++;
            }
            echo "</table>";
                ?>
        </div>
    </body>
</html>