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
                    Login Admin
                </span>
                <?php


                ?>
                <center>
                    <h3><a class="text-primary p-b-41" href="login.php">Kembali</a></h3>
                </center>

                <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="login_proses.php">


                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="username" placeholder="User name">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" hidden data-validate="Enter password">
                        <input class="input100" type="password" hidden name="level" value="Admin">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-32">
                        <button class="login100-form-btn" name="simpan" id="simpan">
                            Login
                        </button>
                    </div>
                    <div class="container-login100-form-btn m-t-32">
                        <p><a class="text-primary" href="login.php">Home</a></p><br>
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