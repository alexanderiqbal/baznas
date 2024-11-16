<?php
include("../../../koneksi.php");

$id = $_GET['id'];
$status = "Terverifikasi";

$query_run = mysqli_query($koneksi, "UPDATE user set status='$status' where id_user='$id'");

if ($query_run) { ?>
    <script language="JavaScript">
        alert('User Berhasil Di Verifikasi');
        document.location = '../../Verifikasi.php';
    </script> <?php
            } else { ?>
    <script language="JavaScript">
        alert('User Gagal Di Verifikasi');
        document.location = '../../Verifikasi.php';
    </script> <?php
            }


                ?>