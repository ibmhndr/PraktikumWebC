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

            function buatkelas()
            {
                var buatkelas = document.getElementById("buatkelas");
                buatkelas.style.display ="block"
                var editkelas = document.getElementById("editkelas");
                editkelas.style.display ="none"
            }

            function editkls(clicked_id)
            {                
                var id = clicked_id;
                document.getElementById("kodee").value = id;
                var buatkelas = document.getElementById("buatkelas");
                buatkelas.style.display ="none"
                var editkelas = document.getElementById("editkelas");
                editkelas.style.display ="block"                
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
                <a href="homedosen.php"><input id="kembali" type="button" value="Kembali" name="kembali"></a><p></p>
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
                     echo '<script language="javascript">alert("Masukan Filter Search!"); document.location="homedosen.php";</script>';
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
                <a href="homedosen.php"><input id="kembali" type="button" value="Kembali" name="kembali"></a><p></p>
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
                     echo '<script language="javascript">alert("Masukan Filter Search!"); document.location="homedosen.php";</script>';
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

        <!-- Sidebar Dosen -->
        <div id="mhs">
            <div class="sidebar-menu" id="menumhs">
                <div class="artikel">
                    <p align="center" class="menu" onclick="return datamhs()">DATA USER</a></p>
                    <p align="center" class="menu" onclick="return daftarmhs()">DAFTAR MAHASISWA</a></p>
                    <p align="center" class="menu" onclick="return daftardosen()">DAFTAR DOSEN</a></p>
                    <p align="center" class="menu" onclick="return kelasmhs()">DAFTAR KELAS</a></p>
                    <p align="center" class="menu" onclick="return bimbinganmhs()">DAFTAR PEMBIMBING</a></p>
                </div>
            </div>
            <!-- Data Dosen -->
            <div class="content" id="datamhs">
                <h2>Data User</h2>
                <?php
                $koneksi = mysqli_connect("localhost","root","","simak") or die(mysqli_error());
                $sql = mysqli_query($koneksi, "SELECT * FROM dosen WHERE email = '$email'");
                $row = mysqli_fetch_assoc($sql);
                $data = mysqli_fetch_array($sql);
                ?>
                <form action="" method="POST">
                    <label>NIP &nbsp&nbsp: </label><input class="data" type="text" value="<?php echo $row['nip']; ?> " name="nip" 
                    readonly style="background-color: #ded1d1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label>Email : </label><input class="data" type="text" name="email" value="<?php echo $row['email']; ?>" readonly style="background-color: #ded1d1"><br>

                    <label>Nama : </label><input class="data" type="text" name="nama" value="<?php echo $row['nama']; ?>" readonly style="background-color: #ded1d1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
                    ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                    <label>Pendidikan Terakhir : </label><input class="data" type="text" name="pendidikan_terakhir" value="<?php echo $row['pendidikan_terakhir']; ?>"readonly style="background-color: #ded1d1 ">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label>Jabatan Terakhir : </label><input class="data" type="text" name="jabatan_terakhir" readonly style="background-color: #ded1d1" value="<?php echo $row['jabatan_terakhir']; ?>"><br>
                                        
                    <label>Fakultas : </label><input class="data" id="tanggal" type="text" name="fakultas" value="<?php echo $row['fakultas']; ?>" readonly style="background-color: #ded1d1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label>Jurusan : </label><input class="data" type="text" name="jurusan" value="<?php echo $row['jurusan']; ?>" readonly style="background-color: #ded1d1"><br>

                    <label>Status &nbsp&nbsp&nbsp&nbsp: </label><input class="data" type="text" name="status" value="<?php echo $row['status']; ?>"readonly style="background-color: #ded1d1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                </form>
            </div>
        <!-- Akhir data dosen -->

        <!-- Kelas Mhs -->
        <div class="content" id="kelasmhs">
            <h2>Daftar Kelas</h2><br>
                <input id="tombolkelas" type="button" onclick="buatkelas()" value="Buat Kelas"><p></p>
               <?php
                $result = mysqli_query($koneksi, "SELECT nip FROM dosen WHERE email = '$email'"); 
                $isi = mysqli_fetch_array($result);
                $nip = $isi['nip']; 

                $sql = mysqli_query($koneksi, "SELECT * FROM kelas WHERE nip_dosen = '$nip';");
                echo "<table class='tabel' border='1' cellpadding='10'>";
                echo "<tr>
                        <th>No</th>
                        <th>Kode Kelas</th>
                        <th>Nama Kelas</th>
                        <th>Hari</th>
                        <th>Jam Kuliah</th>
                        <th>SKS</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>";
                    
                    $no=1;
                    while($data = mysqli_fetch_array($sql)){
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $data['kode_kelas']; ?></td>
                                <td><?php echo $data['nama_kelas']; ?></td>
                                <td><?php echo $data['hari']; ?></td>
                                <td><?php echo $data['jam_kuliah']; ?></td>
                                <td><?php echo $data['sks']; ?></td>
                                <td><?php echo $data['status']; ?></td>
                                <td>
                                    <form action="" method="POST">
                                        <input type="text" name="isikode" value="<?php echo $data['kode_kelas']; ?>" style="display: none;">
                                        <input id="<?php echo $data['kode_kelas']; ?>" type="button" name="edit" value="Edit" onClick="editkls(this.id)" style="width: 100%;      background-color: #4CAF50; color: white; padding: 10px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;"><br>
                                        <input type="submit" name="hapus" value="Hapus">
                                    </form>
                                </td>
                            </tr>
                        <?php
                        $no++;
                    }
                    echo "</table>";
                ?>
                <div id="buatkelas">
                <br><h3>Buat Kelas</h3>
                <form action="" method="POST">
                    <label>Kode Kelas&nbsp: </label><input type="text" class="data" name="isikode"><br>
                    <label>Nama Kelas&nbsp: </label><input type="text" class="data" name="nama_kelas" ><br>
                    <label>Hari&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label><input type="text" class="data" name="hari"><br>
                    <label>Jam Kuliah&nbsp&nbsp: </label><input type="text" class="data" name="jam_kuliah"><br>
                    <label>SKS&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label><input type="text" class="data" name="sks"><br>
                    <input id="aksi2" type="submit" name="tambahkelas" value="Tambah Kelas">
                </div>
                <div id="editkelas">
                <br><h3>Edit Kelas</h3>
                <form action="" method="POST">
                    <label>Kode Kelas&nbsp: </label><input id="kodee" type="text" class="data" name="isikode" value="" readonly style="background-color: #ded1d1"><br>
                    <label>Nama Kelas&nbsp: </label><input type="text" class="data" name="nama_kelas" value=""><br>
                    <label>Hari&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label><input type="text" class="data" name="hari" value="" ><br>
                    <label>Jam Kuliah&nbsp&nbsp: </label><input type="text" class="data" name="jam_kuliah" value=""><br>
                    <label>SKS&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label><input type="text" class="data" name="sks" value="" ><br>
                    <input id="aksi2" type="submit" name="editkelas" value="Edit Kelas">
                </div>

                <?php 
                    if (isset($_POST["hapus"]))
                    {
                        $kode = $_POST['isikode'];
                        $input = "UPDATE kelas SET status='Tidak Aktif' WHERE kode_kelas = '$kode'";
                        $hasil = mysqli_query($koneksi, $input);
                        echo '<script language="javascript">alert("Status Berhasil Diubah!"); document.location="homedosen.php";</script>';
                        if($hasil)
                        {
                            echo '<script language="javascript">alert("Data Berhasil Diinputkan!"); document.location="homedosen.php";</script>';
                        }
                        else 
                        {
                            echo '<script language="javascript">alert("Data Gagal Diinputkan!");</script>';
                        }
                    }

                    if (isset($_POST["tambahkelas"]))
                    {
                        $kode = $_POST['isikode'];
                        $nama_kelas = $_POST['nama_kelas'];
                        $hari = $_POST['hari'];
                        $jam_kuliah = $_POST['jam_kuliah'];
                        $sks = $_POST['sks'];
                        $input = "INSERT INTO kelas (kode_kelas, nama_kelas, nip_dosen, hari, jam_kuliah, sks, status) VALUES ('$kode', '$nama_kelas', '$nip', '$hari', '$jam_kuliah', '$sks', 'Aktif')";
                        $hasil = mysqli_query($koneksi, $input);
                        if($hasil)
                        {
                            echo '<script language="javascript">alert("Data Berhasil Diinputkan!"); document.location="homedosen.php";</script>';
                        }
                        else 
                        {
                            echo '<script language="javascript">alert("Data Gagal Diinputkan!");</script>';
                        }                        
                    }

                    if (isset($_POST["editkelas"]))
                    {
                        $kode = $_POST['isikode'];
                        $nama_kelas = $_POST['nama_kelas'];
                        $hari = $_POST['hari'];
                        $jam_kuliah = $_POST['jam_kuliah'];
                        $sks = $_POST['sks'];
                        $input = "UPDATE kelas SET kode_kelas='$kode', nama_kelas='$nama_kelas', hari='$hari', jam_kuliah='$jam_kuliah', sks='$sks' WHERE kode_kelas = '$kode'";
                        $hasil = mysqli_query($koneksi, $input);
                        if($hasil)
                        {
                            echo '<script language="javascript">alert("Data Berhasil Diupdate!"); document.location="homedosen.php";</script>';
                        }
                        else 
                        {
                            echo '<script language="javascript">alert("Data Gagal Diupdate!");</script>';
                        }                        
                    }  
                ?>

                <!-- Mhs yang mengambil Kelas -->
                <br><br><h2>Daftar Mahasiswa Yang Mengambil Kelas</h2><br>
                <?php
                $res = mysqli_query($koneksi, "SELECT kelas.kode_kelas, kelas.nama_kelas, mahasiswa.nama FROM kelasmhs INNER JOIN kelas ON kelasmhs.kode_kelas = kelas.kode_kelas INNER JOIN mahasiswa ON kelasmhs.nim = mahasiswa.nim WHERE nip_dosen = '$nip'"); 
                echo "<table class='tabel' border='1' cellpadding='10'>";
                echo "<tr>
                        <th>No</th>
                        <th>Kode Kelas</th>
                        <th>Nama Kelas</th>
                        <th>Nama Mahasiswa</th>
                      </tr>";
                    
                    $no=1;
                    while($data = mysqli_fetch_array($res)){
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $data['kode_kelas']; ?></td>
                                <td><?php echo $data['nama_kelas']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                            </tr>
                        <?php
                        $no++;
                    }
                    echo "</table>";
                ?>
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

