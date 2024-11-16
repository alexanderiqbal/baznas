<?php

include "koneksi.php";

if (isset($_POST['simpan'])) {

    $nmfoto1 = $_FILES["foto1"]["name"];
    $lokfoto1 = $_FILES["foto1"]["tmp_name"];

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $tipe = $_POST['tipe'];
    $status = $_POST['status'];
    $harga = $_POST['hrga'];
    $ket = $_POST['ket'];

    if (!empty($lokfoto1)) {
        move_uploaded_file($lokfoto1, "Faktur/$nmfoto1");
    }
    $sqlm = mysqli_query($koneksi, "UPDATE Faktur set foto='$nmfoto1', nama='$nama',tipe='$tipe',statuss='$status',hrg='$harga',keterangan='$ket' WHERE id=$id");

    if ($sqlm) {
        echo "Data Tersimpan";
        header("location:faktur.php");
    } else {
        echo "Gagal Tersimpan";
    }
}
