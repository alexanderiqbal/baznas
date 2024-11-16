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
            <h1>List Zakat</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="donatur.php">Donatur</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section id="about" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="card-title">
                    <center>
                        <h3>Selamat Berdonasi</h3>
                        <p>Donasi tenang bersama BAZNAS Kota Padang</p>
                    </center>
                </div>

                <div class="col-md-15 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">

                                <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="inputbuktidonasi.php">
                                    <?php
                                    include "../koneksi.php";
                                    $datakat = mysqli_query($koneksi, "SELECT * FROM nilai where jenis = 'donasi'");
                                    while ($dk = mysqli_fetch_array($datakat)) {
                                    ?>
                                        <input name="tgl" hidden type="text" class="form-control" id="tgl" value="<?php echo date('Y-m-d'); ?>">
                                        <input name="iduser" hidden type="text" class="form-control" id="id1" value="<?php echo $_SESSION['id_user']; ?>">
                                        <input name="idzakat" hidden type="number" class="form-control" id="idzakat" value="<?php echo $dk['id_zakat']; ?>">
                                    <?php } ?>


                                    <div class="wrap-input100 validate-input">
                                        <h5 class="input100">Jumlah Donasi</h5>
                                        <input class="form-control" type="number" required name="jmlh" placeholder="Jumlah Donasi">
                                    </div>
                                    <br>

                                    <div class="section-title">
                                        <center>
                                            <button type="submit" name="donasi" class="btn btn-primary">Bayar</button>
                                        </center>
                                    </div>

                                </form>
                            </div>
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