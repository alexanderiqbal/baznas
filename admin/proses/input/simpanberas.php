<?php
include("../../../koneksi.php");

if (isset($_POST['simpan'])) {

    $jenis = $_POST['jenis'];
    $besaran = $_POST['besaran'];


    $sqlm = mysqli_query($koneksi, "INSERT into fitrah values ('','$jenis','$besaran')");
    if ($sqlm) { ?><script language="JavaScript">
            alert('Jenis Berhasil Di Tambah');
            document.location = '../../syaratzakatfitrah.php';
        </script> <?php
                } else { ?>
        <script language="JavaScript">
            alert('Jenis Gagal Di Tambah ');
            document.location = '../../syaratzakatfitrah.php';
        </script> <?php
                }
            }
