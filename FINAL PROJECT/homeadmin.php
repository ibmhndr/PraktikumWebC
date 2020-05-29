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

            function tambahdosen()
            {
                var tambahdosen = document.getElementById("tambahdosen");
                tambahdosen.style.display ="block"
            }

            function editstatusmhs(clicked_id)
            {                
                var id = clicked_id;
                document.getElementById("isinim").value = id;              
            }

            function editstatusdos(clicked_id)
            {                
                var id = clicked_id;
                document.getElementById("isinip").value = id;              
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
                <h2>Validasi Mahasiswa</h2>
                <?php
                $koneksi = mysqli_connect("localhost","root","","simak") or die(mysqli_error());
                $result = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE status='Belum Divalidasi'"); 
                echo "<table class='tabel' border='1' cellpadding='6' align='center'>";
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
                        <th>Aksi</th>
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
                                <td>
                                    <form action="" method="POST">
                                        <input type="text" name="nimm" value="<?php echo $data['nim']; ?>" style="display: none;">
                                        <input type="submit" name="validasi" value="Validasi">
                                    </form>
                                </td>
                            </tr>
                        <?php
                        $no++;
                    }
                    echo "</table>";
            ?></div>
            <?php 
            if (isset($_POST["validasi"]))
            {
                $validasi = $_POST['nimm'];
                $input = "UPDATE mahasiswa SET status='Aktif' WHERE nim = '$validasi'";
                $hasil = mysqli_query($koneksi, $input);
                echo '<script language="javascript">alert("Status Berhasil Diubah!"); document.location="homeadmin.php";</script>';
                if($hasil)
                {
                    echo '<script language="javascript">alert("Data Berhasil Diinputkan!"); document.location="homeadmin.php";</script>';
                }
                else 
                {
                    echo '<script language="javascript">alert("Data Gagal Diinputkan!");</script>';
                }
            }?>
        <!-- Daftar Mahasiswa -->

        <!-- Daftar Dosen -->
            <div class="content" id="daftardosen">
                <h2>Daftar Dosen</h2>
                <input id="tombolkelas" type="button" onclick="tambahdosen()" value="Tambah Dosen"><p></p>           
                <?php
                $koneksi = mysqli_connect("localhost","root","","simak") or die(mysqli_error());
                $result = mysqli_query($koneksi, "SELECT * FROM dosen"); 
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
            ?>
            <div id="tambahdosen">
            <br><h3>Tambah Dosen</h3>
            <form action="" method="POST">
                <label>NIP&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label><input type="text" class="data" name="nipp"><br>
                <label>Email&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label><input type="text" class="data" name="emaill" ><br>
                <label>Nama&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label><input type="text" class="data" name="namaa"><br>
                <label>Jenis Kelamin <font color="red"><b>*</b></font></label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type='radio' name='jenis_kelamin'value='Laki-Laki'><a>Laki-laki &nbsp&nbsp</a>
                    <input type='radio' name='jenis_kelamin'value='Perempuan'><a>Perempuan </a><br>
                <label>Pendidikan Terakhir&nbsp&nbsp: </label><input type="text" class="data" name="pendidikan_terakhir"><br>
                <label>Jabatan Terakhir&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label><input type="text" class="data" name="jabatan_terakhir"><br>
                <label>Fakultas&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label><input type="text" class="data" name="fakultas"><br>
                <label>Jurusan&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label><input type="text" class="data" name="jurusan"><br>
                <input id="aksi3" type="submit" name="tambahdosen" value="Tambah Dosen">
            </div>
            <?php 
            if (isset($_POST["tambahdosen"]))
            {
                $nipp = $_POST['nipp'];
                $emaill = $_POST['emaill'];
                $namaa = $_POST['namaa'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
                $jabatan_terakhir = $_POST['jabatan_terakhir'];
                $fakultas = $_POST['fakultas'];
                $jurusan = $_POST['jurusan'];
                $input = "INSERT INTO dosen (nip, email, nama, pendidikan_terakhir, jabatan_terakhir, fakultas, jurusan, jenis_kelamin, status) VALUES ('$nipp', '$emaill', '$namaa', '$pendidikan_terakhir', '$jabatan_terakhir', '$fakultas', '$jurusan', '$jenis_kelamin', 'Aktif')";
                $hasil = mysqli_query($koneksi, $input);
                if($hasil)
                {
                    echo '<script language="javascript">alert("Data Berhasil Diinputkan!"); document.location="homeadmin.php";</script>';
                }
                else 
                {
                    echo '<script language="javascript">alert("Data Gagal Diinputkan!");</script>';
                }                        
            }?>
        </div>
        <!-- Daftar Dosen -->

        <!-- Sidebar Admin -->
        <div id="mhs">
            <div class="sidebar-menu" id="menumhs">
                <div class="artikel">
                    <p align="center" class="menu" onclick="return datamhs()">DATA USER</a></p>
                    <p align="center" class="menu" onclick="return daftarmhs()">VERIFIKASI MAHASISWA</a></p>
                    <p align="center" class="menu" onclick="return daftardosen()">DAFTAR DOSEN</a></p>
                    <p align="center" class="menu" onclick="return kelasmhs()">EDIT STATUS MAHASISWA</a></p>
                    <p align="center" class="menu" onclick="return bimbinganmhs()">EDIT STATUS DOSEN</a></p>
                </div>
            </div>
            <!-- Data Dosen -->
            <div class="content" id="datamhs">
                <h2>Data User</h2>
                <?php
                $koneksi = mysqli_connect("localhost","root","","simak") or die(mysqli_error());
                $sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE email = '$email'");
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
                    ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <br>

                    <label>No Telepon : </label><input class="data" type="text" name="no_telp" value="<?php echo $row['no_telp']; ?>"readonly style="background-color: #ded1d1 ">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    &nbsp&nbsp&nbsp&nbsp&nbsp
                    <label>Alamat : </label><input class="data" type="text" name="alamat" readonly style="background-color: #ded1d1" value="<?php echo $row['alamat']; ?>"><br>
                </form>
            </div>
        <!-- Akhir data dosen -->

        <!-- Edit Mhs -->
        <div class="content" id="kelasmhs">
            <h2>Edit Status Mahasiswa</h2><br>
            <form action="" method="POST">
                <label>NIM&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label><input id="isinim" type="text" class="data" name="nimp" readonly style="background-color: #ded1d1"><br>
                <label>Status&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label><input type="text" class="data" name="statusm"><br>
                <input id="aksi2" type="submit" name="upstatmhs" value="Update"><p></p><br>
            </form>
                <?php
                $koneksi = mysqli_connect("localhost","root","","simak") or die(mysqli_error());

                if (isset($_POST["upstatmhs"]))
                {
                    $nimp = $_POST['nimp'];
                    $stat = $_POST['statusm'];
                    $input = "UPDATE mahasiswa SET status='$stat' WHERE nim = '$nimp'";
                    $hasil = mysqli_query($koneksi, $input);
                    echo '<script language="javascript">alert("Status Berhasil Diubah!"); document.location="homeadmin.php";</script>';
                }

                $result = mysqli_query($koneksi, "SELECT * FROM mahasiswa"); 
                echo "<table class='tabel' border='1' cellpadding='6' align='center'>";
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
                        <th>Aksi</th>
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
                                <td>
                                    <input id="<?php echo $data['nim']; ?>" type="button" name="edit" value="Edit" onClick="editstatusmhs(this.id)" style="width: 100%;      background-color: #4CAF50; color: white; padding: 10px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;">
                                </td>
                            </tr>
                        <?php
                        $no++;
                    }
                    echo "</table>";
                ?>
        </div>
        <!-- Akhir Edit Mhs -->

        <!-- Edit Dosen -->
            <div id="bimbinganmhs">
            <h2>Edit Status Dosen</h2><br>
            <form action="" method="POST">
                <label>NIP&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label><input id="isinip" type="text" class="data" name="nipm" readonly style="background-color: #ded1d1"><br>
                <label>Status&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label><input type="text" class="data" name="statusd"><br>
                <input id="aksi2" type="submit" name="upstatmhs" value="Update"><p></p><br>
            </form>
                <?php
                $koneksi = mysqli_connect("localhost","root","","simak") or die(mysqli_error());

                if (isset($_POST["upstatmhs"]))
                {
                    $nipm = $_POST['nipm'];
                    $statd = $_POST['statusd'];
                    $input = "UPDATE dosen SET status='$statd' WHERE nip = '$nipm'";
                    $hasil = mysqli_query($koneksi, $input);
                    echo '<script language="javascript">alert("Status Berhasil Diubah!"); document.location="homeadmin.php";</script>';
                }

                $result = mysqli_query($koneksi, "SELECT * FROM dosen"); 
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
                        <th>Aksi</th>
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
                                <td>
                                    <form action="" method="POST">
                                        <input id="<?php echo $data['nip']; ?>" type="button" name="edit" value="Edit" onClick="editstatusdos(this.id)" style="width: 100%;      background-color: #4CAF50; color: white; padding: 10px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;"><br>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        $no++;
                    }
                    echo "</table>";
            ?>
            </div>
        <!-- Akhir Edit Dosen -->
    </div>
    <!-- Akhir Mahasiswa -->
    </body>
</html>

