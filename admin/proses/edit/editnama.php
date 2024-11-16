<?php

include "../../../koneksi.php";

if (isset($_POST['simpan'])) {

    $id = $_POST['id1'];
    $nama = $_POST['nama'];

    $sqlm = mysqli_query($koneksi, "UPDATE user set nama='$nama' WHERE id_user='$id'");

    if ($sqlm) { ?>
        <script language="JavaScript">
            alert('Berhasil Diubah');
            document.location = '../../../testlogin/loginadmin.php';
        </script>
    <?php

    } else { ?>
        <script language="JavaScript">
            alert('Gagal Diubah');
            document.location = '../../profil.php';
        </script>

<?php  }
}
?>