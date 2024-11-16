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
            <h1>Nilai Beras</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a>Syarat Zakat</a></li>
                    <li class="breadcrumb-item active"><a href="syaratzakatmaal.php">Input Beras Zakat Fitrah</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Input Beras</h5>

                    <!-- Multi Columns Form -->
                    <form class="row g-3" id="discussionForm" method="post" action="proses/edit/proseseditfitrah.php" enctype="multipart/form-data">
                        <?php
                        include "../koneksi.php";
                        $id = $_GET['id_zakat'];

                        $data = mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_zakat='$id'");
                        while ($ep = mysqli_fetch_array($data)) {

                        ?>
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Jenis Beras</label>
                                <input type="text" hidden class="form-control" id="id1" name="id1" value="<?php echo $ep['id_zakat']; ?>">
                                <input type="text" class="form-control" id="jenis" name="jenis" value="<?php echo $ep['jenis']; ?>">
                            </div>
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Nilai</label>
                                <input type="number" class="form-control" id="nil" name="nil" value="<?php echo $ep['besaran']; ?>">
                            </div>
                        <?php } ?>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" id="simpan" name="simpan">Submit</button>
                        </div>

                    </form><!-- End Multi Columns Form -->

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
    <script>
        ClassicEditor
            .create(document.querySelector('#alm'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>