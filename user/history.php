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
                <h3>History Pembayaran Anda</h3>
            </div>
            <div class="col-md-15 grid-margin">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#zakat">Zakat</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#donasi">Donasi</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="zakat">
                                <form>
                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Tanggal Pembayaran</th>
                                                <th scope="col">Jenis Zakat</th>
                                                <th scope="col">Jumlah</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            include "../koneksi.php";
                                            $username = $_SESSION['id_user'];
                                            $no = 1;
                                            $datakat = mysqli_query($koneksi, "SELECT * from pembayaran where id_bayar =$username AND jenis NOT LIKE 'donasi'");
                                            while ($dk = mysqli_fetch_assoc($datakat)) {

                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $no++; ?></th>
                                                    <td><?php echo $dk['tgl']; ?></td>
                                                    <td><?php echo $dk['jenis']; ?></td>
                                                    <td><?php echo $dk['jmlh']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="donasi">
                                <form>
                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Jumlah</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            include "../koneksi.php";
                                            $username = $_SESSION['id_user'];
                                            $no = 1;
                                            $datakat = mysqli_query($koneksi, "SELECT * from pembayaran where id_bayar =$username AND jenis LIKE 'donasi'");
                                            while ($dk = mysqli_fetch_assoc($datakat)) {

                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $no++; ?></th>
                                                    <td><?php echo $dk['tgl']; ?></td>
                                                    <td><?php echo $dk['jmlh']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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