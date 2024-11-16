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
    <link href="assets/css/modal.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <?php include("navadmin.php"); ?>
    </header><!-- End Header -->

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
                                <form method="POST" action="kalkulator.php">
                                    <h5 class="card-title">Zakat Fitrah</h5>
                                    <div class="row mb-3">
                                        <label for="pendapatan" class="col-md-4 col-lg-3 col-form-label">Jenis Beras</label>
                                        <div class="col-md-8 col-lg-9">
                                            <?php
                                            include "koneksi.php";

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
                                <form method="POST" action="kalkulator.php">
                                    <h5 class="card-title">Zakat Maal</h5>


                                    <div class="row mb-3">
                                        <?php
                                        include "koneksi.php";
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
                                        include "koneksi.php";
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