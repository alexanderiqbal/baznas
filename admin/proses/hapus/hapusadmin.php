<?php

include "../../../koneksi.php";

$id = $_GET['id'];

$query_run = mysqli_query($koneksi, "DELETE from user where id_user='$id'");

if ($query_run) { ?>
    <script language="JavaScript">
        alert('Admin Berhasil Di Hapus ');
        document.location = '../../admin.php';
    </script> <?php
            } else { ?>
    <script language="JavaScript">
        alert('Admin Gagal Di Hapus ');
        document.location = '../../admin.php';
    </script> <?php
            }
