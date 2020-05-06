        <?php 
        function show(){
            $koneksi = mysqli_connect("localhost","root","","simak") or die(mysqli_error());
            $result = mysqli_query($koneksi, "SELECT * FROM mahasiswa"); 
            return $result;       
        }
        function sorting($filter, $sort){
            $koneksi = mysqli_connect("localhost","root","","simak") or die(mysqli_error());
            $sql = "SELECT * FROM mahasiswa ORDER BY $filter $sort";
            $result = mysqli_query($koneksi, $sql);
            return $result;
        }

        function carifiltersort($cari,$filter, $sort){
            $koneksi = mysqli_connect("localhost","root","","simak") or die(mysqli_error());
            $sql = "SELECT * FROM mahasiswa WHERE $filter LIKE '%$cari%' ORDER BY $filter $sort";
            $result = mysqli_query($koneksi, $sql);
            return $result;
        }
        ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sorting dan Filter Simak</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2 align="center">Sorting dan Filter SIMAK</h2>
        </div>
        <div class="container">    
        <br>
        <form action="" method="POST">
            <label>Pencarian : </label><input type="text" placeholder="Cari..." name="cari"><p></p>
            
            <select class="select" name="filter"/>
                <option value="" hidden>Filter Search..</option>
                <option value="nim">Filter By NIM</option>
                <option value="nama">Filter By Nama</option>
                <option value="jenis_kelamin">Filter By Jenis Kelamin</option>
                <option value="tempat_lahir">Filter By Tempat Lahir</option>
                <option value="tanggal_lahir">Filter By Tanggal Lahir</option>
                <option value="alamat">Filter By Alamat</option>
                <option value="no_telp">Filter By No Telepon</option>
                <option value="fakultas">Filter By Fakultas</option>
                <option value="jurusan">Filter By Jurusan</option>
            </select>

            <select class="select" name="sort"/>
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
            </select>
            <input type="submit" value="OK" name="submit">
            <a href="index.php?"><input type="button" value="Kembali" name="kembali"></a><p></p>
        </form>
        <?php
        $koneksi = mysqli_connect("localhost","root","","simak") or die(mysqli_error());
        $result = mysqli_query($koneksi, "SELECT * FROM mahasiswa"); 
        $sort = "";

        if($sort == ""){
            $result = show();
        }

         if(isset($_POST['cari']) AND $_POST['filter']==""){
             echo '<script language="javascript">alert("Masukan Filter Search!"); document.location="index.php";</script>';
         }

        if (isset($_POST["submit"]) AND isset($_POST['filter']) AND isset($_POST["sort"])){
            $sort =  $_POST["sort"]; 
            $filter  = $_POST['filter'];
            $result = sorting($filter, $sort);        
        }

        if(isset($_POST['submit']) AND isset($_POST['cari']) AND isset($_POST['filter']) AND isset($_POST["sort"])){
            $cari = $_POST['cari'];
            $filter  = $_POST['filter'];
            $sort =  $_POST["sort"]; 
            $result = carifiltersort($cari,$filter, $sort);
        }
        echo "<table class='tabel' border='1' cellpadding='16' align='center'>";
        echo "<tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Fakultas</th>
                <th>Jurusan</th>
              </tr>";
            
            $no=1;
            while($data = mysqli_fetch_array($result)){
                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data['nim']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['jenis_kelamin']; ?></td>
                        <td><?php echo $data['tempat_lahir']; ?></td>
                        <td><?php echo $data['tanggal_lahir']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td><?php echo $data['no_telp']; ?></td>
                        <td><?php echo $data['fakultas']; ?></td>
                        <td><?php echo $data['jurusan']; ?></td>
                    </tr>
                <?php
                $no++;
            }
            echo "</table>";
           ?>
        </div>
    </body>
</html>
