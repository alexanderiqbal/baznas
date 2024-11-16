<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("location:../testlogin/loginadmin.php?pesan=GAGAL");
} else {
    $_SESSION['username'];
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
            <h1>Profil</h1>

        </div><!-- End Page Title -->

        <?php
        include("../koneksi.php");
        $login = mysqli_query($koneksi, "SELECT * from user where id_user='$_SESSION[id_user]'");

        while ($dk = mysqli_fetch_array($login)) {
        ?>
            <section class="section profile">
                <div class="row">
                    <div class="col-xl-4">

                        <div class="card">
                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">


                                <h2><?php echo $dk['nama']; ?></h2>
                                <h3><?php echo $dk['level']; ?></h3>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-8">

                        <div class="card">
                            <div class="card-body pt-3">
                                <!-- Bordered Tabs -->
                                <ul class="nav nav-tabs nav-tabs-bordered">

                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profil</button>
                                    </li>

                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Pengaturan</button>
                                    </li>

                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ganti Password</button>
                                    </li>

                                </ul>
                                <div class="tab-content pt-2">

                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                        <h5 class="card-title">Detail Profil</h5>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $dk['nama']; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Username</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $dk['username']; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Jabatan</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $dk['level']; ?></div>
                                        </div>


                                    </div>

                                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                        <!-- Profile Edit Form -->
                                        <form method="POST" action="proses/edit/editnama.php">
                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="nama" type="text" class="form-control" id="nama" value="<?php echo $dk['nama']; ?>">
                                                    <input class="col-md-4 col-lg-3 col-form-label" hidden name="id1" value="<?php echo $dk['id_user']; ?>">
                                                </div>
                                            </div>


                                            <div class="text-center">
                                                <button type="submit" name="simpan" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                        </form><!-- End Profile Edit Form -->

                                    </div>

                                    <div class="tab-pane fade pt-3" id="profile-change-password">
                                        <!-- Change Password Form -->
                                        <form method="POST" action="proses/edit/editpassword.php">

                                            <div class="row mb-3">
                                                <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input class="col-md-4 col-lg-3 col-form-label" hidden name="id1" value="<?php echo $dk['id_user']; ?>">
                                                    <input name="password" type="password" disabled class="form-control" id="currentPassword" value="<?php echo $dk['pasw']; ?>">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="newpasw" type="password" class="form-control" id="newPassword">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password Baru</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="renewpasw" type="password" class="form-control" id="renewPassword">
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" name="simpan" class="btn btn-primary">Tukar Password</button>
                                            </div>
                                        </form><!-- End Change Password Form -->

                                    </div>

                                </div><!-- End Bordered Tabs -->

                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>
        <?php } ?>
    </main>
    <!-- End #main -->

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

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>