<?php
session_start();
include '../koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$login = mysqli_query($koneksi, "SELECT * from user where username = '$username' and pasw = '$password' and level = '$level'");

$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

    $data = mysqli_fetch_assoc($login);
    if ($data['status'] == "Unverifikasi") { ?>
        <script language="JavaScript">
            alert('Akun Belum Terverifikasi, Silahkan Hubungi Admin');
            document.location = '../index.php';
        </script>
    <?php
    }
    if ($level == "Admin") {
        $_SESSION['username'] = $username;
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
    ?>
        <script language="JavaScript">
            alert('Login Sukses,Selamat Datang Admin ');
            document.location = '../admin/index.php';
        </script>
    <?php
    } else if ($level == "User") {
        $_SESSION['username'] = $username;
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];

    ?>
        <script language="JavaScript">
            alert('Login Sukses,Selamat Datang Di Sistem BAZNAS Kota Padang ');
            document.location = '../user/index.php';
        </script>
    <?php
    } else { ?>
        <script language="JavaScript">
            alert(' / Password Belum Terdaftar');
            document.location = '../index.php';
        </script>
    <?php
    }
} else {
    ?>
    <script language="JavaScript">
        alert('Username / Password Belum Terdaftar');
        document.location = '../index.php';
    </script>
<?php

} ?>