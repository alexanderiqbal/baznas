<?php
include("../koneksi.php");

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $user = $_POST['username'];
    $pasw = $_POST['password'];
    $level = "User";
    $status = "Unverifikasi";


    $sqlm = mysqli_query($koneksi, "INSERT into user values ('','$nama','$user','$pasw','$level','$status')");
    if ($sqlm) { ?>
        <script language="JavaScript">
            alert('Registrasi Berhasil Dilakukan, Tunggu Beberapa Saat Hingga Admin Selesai Verifikasi');
            document.location = '../index.php';
        </script>
    <?php
    } else { ?>
        <script language="JavaScript">
            alert('Registrasi Gagal Dilakukan, Coba Ulang Kembali');
            document.location = 'registrasi.php';
        </script>
<?php }
}
