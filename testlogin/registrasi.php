<!DOCTYPE html>
<html lang="en">

<head>
    <title>BAZNAS Kota Padang</title>
    <?php include('component/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assetscss/main.css">
    <!--===============================================================================================-->

</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-30 p-b-50">
                <div class="logo-area">
                    <center> <a href="index.php">
                            <img style="width:25%;" src="../assets/img/ikonbaznas.png" alt="" />
                        </a> </center>
                </div>
                <span class="login100-form-title p-b-41">
                    Registrasi
                </span>
                <?php

                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "GAGAL") {
                        echo "LOGIN GAGAL! username atau password salah!";
                    } else if ($_GET['pesan'] == "LOGOUT") {
                        echo "Anda Telah Logout";
                    } else if ($_GET['pesan'] == "BELUM") {
                        echo "Anda Harus Login";
                    }
                }

                ?>
                <center>
                    <h3><a class="text-primary p-b-41" href="../index.php">Home</a></h3>
                </center>
                <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="registrasi_proses.php">
                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="nama" placeholder="Nama Lengkap">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="username" placeholder="User name">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-32">
                        <button class="login100-form-btn" name="simpan">
                            Daftar
                        </button>
                    </div>
                    <div class="container-login100-form-btn m-t-32">
                        <p> Sudah Punya Akun ? <a class="text-primary" href="login.php">Login</a></p><br>

                    </div>
                    <div class="container-login100-form-btn m-t-32">
                        <p> Anda Admin ? <a class="text-primary" href="loginadmin.php">Login Admin</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <!--===============================================================================================-->
    <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/vendor/bootstrap/js/popper.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="assets/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="assets/js/main.js"></script>

</body>

</html>