<?php
include("../../../koneksi.php");

$id = $_GET['id'];
$status = "Terverifikasi";

$query_run = mysqli_query($koneksi, "UPDATE pembayaran set status_byr='$status' where id_byr='$id'");

if ($query_run) { ?>
    <script language="JavaScript">
        alert('Pembayaran Donasi Berhasil Di Verifikasi');
        document.location = '../../donatur.php';
    </script> <?php
            } else { ?>
    <script language="JavaScript">
        alert('Pembayaran Donasi Gagal Di Verifikasi');
        document.location = '../../donatur.php';
    </script> <?php
            }


                ?>