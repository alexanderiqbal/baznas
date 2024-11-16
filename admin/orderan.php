<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<?php
include "navadmin.php";
?>
<!-- Page Content  -->
<div id="content">

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">No Orderan</th>
      <th scope="col">Nama Pemesan</th>
      <th scope="col">Tanggal Pemesan</th>
      <th scope="col">Status Pemesan</th>
      <th scope="col">Ubah Status Pemesan</th>
      <th scope="col">Konfirmasi Pembayaran</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <?php

  include "koneksi.php";
  

  ?>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>00213</td>
      <td>Otto</td>
      <td>23/04/2020</td>
      <td>Proses</td>
      <td>Pengiriman</td>
      <td>Lunas</td>
      <td><button class="btn btn-info">Ubah</button>/<button class="btn btn-danger">Hapus</button></td>
    </tr>
  </tbody>
</table>

</div>
</body>
</html>