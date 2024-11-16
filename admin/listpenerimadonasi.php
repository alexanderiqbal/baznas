<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("location:../testlogin/loginadmin.php?pesan=GAGAL");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>BAZNAS Kota Padang</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <?php include("header.php"); ?>
    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <?php include("navadmin.php"); ?>
    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>List Penerima Donasi</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"><a href="listpenerimadonasi.php">Penerima Donasi</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="card">
                <div class="card-body">

                    <div id="maiModal" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <!-- konten modal-->
                            <div class="modal-content">
                                <!-- heading modal -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Form Tambah Data</h4>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">&times;</button>
                                </div>
                                <!-- body modal -->
                                <div class="modal-body">
                                    <form class="row g-3" id="discussionForm" method="post" action="proses/input/simpanpenerimadonasi.php" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                            <label for="inputName5" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="nm" name="nm">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputEmail5" class="form-label">Alamat</label>
                                            <textarea name="alm" class="form-control" id="alm" rows="10" cols="80"></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="pendapatan" class="form-label">Nama Donatur</label>
                                            <?php
                                            include "../koneksi.php";

                                            $result = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE NOT EXISTS (SELECT * FROM penerima WHERE pembayaran.id_byr = penerima.id_pembayaran) AND pembayaran.jenis LIKE 'donasi'");
                                            $jsArray = "var prdName = new Array();\n";
                                            echo '<select class="form-control" id="exampleFormControlSelect1" name="prdId" onchange="changeValue(this.value)">
                                            <option>------</option>';
                                            while ($row = mysqli_fetch_assoc($result)) {

                                                echo '<option value="' . $row['id_byr'] . '">' . $row['namabyr'] . '</option>';
                                                $jsArray .= "prdName['" . $row['id_byr'] . "'] = {
                                                    jumlah:'" . addslashes($row['jmlh']) . "',
                                                    nama:'" . addslashes($row['namabyr']) . "',
                                                    penerima:'" . addslashes($row['id_bayar']) . "'};\n";
                                            }
                                            echo '</select>'; ?>

                                        </div>

                                        <div class="col-md-12">
                                            <label for="bonus" class="form-label">Jumlah Diterima</label>
                                            <input name="jmlh" readonly type="number" class="form-control" id="prd_name">
                                            <input name="id" hidden type="number" class="form-control" id="id_name">
                                            <input name="nmbyr" hidden type="text" class="form-control" id="name_byr">
                                        </div>
                                        <script type="text/javascript">
                                            <?php echo $jsArray; ?>

                                            function changeValue(id) {
                                                document.getElementById('id_name').value = prdName[id].penerima;
                                                document.getElementById('prd_name').value = prdName[id].jumlah;
                                                document.getElementById('name_byr').value = prdName[id].nama;

                                            };
                                        </script>
                                        <div class="text-center">

                                            <button type="submit" class="btn btn-primary" id="simpan" name="simpan">Submit</button>
                                        </div>


                                    </form><!-- End Multi Columns Form -->
                                </div>
                                <!-- footer modal -->

                            </div>
                        </div>
                    </div>


                    <h5 class="card-title">List Penerima Donasi</h5>
                    <p type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#maiModal">Tambah Data</p>

                    <a type="button" href="cetakpenerimadonasi.php" class="btn btn-warning" style="float: right;">Print</a>

                    <table class="table table-borderless text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Penerima</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Donatur</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            include "../koneksi.php";
                            $no = 1;
                            $datakat = mysqli_query($koneksi, "SELECT * FROM penerima INNER JOIN pembayaran ON penerima.id_pembayaran = pembayaran.id_byr WHERE pembayaran.jenis LIKE 'Donasi'");
                            while ($dk = mysqli_fetch_array($datakat)) {

                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td><?php echo $dk['penerima']; ?></td>
                                    <td><?php echo $dk['jmlh']; ?></td>
                                    <td><?php echo $dk['alamat']; ?></td>
                                    <td><?php echo $dk['namabyr']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </main>


    </div>
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Syifa</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>


    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>