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
    <script src='assets/datepicker/jquery-3.3.1.js' type='text/javascript'></script>
    <script src='assets/datepicker/jquery-ui.min.js' type='text/javascript'></script>
    <script type='text/javascript'>
        $(document).ready(function() {
            $('.dateFilter').datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <?php include("header.php"); ?>
    </header><!-- End Header -->

    <aside id="sidebar" class="sidebar">
        <?php include("navadmin.php"); ?>
    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data Keuangan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="datakeuangan.php">Data Keuangan</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section id="about" class="about section-bg">

            <div class="container">


                <div class="col-md-15 grid-margin">

                    <div class="card">
                        <div class="section-title">
                            <?php
                            include "../koneksi.php";
                            $data = mysqli_query($koneksi, "SELECT SUM(jmlh) as total from pembayaran WHERE NOT EXISTS (SELECT * FROM penerima WHERE pembayaran.id_byr = penerima.id_pembayaran) AND status_byr='Terverifikasi'");
                            while ($da = mysqli_fetch_array($data)) {
                            ?>
                                <h2>Total Kas : <span></span>
                                    <?php echo "Rp " . number_format($da['total'], 0, '.'); ?></h2>

                            <?php } ?>

                            <h2>
                                <p type="button" class="btn btn-warning" style="float: right;" data-bs-toggle="modal" data-bs-target="#myModal">Print</p>
                            </h2>
                        </div>

                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- konten modal-->
                                <div class="modal-content">
                                    <!-- heading modal -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Form Cetak Laporan</h4>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- body modal -->
                                    <div class="modal-body">
                                        <form method="POST" action="cetakkeuangan.php" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Tanggal Awal</label>
                                                <input type='date' class='form-control' name='fromDate'>
                                            </div>

                                            <div class="form-group">
                                                <label>Tanggal Akhir</label>
                                                <input type='date' class='form-control' name='endDate'>
                                            </div>
                                            <br>
                                            <center> <button type="submit" name="simpan" class="btn btn-primary">Cetak</button></center>
                                        </form>
                                    </div>
                                    <!-- footer modal -->

                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#uangmasuk">Uang Masuk</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#uangkeluar">Uang Keluar</button>
                                </li>
                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="uangmasuk">
                                    <form method="POST" action="inputbukti.php">
                                        <?php
                                        include "../koneksi.php";
                                        $data = mysqli_query($koneksi, "SELECT SUM(jmlh) as total from pembayaran WHERE status_byr='Terverifikasi'");
                                        while ($da = mysqli_fetch_array($data)) {
                                        ?>
                                            <h5 class="card-title">Total Uang Masuk : <span></span>
                                                <?php echo "Rp " . number_format($da['total'], 0, '.'); ?></h5>

                                        <?php } ?>
                                        <div class="row mb-3">
                                            <table class="table table-borderless">
                                                <thead>
                                                    <th>No</th>
                                                    <th>Tanggal</th>
                                                    <th>Nama User</th>
                                                    <th>Jenis Pembayaran</th>
                                                    <th>Jumlah</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    include "../koneksi.php";
                                                    $no = 1;
                                                    $datakat = mysqli_query($koneksi, "SELECT * from pembayaran WHERE status_byr='Terverifikasi' ");
                                                    while ($dk = mysqli_fetch_assoc($datakat)) {

                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $dk['tgl']; ?></td>
                                                            <td><?php echo $dk['namabyr']; ?></td>
                                                            <td><?php echo $dk['jenis']; ?></td>
                                                            <td><?php echo $dk['jmlh']; ?></td>
                                                        </tr>
                                                    <?php } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="uangkeluar">
                                    <form method="POST" action="inputbukti.php">
                                        <?php
                                        include "../koneksi.php";
                                        $data = mysqli_query($koneksi, "SELECT SUM(jmlh) as total from penerima INNER JOIN pembayaran ON penerima.id_pembayaran = pembayaran.id_byr WHERE status_byr='Terverifikasi'");
                                        while ($da = mysqli_fetch_array($data)) {
                                        ?>
                                            <h5 class="card-title">Total Uang Keluar : <span></span>
                                                <?php echo "Rp " . number_format($da['total'], 0, '.'); ?></h5>

                                        <?php } ?>
                                        <div class="row mb-3">
                                            <table class="table table-borderless">
                                                <thead>
                                                    <th>No</th>
                                                    <th>Nama User</th>
                                                    <th>Jenis Pembayaran</th>
                                                    <th>Jumlah</th>
                                                    <th>Penerima</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    include "../koneksi.php";
                                                    $no = 1;
                                                    $datakat = mysqli_query($koneksi, "SELECT * from penerima INNER JOIN pembayaran ON penerima.id_pembayaran = pembayaran.id_byr WHERE status_byr='Terverifikasi' ");
                                                    while ($dk = mysqli_fetch_assoc($datakat)) {

                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $dk['namabyr']; ?></td>
                                                            <td><?php echo $dk['jenis']; ?></td>
                                                            <td><?php echo $dk['jmlh']; ?></td>
                                                            <td><?php echo $dk['penerima']; ?></td>
                                                        </tr>
                                                    <?php } ?>

                                                </tbody>
                                            </table>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div><!-- End Bordered Tabs -->
                    </div>
                </div>
            </div>

            </div>
        </section>
    </main>

    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Syifa</span></strong>. All Rights Reserved
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