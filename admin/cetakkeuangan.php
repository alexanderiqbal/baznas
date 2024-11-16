<!doctype html>
<html class="no-js" lang="">

<head>

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>BAZNAS Kota Padang</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link href="../assets/img/ikonbaznas.png" rel="icon" type="image/png">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->

</head>

<body>
    <header id="header">
        <div class="container d-flex">

            <div class="logo mr-auto">
                <center> <a><img src="../assets/img/logobaznas.png" alt="" class="img-fluid"></a>
                    <h4 class="text-light"><a href="index.php"><span>Laporan Keuangan</span></a></h4>
                    <?php
                    include "../koneksi.php";
                    $data = mysqli_query($koneksi, "SELECT SUM(jmlh) as total from pembayaran WHERE NOT EXISTS (SELECT * FROM penerima WHERE pembayaran.id_byr = penerima.id_pembayaran) AND status_byr='Terverifikasi'");
                    while ($da = mysqli_fetch_array($data)) {
                    ?>
                        <h2>Total Kas : <span></span>
                            <?php echo "Rp " . number_format($da['total'], 0, '.'); ?></h2>

                    <?php } ?>
                </center>

            </div>



        </div>
    </header>
    <section id="about" class="about section-bg">

        <div class="container">
            <div class="card">
                <div class="section-title">
                    <?php
                    include "../koneksi.php";
                    $data = mysqli_query($koneksi, "SELECT SUM(jmlh) as total from pembayaran WHERE status_byr='Terverifikasi'");
                    while ($da = mysqli_fetch_array($data)) {
                    ?>
                        <h5 class="card-title" style="float: right;">Total Uang Masuk : <span></span>
                            <?php echo "Rp " . number_format($da['total'], 0, '.'); ?></h5>

                    <?php } ?>
                </div>
                <div class="row mb-3">
                    <table class="table table-border">
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

                    <div class="section-title">

                        <?php
                        include "../koneksi.php";
                        $data = mysqli_query($koneksi, "SELECT SUM(jmlh) as total from penerima INNER JOIN pembayaran ON penerima.id_pembayaran = pembayaran.id_byr WHERE status_byr='Terverifikasi'");
                        while ($da = mysqli_fetch_array($data)) {
                        ?>
                            <h5 class="card-title" style="float: right;">Total Uang Keluar : <span></span>
                                <?php echo "Rp " . number_format($da['total'], 0, '.'); ?></h5>

                        <?php } ?>
                    </div>
                    <div class="row mb-3">
                        <table class="table table-border">
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


                        <div>
                            <div style="width:100%;float:left">
                                Padang, <?php echo date('d-m-Y'); ?>
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />Admin

                            </div>
                            <div style="clear:both"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script>
        window.print();
    </script>
</body>

</html>