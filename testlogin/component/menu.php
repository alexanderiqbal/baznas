<div class="main-menu-area mg-tb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <?php
                    if ($_SESSION['level'] == "Admin") :
                    ?>
                        <li>
                            <a href="index.php"><i class="notika-icon notika-house"></i>Home</a>
                        </li>
                        <li>
                            <a href="index.php?page=data_admin"><i class="notika-icon notika-support"></i> Data User</a>
                        </li>
                        <li>
                            <a href="index.php?page=data_alternative"><i class="notika-icon notika-edit"></i> Data Calon Karyawan</a>
                        </li>
                        <li>
                            <a href="index.php?page=data_penilaian"><i class="notika-icon notika-edit"></i> Penilaian</a>
                        </li>
                        <li>
                            <a href="index.php?page=data_hasil"><i class="notika-icon notika-bar-chart"></i> Analisa</a>
                        </li>
                        <li>
                            <a href="data_laporan.php"><i class="notika-icon notika-form"></i> Laporan</a>
                        </li>
                        <li>
                            <a href="index.php?page=logout"><i class="notika-icon notika-back"></i> Logout</a>
                        </li>
                    <?php else : ?>
                        <li>
                            <a href="index.php"><i class="notika-icon notika-house"></i>Home</a>
                        </li>
                        <li>
                            <a href="index.php?page=data_penilaian"><i class="notika-icon notika-edit"></i> Penilaian</a>
                        </li>
                        <li>
                            <a href="index.php?page=logout"><i class="notika-icon notika-app"></i> Logout</a>
                        </li>
                    <?php endif; ?>
                </ul>

            </div>
        </div>
    </div>
</div>