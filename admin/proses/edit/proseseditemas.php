<?php

include "../../../koneksi.php";

if (isset($_POST['simpan'])) {

    $id = $_POST['id1'];
    $besaran = $_POST['nm'];


    $sqlm = mysqli_query($koneksi, "UPDATE nilai set besaran='$besaran' WHERE id_zakat='$id'");

    if ($sqlm) { ?>
        <script language="JavaScript">
            alert('Berhasil Teredit');
            document.location = '../../syaratzakatmaal.php';
        </script>
    <?php } else { ?>
        <script language="JavaScript">
            alert('Gagal Teredit');
            document.location = '../../syaratzakatmaal.php';
        </script>
<?php }
}
?>