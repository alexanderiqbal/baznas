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

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <?php include("navadmin.php"); ?>
    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>List Zakat</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a>List Donatur & Muzakki</a></li>
                    <li class="breadcrumb-item active"><a href="listzakat.php">List Zakat</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
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
                            <form method="POST" action="cetakmuzakki.php" enctype="multipart/form-data">
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

            <div class="card">
                <div class="card-body">
                    <center>
                        <h5 class="card-title">List Zakat</h5>
                    </center>

                    <a type="button" href="inputzakat.php" class="btn btn-success">Tambah Data</a>

                    <p type="button" class="btn btn-warning" style="float: right;" data-bs-toggle="modal" data-bs-target="#myModal">Print</p>


                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Muzakki</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Jenis Zakat</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            include "../koneksi.php";
                            $no = 1;
                            $datakat = mysqli_query($koneksi, "SELECT * FROM pembayaran INNER JOIN user ON pembayaran.id_byr = user.id_user WHERE jenis NOT LIKE 'donasi' ORDER BY tgl");
                            while ($dk = mysqli_fetch_assoc($datakat)) {

                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td><?php echo $dk['tgl']; ?></td>
                                    <td><?php echo $dk['namabyr']; ?></td>
                                    <td><?php echo $dk['jmlh']; ?></td>
                                    <td><?php echo $dk['jenis']; ?></td>
                                    <td><?php echo "<img src='../bukti/$dk[foto]' width='70' height='90'/>"; ?></td>
                                    <td>
                                        <?php
                                        if ($dk['status_byr'] == "Terverifikasi") {
                                            echo $dk['status_byr'];
                                        } else {
                                        ?>
                                            <a href="proses/edit/prosesverifikasizakat.php?id=<?php echo $dk['id_byr']; ?>" class="btn btn-danger"><?php echo $dk['status_byr']; ?></a>
                                        <?php } ?>
                                    </td>
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