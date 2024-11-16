<?php
include("../../../koneksi.php");

if (isset($_POST['simpan'])) {

    $nama = $_POST['nm'];
    $username = $_POST['un'];
    $pasw = $_POST['pass'];
    $jab = $_POST['jab'];
    $status = "Terverifikasi";

    $sqlm = mysqli_query($koneksi, "INSERT into user values ('','$nama','$username','$pasw','$jab','$status')");
    if ($sqlm) { ?><script language="JavaScript">
            alert('Admin Berhasil Di Tambah');
            document.location = '../../admin.php';
        </script> <?php
                } else { ?>
        <script language="JavaScript">
            alert('Admin Gagal Di Tambah ');
            document.location = '../../admin.php';
        </script> <?php
                }
            }
