<?php

include("../../../../koneksi.php");

$id = $_GET['id'];

$query_run = mysqli_query($koneksi, "DELETE from karyawan where id_karyawan='$id'");
if ($query_run) {
    echo '<script>alert ("Data Berhasil Di Hapus");</script>';
    header("location:../../listuser.php");
} else {
    echo '<script>alert ("Data Gagal Di Hapus");</script>';
    header("location:../../../listuser.php");
}
