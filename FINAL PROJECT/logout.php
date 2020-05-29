<?php
session_start();
session_destroy();
echo '<script>alert("Anda Berhasil Logout"); document.location="index.php";</script>';