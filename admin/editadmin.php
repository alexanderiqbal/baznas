<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PT. AMP Plantation</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>
    <?php
    include "../koneksi.php";
    $id = $_GET['id_login'];

    $data = mysqli_query($koneksi, "SELECT * FROM tab_login WHERE id_login='$id'");
    while ($ep = mysqli_fetch_array($data)) {

    ?>
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center justify-content-between">

                <h1 class="logo"><a href="index.php">PT. AMP Plantation</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="index.html" class="logo"><img src="assets/img/logo.JPEG" alt="" class="img-fluid"></a>

                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto" href="index.php">Home</a></li>
                        <li><a class="nav-link scrollto active" href="inputadmin.php">Input Admin</a></li>
                        <li><a class="nav-link scrollto" href="inputkaryawan.php">Input Karyawan</a></li>
                        <li><a class="nav-link scrollto" href="listkaryawan.php">List Karyawan</a></li>
                        <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>

                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center">
            <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
                <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="edit/editadmin.php">
                    <div class="wrap-input100 validate-input" data-validate="Enter nama">
                        <input class="form-control" type="hidden" name="kode" value="<?php echo $ep['id_login']; ?>">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter nama">
                        <input class="form-control" type="text" name="username" value="<?php echo $ep['username']; ?>">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>
                    <ul></ul>
                    <div class="wrap-input100 validate-input" data-validate="Enter umur">
                        <input class="form-control" type="password" name="pasw" value="<?php echo $ep['pasw']; ?>">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>
                    <ul></ul>
                    <div class="wrap-input100 validate-input">
                        <select class="form-control" name="lvl">
                            <option value="Admin">Admin</option>
                            <option value="Pimpinan">Pimpinan</option>
                            <option value="HRD">HRD</option>
                        </select>
                    </div>
                    <ul></ul>
                    <div class="text-center">
                        <button class="btn-get-started" value="simpan" name="simpan" id="simpan">Edit</button>
                    </div>
                </form>
            </div>
        </section><!-- End Hero -->
    <?php
    }
    ?>


    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>Alleks</span></strong>. All Rights Reserved Designed by BootstrapMade
            </div>

        </div>

    </div>
    </footer><!-- End Footer -->



    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>