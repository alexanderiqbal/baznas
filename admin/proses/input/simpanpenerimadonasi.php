<?php
include("../../../koneksi.php");

if (isset($_POST['simpan'])) {

    $nama = $_POST['nm'];
    $alamat = $_POST['alm'];
    $jmlh = $_POST['jmlh'];
    $muzakki = $_POST['id'];
    $pemberi = $_POST['nmbyr'];
    $id = $_POST['prdId'];

    $sqlm = mysqli_query($koneksi, "INSERT into penerima values ('','$nama','$alamat','$id')");
    if ($sqlm) { ?><script language="JavaScript">
            alert('Penerima Donasi Berhasil Di Tambah');
            document.location = '../../listpenerimadonasi.php';
        </script> <?php
                } else { ?>
        <script language="JavaScript">
            alert('Penerima Donasi Gagal Di Tambah ');
            document.location = '../../listpenerimadonasi.php';
        </script> <?php
                }
            }
