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
                    <h4 class="text-light"><a href="index.php"><span>Laporan Daftar Penerima Zakat</span></a></h4>
                </center>
                <!-- Uncomment below if you prefer to use an image logo -->

            </div>

        </div>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Penerima</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Donatur</th>
                </tr>
            </thead>
            <?php

            include "../koneksi.php";
            $data = mysqli_query($koneksi, "SELECT * FROM pembayaran INNER JOIN penerima ON pembayaran.id_byr=penerima.id_pembayaran WHERE pembayaran.jenis LIKE 'Donasi'");
            $no = 1;
            while ($dk = mysqli_fetch_array($data)) {

            ?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $no++; ?></th>
                        <td><?php echo $dk['penerima']; ?></td>
                        <td><?php echo $dk['alamat']; ?></td>
                        <td><?php echo $dk['jmlh']; ?></td>
                        <td><?php echo $dk['namabyr']; ?></td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>
        <div>
            <div style="width:400px;float:right">
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
        <script>
            window.print();
        </script>
</body>

</html>