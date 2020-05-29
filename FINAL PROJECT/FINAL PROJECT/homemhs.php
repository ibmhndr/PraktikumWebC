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
            $email = $_SESSION['email'];
        }

        function show($level){
            $koneksi = mysqli_connect("localhost","root","","simak") or die(mysqli_error());
            $result = mysqli_query($koneksi, "SELECT * FROM $level"); 
            return $result;       
        }
        function sorting($level,$filter, $sort){
            $koneksi = mysqli_connect("localhost","root","","simak") or die(mysqli_error());
            $sql = "SELECT * FROM $level ORDER BY $filter $sort";
            $result = mysqli_query($koneksi, $sql);
            return $result;
        }

        function carifiltersort($level,$cari,$filter, $sort){
            $koneksi = mysqli_connect("localhost","root","","simak") or die(mysqli_error());
            $sql = "SELECT * FROM $level WHERE $filter LIKE '%$cari%' ORDER BY $filter $sort";
            $result = mysqli_query($koneksi, $sql);
            return $result;
        }
        ?>

        <script language="javascript">

            function home()
            {
                var datamhs = document.getElementById("datamhs");
                var daftarmhs = document.getElementById("daftarmhs");
                var home = document.getElementById("home");
                var daftardosen = document.getElementById("daftardosen");
                var kelasmhs = document.getElementById("kelasmhs");
                var bimbinganmhs = document.getElementById("bimbinganmhs");
                datamhs.style.display = "none";
                daftarmhs.style.display = "none";
                kelasmhs.style.display = "none";
                home.style.display = "block";
                daftardosen.style.display = "none";
                bimbinganmhs.style.display = "none";
            }

            function datamhs()
            {
                var daftarmhs = document.getElementById("daftarmhs");
                var datamhs = document.getElementById("datamhs");
                var home = document.getElementById("home");
                var daftardosen = document.getElementById("daftardosen");
                var kelasmhs = document.getElementById("kelasmhs");
                var bimbinganmhs = document.getElementById("bimbinganmhs");
                datamhs.style.display = "block";
                daftarmhs.style.display = "none";
                kelasmhs.style.display = "none";
                home.style.display = "none";
                daftardosen.style.display = "none";
                bimbinganmhs.style.display = "none";
            }

            function daftarmhs()
            {
                var home = document.getElementById("home");
                var datamhs = document.getElementById("datamhs");
                var daftarmhs = document.getElementById("daftarmhs");
                var daftardosen = document.getElementById("daftardosen");
                var kelasmhs = document.getElementById("kelasmhs");
                var bimbinganmhs = document.getElementById("bimbinganmhs");
                home.style.display = "none";
                datamhs.style.display = "none";
                kelasmhs.style.display = "none";
                daftarmhs.style.display = "block";
                daftardosen.style.display = "none";
                bimbinganmhs.style.display = "none";
            }

            function daftardosen()
            {
                var datamhs = document.getElementById("datamhs");
                var daftarmhs = document.getElementById("daftarmhs");
                var daftardosen = document.getElementById("daftardosen");
                var home = document.getElementById("home");
                var kelasmhs = document.getElementById("kelasmhs");
                var bimbinganmhs = document.getElementById("bimbinganmhs");
                home.style.display = "none";
                datamhs.style.display = "none";
                daftarmhs.style.display = "none";
                kelasmhs.style.display = "none";
                daftardosen.style.display = "block";    
                bimbinganmhs.style.display = "none";
            }

            function kelasmhs()
            {
                var datamhs = document.getElementById("datamhs");
                var daftarmhs = document.getElementById("daftarmhs");
                var daftardosen = document.getElementById("daftardosen");
                var home = document.getElementById("home");
                var kelasmhs = document.getElementById("kelasmhs");
                var bimbinganmhs = document.getElementById("bimbinganmhs");
                home.style.display = "none";
                datamhs.style.display = "none";
                daftarmhs.style.display = "none";
                daftardosen.style.display = "none";
                kelasmhs.style.display = "block";
                bimbinganmhs.style.display = "none";

                var sudahdaftar = document.getElementById("sudahdaftar");
                var belumdaftar = document.getElementById("belumdaftar");
                <?php
                $koneksi = mysqli_connect("localhost","root","","simak") or die(mysqli_error());
                $result = mysqli_query($koneksi, "SELECT nim FROM mahasiswa WHERE email = '$email'"); 
                $isi = mysqli_fetch_array($result);
                $nim = $isi['nim']; 
                $sql = mysqli_query($koneksi, "SELECT COUNT(nim) AS jumlah FROM kelasmhs WHERE nim='$nim'");
                $row = mysqli_fetch_assoc($sql);
                $jumlah = $row['jumlah'];
                ?>
                var jum = "<?php echo $jumlah; ?>";
                if(jum >= '5')
                {
                  belumdaftar.style.display = "none";
                  sudahdaftar.style.display = "block";
                }
                else
                {
                  belumdaftar.style.display = "block";
                  sudahdaftar.style.display = "none";
                }    
            }

            function bimbinganmhs()
            {
                var datamhs = document.getElementById("datamhs");
                var daftarmhs = document.getElementById("daftarmhs");
                var daftardosen = document.getElementById("daftardosen");
                var home = document.getElementById("home");
                var kelasmhs = document.getElementById("kelasmhs");
                var bimbinganmhs = document.getElementById("bimbinganmhs");
                home.style.display = "none";
                datamhs.style.display = "none";
                daftarmhs.style.display = "none";
                kelasmhs.style.display = "none";
                daftardosen.style.display = "none";    
                bimbinganmhs.style.display = "block";
            }

        </script>

<!DOCTYPE html>
<html>
    <head>
        <title>Dasboard - <?php echo $level?></title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

            <div class="content" id="home">
                <h3 align="center">Selamat Datang <span id="username"><?php echo $nama ?></span> di SIMAK - <?php echo $level?></h2> 
            </div>

            <!-- Daftar Mahasiswa -->
            <div class="content" id="daftarmhs">
                <h2>Daftar Mahasiswa</h2>
                <form action="" method="POST" onsubmit="daftarmhs()">
                <label><h3>Pencarian : </h3></label><input type="text" placeholder="Cari..." name="cari">                
                <select class="select" name="filter">
                    <option value="" hidden>Filter Search..</option>
                    <option value="nim">Filter By NIM</option>
                    <option value="nama">Filter By Nama</option>
                    <option value="email">Filter By Email</option>
                    <option value="jenis_kelamin">Filter By Jenis Kelamin</option>
                    <option value="tempat_lahir">Filter By Tempat Lahir</option>
                    <option value="tanggal_lahir">Filter By Tanggal Lahir</option>
                    <option value="alamat">Filter By Alamat</option>
                    <option value="no_telp">Filter By No Telepon</option>
                    <option value="fakultas">Filter By Fakultas</option>
                    <option value="jurusan">Filter By Jurusan</option>
                    <option value="status">Filter By Status</option>
                </select>

                <select class="select" name="sort">
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select>
                <input type="submit" id="btdafmhs" value="OK" name="submitdaftarmhs">
                <a href="homemhs.php"><input id="kembali" type="button" value="Kembali" name="kembali"></a><p></p>
                </form>

                <?php
                $koneksi = mysqli_connect("localhost","root","","simak") or die(mysqli_error());
                $result = mysqli_query($koneksi, "SELECT * FROM mahasiswa"); 
                $sort = "";
                $lev ="Mahasiswa";

                if($sort == ""){
                    $result = show($lev);
                }

                 if(isset($_POST['cari']) AND $_POST['filter']==""){
                     echo '<script language="javascript">alert("Masukan Filter Search!"); document.location="homemhs.php";</script>';
                 }

                if (isset($_POST["submitdaftarmhs"]) AND isset($_POST['filter']) AND isset($_POST["sort"])){
                    $sort =  $_POST["sort"]; 
                    $filter  = $_POST['filter'];
                    $result = sorting($lev,$filter, $sort);        
                    echo '<script language="javascript">alert("Proses Suskes!, Silahkan kembali ke menu");</script>';
                }

                if(isset($_POST['submitdaftarmhs']) AND isset($_POST['cari']) AND isset($_POST['filter']) AND isset($_POST["sort"])){
                    $cari = $_POST['cari'];
                    $filter  = $_POST['filter'];
                    $sort =  $_POST["sort"]; 
                    $result = carifiltersort($lev,$cari,$filter, $sort);
                }
                echo "<table class='tabel' border='1' cellpadding='10' align='center'>";
                echo "<tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Fakultas</th>
                        <th>Jurusan</th>
                        <th>Status</th>
                      </tr>";
                    
                    $no=1;
                    while($data = mysqli_fetch_array($result)){
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $data['nim']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['jenis_kelamin']; ?></td>
                                <td><?php echo $data['tempat_lahir']; ?></td>
                                <td><?php echo $data['tanggal_lahir']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td><?php echo $data['no_telp']; ?></td>
                                <td><?php echo $data['fakultas']; ?></td>
                                <td><?php echo $data['jurusan']; ?></td>
                                <td><?php echo $data['status']; ?></td>
                            </tr>
                        <?php
                        $no++;
                    }
                    echo "</table>";
            ?></div>
        <!-- Daftar Mahasiswa -->

        <!-- Daftar Dosen -->
            <div class="content" id="daftardosen">
                <h2>Daftar Dosen</h2>
                <form action="" method="POST" onsubmit="daftarmhs()">
                <label><h3>Pencarian : </h3></label><input type="text" placeholder="Cari..." name="cari">                
                <select class="select" name="filter">
                    <option value="" hidden>Filter Search..</option>
                    <option value="nim">Filter By NIP</option>
                    <option value="nama">Filter By Nama</option>
                    <option value="email">Filter By Email</option>
                    <option value="jenis_kelamin">Filter By Jenis Kelamin</option>
                    <option value="pendidikan_terakhir">Filter By Pendidikan Terakhir</option>
                    <option value="jabatan_terakhir">Filter By Jabatan Terakhir</option>
                    <option value="fakultas">Filter By Fakultas</option>
                    <option value="jurusan">Filter By Status</option>
                </select>

                <select class="select" name="sort">
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select>
                <input type="submit" id="btdafmhs" value="OK" name="submitdaftardosen">
                <a href="homemhs.php"><input id="kembali" type="button" value="Kembali" name="kembali"></a><p></p>
                </form>

                <?php
                $koneksi = mysqli_connect("localhost","root","","simak") or die(mysqli_error());
                $result = mysqli_query($koneksi, "SELECT * FROM dosen"); 
                $sort = "";
                $lev ="dosen";

                if($sort == ""){
                    $result = show($lev);
                }

                 if(isset($_POST['cari']) AND $_POST['filter']==""){
                     echo '<script language="javascript">alert("Masukan Filter Search!"); document.location="homemhs.php";</script>';
                 }

                if (isset($_POST["submitdaftardosen"]) AND isset($_POST['filter']) AND isset($_POST["sort"])){
                    $sort =  $_POST["sort"]; 
                    $filter  = $_POST['filter'];
                    $result = sorting($lev,$filter, $sort);        
                    echo '<script language="javascript">alert("Proses Suskes!, Silahkan kembali ke menu");</script>';
                }

                if(isset($_POST['submitdaftardosen']) AND isset($_POST['cari']) AND isset($_POST['filter']) AND isset($_POST["sort"])){
                    $cari = $_POST['cari'];
                    $filter  = $_POST['filter'];
                    $sort =  $_POST["sort"]; 
                    $result = carifiltersort($lev,$cari,$filter, $sort);
                }
                echo "<table class='tabel' border='1' cellpadding='10' align='center'>";
                echo "<tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Jabatan Terakhir</th>
                        <th>Fakultas</th>
                        <th>Jurusan</th>
                        <th>Status</th>
                      </tr>";
                    
                    $no=1;
                    while($data = mysqli_fetch_array($result)){
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $data['nip']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['pendidikan_terakhir']; ?></td>
                                <td><?php echo $data['jabatan_terakhir']; ?></td>
                                <td><?php echo $data['fakultas']; ?></td>
                                <td><?php echo $data['jurusan']; ?></td>
                                <td><?php echo $data['status']; ?></td>
                            </tr>
                        <?php
                        $no++;
                    }
                    echo "</table>";
            ?></div>
        <!-- Daftar Dosen -->

        <!-- Sidebar Mhs -->
        <div id="mhs">
            <div class="sidebar-menu" id="menumhs">
                <div class="artikel">
                    <p align="center" class="menu" onclick="return datamhs()">DATA USER</a></p>
                    <p align="center" class="menu" onclick="return daftarmhs()">DAFTAR MAHASISWA</a></p>
                    <p align="center" class="menu" onclick="return daftardosen()">DAFTAR DOSEN</a></p>
                    <p align="center" class="menu" onclick="return kelasmhs()">DAFTAR KELAS & MATKUL</a></p>
                    <p align="center" class="menu" onclick="return bimbinganmhs()">DAFTAR PEMBIMBING</a></p>
                </div>
            </div>
            <!-- Input Data Mhs -->
            <div class="content" id="datamhs">
                <h2>Data User</h2>
                <?php
                $koneksi = mysqli_connect("localhost","root","","simak") or die(mysqli_error());
                $sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE email = '$email'");
                $row = mysqli_fetch_assoc($sql);
                $data = mysqli_fetch_array($sql);
                ?>
                <form action="" method="POST">
                    <label>NIM &nbsp&nbsp: </label><input class="data" type="text" value="<?php echo $row['nim']; ?>" name="nim">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label>Tempat Lahir : </label><input class="data" type="text" name="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>"><br>

                    <label>Nama : </label><input class="data" type="text" name="nama" value="<?php echo $row['nama']; ?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label>Tanggal Lahir : </label><input class="data" id="tanggal" type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>"><br>

                    <label>Alamat : </label><input class="data" type="text" name="alamat" value="<?php echo $row['alamat']; ?>"">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label>No Telepon : </label><input class="data" type="text" name="no_telp" value="<?php echo $row['no_telp']; ?>"><br>
                                        
                    <label>Jenis Kelamin <font color="red"><b>*</b></font></label>
                    <?php
                    if($row['jenis_kelamin']=="Laki-Laki")
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
                    ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label>Fakultas : </label><input class="data" type="text" name="fakultas" value="<?php echo $row['fakultas']; ?>"><br>

                    <label>Status &nbsp&nbsp&nbsp&nbsp: </label><input class="data" type="text" name="status" value="<?php echo $row['status']; ?>"readonly style="background-color: #ded1d1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label>Jurusan : </label><input class="data" type="text" name="jurusan" value="<?php echo $row['jurusan']; ?>"><br>

                    <label>Email &nbsp&nbsp&nbsp&nbsp: </label><input class="data" type="text" name="email" value="<?php echo $row['email']; ?>" readonly style="background-color: #ded1d1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input class="button" id="submit" type="submit" name="simpandatamhs" value="SUBMIT">
                </form>
            </div>
        <?php
            if(isset($_POST['simpandatamhs'])){
            $nim  = $_POST['nim'];
            $namain  = $_POST['nama'];
            $emailin  = $_POST['email'];
            $alamat  = $_POST['alamat'];
            $jenis_kelamin  = $_POST['jenis_kelamin'];
            $tempat_lahir  = $_POST['tempat_lahir'];
            $tanggal_lahir  = $_POST['tanggal_lahir'];
            $no_telp  = $_POST['no_telp'];
            $fakultas  = $_POST['fakultas'];
            $jurusan  = $_POST['jurusan'];
            $status = $_POST['status'];
            $sql = "UPDATE mahasiswa SET nim='$nim', nama='$namain', email='$emailin', alamat='$alamat', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', no_telp='$no_telp', fakultas='$fakultas', jurusan='$jurusan', status='$status' WHERE email='$email'";
            $save = mysqli_query($koneksi, $sql);
            if($save)
                { 
                    echo '<script language="javascript">alert("Data Tersimpan!");document.location="homemhs.php";</script>';
                }
                else{
                    echo '<script language="javascript">alert("Penyimpanan Gagal!");</script>';
               }
            }
        ?>
        <!-- Akhir input data mhs -->

        <!-- Kelas Mhs -->
        <div class="content" id="kelasmhs">
            <h2>Daftar Mata Kuliah</h2><br>
               <?php
                $result = mysqli_query($koneksi, "SELECT nim FROM mahasiswa WHERE email = '$email'"); 
                $isi = mysqli_fetch_array($result);
                $nim = $isi['nim']; 

                $kuerii = mysqli_query($koneksi, "SELECT * FROM kelas WHERE status ='Aktif'");
                ?>
            <div id="belumdaftar">
               <form action="" method="POST">
                  <select class="select" name="matkul"/>
                    <option hidden>Pilih Mata Kuliah</option>
                    <?php                     
                    $no=1;
                    while($matkul = mysqli_fetch_array($kuerii)){
                        ?>;
                        ?>
                            <option value="<?php echo $matkul['kode_kelas']?>"><?php echo $matkul['nama_kelas'];?></option>
                        <?php
                        $no++;
                    }?>
                    </select>
                    <input id="aksi1" type="submit" name="tambahmatkul" value="Tambah Kelas">
                </form>
                <?php 
                    if (isset($_POST["tambahmatkul"]))
                    {
                        $kodematkul = $_POST['matkul'];
                        $input = "INSERT INTO kelasmhs (nim, kode_kelas) VALUES ('$nim', '$kodematkul')";
                        $hasil = mysqli_query($koneksi, $input);
                        echo '<script language="javascript">alert("Proses Suskes!"); document.location="homemhs.php";</script>';
                    } ?>
            </div>
            <div id="sudahdaftar">
                <p>Anda Telah Mendaftar Sebanyak Maksimal Mata Kuliah</p>
            </div>
             <br><h2>Daftar Kelas Yang Diikuti</h2><br>
             <?php 
                $sql = mysqli_query($koneksi, "SELECT kelas.kode_kelas, kelas.nama_kelas, kelas.hari, kelas.jam_kuliah, kelas.sks, dosen.nama FROM kelasmhs INNER JOIN kelas ON kelasmhs.kode_kelas = kelas.kode_kelas INNER JOIN dosen ON kelas.nip_dosen = dosen.nip WHERE kelasmhs.nim = '$nim';");
                echo "<table class='tabel' border='1' cellpadding='10'>";
                echo "<tr>
                        <th>No</th>
                        <th>Kode Kelas</th>
                        <th>Nama Kelas</th>
                        <th>Dosen Pengajar</th>
                        <th>Hari</th>
                        <th>Jam Kuliah</th>
                        <th>SKS</th>
                      </tr>";
                    
                    $no=1;
                    while($data = mysqli_fetch_array($sql)){
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $data['kode_kelas']; ?></td>
                                <td><?php echo $data['nama_kelas']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['hari']; ?></td>
                                <td><?php echo $data['jam_kuliah']; ?></td>
                                <td><?php echo $data['sks']; ?></td>
                            </tr>
                        <?php
                        $no++;
                    }
                    echo "</table>";
                    $kuer = mysqli_query($koneksi, "SELECT SUM(kelas.sks) AS sks FROM kelasmhs INNER JOIN kelas ON kelasmhs.kode_kelas = kelas.kode_kelas WHERE kelasmhs.nim = '$nim';");
                    $hasill = mysqli_fetch_array($kuer);
                    $sks = $hasill['sks'];
                ?>
                <h4>Total SKS&nbsp: <?php echo $sks;?></h4>
        </div>
        <!-- Akhir Kelas Mhs -->

        <!-- Pembimbing Mhs -->
            <div id="bimbinganmhs">
                <h2>Daftar Pembimbing Mahasiswa</h2><br>
                <?php 
                $sql = mysqli_query($koneksi, "SELECT mahasiswa.nama AS namamhs, pembimbing.nim, dosen.nama AS namadosen, pembimbing.nip FROM `pembimbing` INNER JOIN mahasiswa ON pembimbing.nim=mahasiswa.nim INNER JOIN dosen ON dosen.nip = pembimbing.nip");
                echo "<table class='tabel' border='1' cellpadding='10'>";
                echo "<tr>
                        <th>No</th>
                        <th>Nama Dosen</th>
                        <th>NIP Dosen</th>
                        <th>Nama Mahasiswa</th>
                        <th>NIM Mahasiswa</th>
                      </tr>";
                    
                    $no=1;
                    while($data = mysqli_fetch_array($sql)){
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $data['namadosen']; ?></td>
                                <td><?php echo $data['nip']; ?></td>
                                <td><?php echo $data['namamhs']; ?></td>
                                <td><?php echo $data['nim']; ?></td>
                            </tr>
                        <?php
                        $no++;
                    }
                ?>
            </div>
        <!-- Akhir Pembimbing Mhs -->
    </div>
    <!-- Akhir Mahasiswa -->
    </body>
</html>

