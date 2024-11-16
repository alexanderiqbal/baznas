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
                    <li class="breadcrumb-item"><a>Muzakki</a></li>
                    <li class="breadcrumb-item active"><a href="inputzakat.php">Input Zakat</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section id="about" class="about section-bg">

            <div class="container">

                <div class="section-title">
                    <h3>Kalkulator</h3>
                </div>
                <div class="col-md-15 grid-margin">
                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#zakatpenghasilan">Zakat Fitrah</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#zakatmaal">Zakat Maal</button>
                                </li>
                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="zakatpenghasilan">
                                    <form method="POST" action="inputbukti.php">
                                        <h5 class="card-title">Zakat Fitrah</h5>
                                        <div class="row mb-3">
                                            <label for="pendapatan" class="col-md-4 col-lg-3 col-form-label">Jenis Beras</label>
                                            <div class="col-md-8 col-lg-9">
                                                <?php
                                                include "../koneksi.php";

                                                $result = mysqli_query($koneksi, "select * from nilai where jenis not like 'emas'");
                                                $jsArray = "var prdName = new Array();\n";
                                                echo '<select class="form-control" id="exampleFormControlSelect1" name="prdId" onchange="changeValue(this.value)">';
                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo '<option value="' . $row['id_zakat'] . '">' . $row['jenis'] . '</option>';
                                                    $jsArray .= "prdName['" . $row['id_zakat'] . "'] = {name:'" . addslashes($row['besaran']) . "'};\n";
                                                }
                                                echo '</select>'; ?>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="bonus" class="col-md-4 col-lg-3 col-form-label">Nilai Zakat</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="bonus" readonly type="number" class="form-control" id="prd_name" value="<?php echo $dat['besaran']; ?>">
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            <?php echo $jsArray; ?>

                                            function changeValue(id) {

                                                document.getElementById('prd_name').value = prdName[id].name;

                                            };
                                        </script>

                                        <div class="row mb-3">
                                            <label for="nilaifidyah" class="col-md-4 col-lg-3 col-form-label">Jumlah Orang</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="orang" required type="number" class="form-control" id="nilaifidyah">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" name="simpanfitrah" class="btn btn-primary">Hitung</button>
                                        </div>
                                    </form>
                                </div>

                                <?php
                                if (isset($_POST['simpanmaal'])) {

                                    $emas = $_POST['fidyah'];
                                    $uang = $_POST['uang'];
                                    $aset = $_POST['aset'];
                                    $hutang = $_POST['hutang'];


                                    $idzakat = $_POST['idzakat'];
                                    $jenis = "Maal";
                                    $nishab = $_POST['nishab'];

                                    $jumlah = ((int)$emas + (int)$uang + (int)$aset) - (int)$hutang;
                                    $nishabs = 85 * $nishab;

                                    if ($jumlah < $nishabs) { ?>
                                        <script language="JavaScript">
                                            alert('Harta Belum Sampai Nishab');
                                            document.location = 'kalkulator.php';
                                        </script> <?php
                                                } else {
                                                    $besaran = 0.025 * $jumlah;
                                                    $hasil_rupiah = "Rp " . number_format($besaran, 0, ',', '.');
                                                    ?>
                                        <script language="JavaScript">
                                            alert('Total Zakat Mal Anda Adalah = <?php echo $hasil_rupiah; ?> ');
                                            document.location = 'kalkulator.php';
                                        </script> <?php
                                                }
                                            } else if (isset($_POST['simpanfitrah'])) {

                                                $besaran = $_POST['bonus'];
                                                $idzakat = $_POST['prdId'];
                                                $bonus = $_POST['bonus'];
                                                $orang = $_POST['orang'];
                                                $total = (int)$bonus * (int)$orang; ?>
                                    <script language="JavaScript">
                                        alert('Total Zakat Fitrah Anda Adalah = <?php echo "Rp " . number_format($total, 0, ',', '.'); ?> ');
                                        document.location = 'kalkulator.php';
                                    </script> <?php

                                            }

                                                ?>

                                <div class="tab-pane fade profile-edit pt-3" id="zakatmaal">
                                    <form method="POST" action="inputbukti.php">
                                        <h5 class="card-title">Zakat Maal</h5>


                                        <div class="row mb-3">
                                            <?php
                                            include "../koneksi.php";
                                            $datakat = mysqli_query($koneksi, "SELECT * FROM nilai where jenis = 'emas'  ");
                                            while ($dk = mysqli_fetch_array($datakat)) {
                                            ?>
                                                <div class="col-md-8 col-lg-9">
                                                    <input hidden name="nishab" type="number" class="form-control" id="bonus" value="<?php echo $dk['besaran']; ?>">
                                                    <input hidden name="idzakat" type="number" class="form-control" id="idzakat" value="<?php echo $dk['id_zakat']; ?>">
                                                </div>
                                            <?php } ?>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="nilaifidyah" class="col-md-4 col-lg-3 col-form-label">Nilai Emas, Perak, Atau Permata</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="fidyah" type="number" class="form-control" id="nilaifidyah">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="nilaifidyah" class="col-md-4 col-lg-3 col-form-label">Uang Tunai, Tabungan & Deposito</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="uang" type="number" class="form-control" id="uang">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="nilaifidyah" class="col-md-4 col-lg-3 col-form-label">Kendaraan, Rumah, Aset Lain</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="aset" type="number" class="form-control" id="aset">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="nilaifidyah" class="col-md-4 col-lg-3 col-form-label">Jumlah Hutang</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="hutang" type="number" class="form-control" id="piutang">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <?php
                                            include "../koneksi.php";
                                            $datakat = mysqli_query($koneksi, "SELECT * FROM nilai where jenis = 'emas'  ");
                                            while ($dk = mysqli_fetch_array($datakat)) {
                                            ?>
                                                <div class="col-md-8 col-lg-9">
                                                    <input hidden name="nishab" type="number" class="form-control" id="bonus" value="<?php echo $dk['besaran']; ?>">
                                                    <input hidden name="idzakat" type="number" class="form-control" id="idzakat" value="<?php echo $dk['id_zakat']; ?>">
                                                </div>
                                            <?php } ?>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" name="simpanmaal" class="btn btn-primary">Hitung</button>
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