<?php

include("../../../../koneksi.php");

$idproduk = $_GET['id'];

$query_run = mysqli_query($koneksi, "DELETE from produk where id='$idproduk'");

if ($query_run) {
    echo '<script>alert ("Data Berhasil Di Hapus");</script>';
    header("location:../../listproduk.php");
} else {
    echo '<script>alert ("Data Gagal Di Hapus");</script>';
    header("location:../../../listproduk.php");
}
