<?php

include "../../../koneksi.php";

if (isset($_POST['simpan'])) {

    $id = $_POST['id1'];
    $jenis = $_POST['jenis'];
    $besaran = $_POST['nil'];

    $sqlm = mysqli_query($koneksi, "UPDATE nilai set jenis='$jenis',besaran='$besaran' WHERE id_zakat='$id'");

    if ($sqlm) { ?>
        <script language="JavaScript">
            alert('Berhasil Diubah');
            document.location = '../../syaratzakatfitrah.php';
        </script>
    <?php } else { ?>
        <script language="JavaScript">
            alert('Gagal Diubah');
            document.location = '../../syaratzakatfitrah.php';
        </script>
<?php }
}
?>