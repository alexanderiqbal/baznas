<?php

include "../../../koneksi.php";

if (isset($_POST['simpan'])) {

    $id = $_POST['id1'];
    $pasw = $_POST['newpasw'];
    $repas = $_POST['renewpasw'];

    if ($pasw != $repas) { ?>
        <script language="JavaScript">
            alert('Password Tidak Sama');
            document.location = '../../profil.php';
        </script>

        <?php } else {
        $sqlm = mysqli_query($koneksi, "UPDATE user set pasw='$pasw' WHERE id_user='$id'");

        if ($sqlm) { ?>
            <script language="JavaScript">
                alert('Berhasil Diubah');
                document.location = '../../../testlogin/loginadmin.php';
            </script>
        <?php } else { ?>
            <script language="JavaScript">
                alert('Gagal Diubah');
                document.location = '../../profil.php';
            </script>

<?php  }
    }
}
?>