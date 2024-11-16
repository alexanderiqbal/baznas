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
    $nama = $_POST['nama'];
    $idzakat = $_POST['idzakat'];
    $jmlh = $_POST['jmlh'];
    $jenis = $_POST['jenis'];
    $status = "Unverifikasi";

    if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
        if ($ukuran < 1044070) {
            move_uploaded_file($lokfoto1, "../../../bukti/$nmfoto1");
            $sqlm = mysqli_query($koneksi, "INSERT into pembayaran values('','$tgl','$iduser','$nama','$jmlh','$jenis','$nmfoto1','$status')");
            if ($sqlm) { ?>
                <script language="JavaScript">
                    alert('Terimakasih Telah Membayar Zakat Anda');
                    document.location = '../../inputzakatmaal.php';
                </script>
            <?php } else { ?>
                <script language="JavaScript">
                    alert('Pembayaran Zakat Gagal Dilakukan');
                    document.location = '../../inputzakatmaal.php';
                </script>
            <?php  }
        } else { ?>
            <script language="JavaScript">
                alert('Foto Terlalu Besar');
                document.location = '../../inputzakatmaal.php';
            </script>
        <?php        }
    } else { ?>
        <script language="JavaScript">
            alert('Format Foto Salah');
            document.location = '../../inputzakatmaal.php';
        </script>
<?php   }
}
