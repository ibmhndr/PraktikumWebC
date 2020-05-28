        <?php
        // mengaktifkan session
        session_start();
         
        // cek apakah user telah login, jika belum login maka di alihkan ke halaman login
        if($_SESSION['status'] !="login"){
            echo"<script>alert('Anda Harus Login Terlebih Dahulu!'); document.location='index.php';</script>";
            exit();
        }
        else {
            $koneksi = mysqli_connect("localhost","root","","simak") or die(mysqli_error());
            $nama = $_SESSION['nama'];
            $level = $_SESSION['level'];
        }

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
        <title>Dasboard - <?php echo $level?></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body onload="home()">
        <div class="header">
            <ul>
                <li class="navmenu" id="levelmenu">Halo, <?php echo $nama ?>
                <ul class="drop">
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </ul>
            <h2>&nbsp&nbsp SIMAK - <?php echo $level?></h2>
        </div>
            <div id="white" background-color: white;>a</div>
        <div id="mahasiswa">
            <div class="sidebar-menu">
                <div class="artikel">
                    <p align="center" class="menu" onclick="return data()">DATA USER</a></p>
                    <p align="center" class="menu" onclick="return data()">DAFTAR MATKUL</a></p>
                    <p align="center" class="menu" onclick="return data()">DATA USER</a></p>
                </div>
            </div>
            <div class="content">
                <h2>Data User</h2>
                <form action="" method="POST">
                    <label>NIM &nbsp&nbsp: </label><input class="data" type="text" name="nama">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label>Nama : </label><input class="data" type="text" name="nama">
                    <br><label>Email : </label><input class="data" type="text" name="nama">
                                        
                </form>
            </div>
        </div>


        <div class="container">    

        
        <div id="tampil">
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
            ?></div>

        </div>
    </body>

    <script language="javascript">
        function home()
        {
            var tampil = document.getElementById("tampil");
            tampil.style.display = "none";
        }
    </script>
</html>