<?php

include "../../../koneksi.php";

if (isset($_POST["simpan"])) {

    $ekstensi_diperbolehkan    = array('png', 'jpg', 'JPEG');
    $nmfoto1 = $_FILES["foto1"]["name"];
    $x = explode('.', $nmfoto1);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['foto1']['size'];
    $lokfoto1 = $_FILES["foto1"]["tmp_name"];

    $tgl = $_POST['tgl'];
    $iduser = $_POST['iduser'];
    $idzakat = $_POST['idzakat'];
    $nama = $_POST['nama'];
    $jmlh = $_POST['jmlh'];
    $jenis = $_POST['jenis'];
    $status = "Terverifikasi";

    if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
        if ($ukuran < 1044070) {
            move_uploaded_file($lokfoto1, "../../../bukti/$nmfoto1");
            $sqlm = mysqli_query($koneksi, "INSERT into pembayaran values('','$tgl','$iduser','$nama','$jmlh','$jenis','$nmfoto1','$status')");
            if ($sqlm) { ?>
                <script language="JavaScript">
                    alert('Terimakasih Telah Berdonasi');
                    document.location = '../../donatur.php';
                </script>
            <?php } else { ?>
                <script language="JavaScript">
                    alert('Donasi Gagal Dilakukan');
                    document.location = '../../donatur.php';
                </script>
            <?php  }
        } else { ?>
            <script language="JavaScript">
                alert('Foto Terlalu Besar');
                document.location = '../../donatur.php';
            </script>
        <?php        }
    } else { ?>
        <script language="JavaScript">
            alert('Format Foto Salah');
            document.location = '../../donatur.php';
        </script>
<?php   }
}
