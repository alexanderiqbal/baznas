<?php
include("../../../koneksi.php");

$id = $_GET['id'];
$status = "Terverifikasi";

$query_run = mysqli_query($koneksi, "UPDATE pembayaran set status_byr='$status' where id_byr='$id'");

if ($query_run) { ?>
    <script language="JavaScript">
        alert('Pembayaran Zakat Berhasil Di Verifikasi');
        document.location = '../../muzakki.php';
    </script> <?php
            } else { ?>
    <script language="JavaScript">
        alert('Pembayaran Zakat Gagal Di Verifikasi');
        document.location = '../../muzakki.php';
    </script> <?php
            }


                ?>