<?php
session_start();
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
    <link href="assets/img/ikonbaznas.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <?php include("navadmin.php"); ?>
    </header><!-- End Header -->

    <section id="about" class="about section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h3>Selamat Berzakat</h3>
                <p>Zakat tenang bersama BAZNAS Kota Padang</p>
            </div>

            <?php
            include("../koneksi.php");

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
                        document.location = 'inputzakatmaal.php';
                    </script> <?php
                            } else {
                                $total = 0.025 * $jumlah;
                            }
                        } else if (isset($_POST['simpanpenghasilan'])) {
                            $tgl = $_POST['tgl'];
                            $id = $_POST['iduser'];
                            $bonus = $_POST['bonus'];
                            $idzakat = $_POST['idzakat'];
                            $jenis = "Pendapatan";
                            $pendapatan = $_POST['pendapatan'];
                            $nishab = $_POST['nishab'];

                            $jumlah = (int)$pendapatan + (int)$bonus;
                            $setahun = 12 * $jumlah;
                            $nishabs = 85 * $nishab;

                            if ($setahun < $nishabs) {
                                ?><script language="JavaScript">
                        alert('Pendapatan Belum Sampai Nishab');
                        document.location = 'inputzakatmaal.php';
                    </script> <?php
                            } else {
                                $total = 0.025 * $jumlah;
                            }
                        } else if (isset($_POST['simpanfitrah'])) {

                            $besaran = $_POST['bonus'];
                            $idzakat = $_POST['prdId'];
                            $bonus = $_POST['bonus'];
                            $orang = $_POST['orang'];
                            $total = (int)$bonus * (int)$orang;
                            $jenis = "Fitrah";
                        } elseif (isset($_POST['donasi'])) {

                            $total = $_POST['jmlh'];
                            $idzakat = $_POST['idzakat'];
                            $jenis = "Donasi";
                        }
                                ?>

            <div class="col-md-15 grid-margin">

                <form method="POST" action="proses/input/simpanzakat.php" enctype="multipart/form-data">
                    <?php

                    ?>

                    <input name="iduser" hidden type="text" class="form-control" id="id1" value="<?php echo $_SESSION['id_user']; ?>">
                    <input name="idzakat" hidden type="text" class="form-control" id="idzakat" value="<?php echo $idzakat; ?>">


                    <div class="row mb-3">
                        <label for="bonus" class="col-md-4 col-lg-3 col-form-label">Tanggal</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="tgl" readonly type="text" class="form-control" id="tgl" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="bonus" class="col-md-4 col-lg-3 col-form-label">Nama Anda</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="nama" readonly type="text" class="form-control" id="nama" value="<?php echo $_SESSION['nama']; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="bonus" class="col-md-4 col-lg-3 col-form-label">Total Bayar</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="jmlh" readonly type="number" class="form-control" id="jmlh" value="<?php echo $total; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="bonus" class="col-md-4 col-lg-3 col-form-label">Jenis Pembayaran</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="jenis" readonly type="text" class="form-control" id="jenis" value="<?php echo $jenis; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="bonus" class="col-md-4 col-lg-3 col-form-label">Upload Bukti Pembayaran</label>
                        <div class="col-md-8 col-lg-9">
                            <input type="file" class="form-control" name="foto1">
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" name="simpan" class="btn btn-primary">Bayar</button>
                    </div>
                </form>
            </div><!-- End Bordered Tabs -->

        </div>
        </div>

        </div>
    </section>


    <footer id="footer">
        <?php include("footer.php"); ?>

    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


</body>

</html>