<?php

include "../../../koneksi.php";

if (isset($_POST['simpan'])) {

    $id = $_POST['id1'];
    $nama = $_POST['nm'];
    $username = $_POST['un'];
    $pasw = $_POST['pass'];
    $lvl = $_POST['jab'];


    $sqlm = mysqli_query($koneksi, "UPDATE user set nama='$nama',username='$username',pasw='$pasw', level='$lvl' WHERE id_user='$id'");

    if ($sqlm) { ?>
        <script language="JavaScript">
            alert('Admin Berhasil Diubah');
            document.location = '../../admin.php';
        </script>
    <?php

    } else { ?>
        <script language="JavaScript">
            alert('Admin Gagal Diubah');
            document.location = '../../admin.php';
        </script>

<?php  }
}
?>