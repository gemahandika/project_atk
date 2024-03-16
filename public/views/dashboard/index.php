<?php
include '../../../header.php';
include '../../../app/config/koneksi.php';
include '../../../app/models/Dashboard_models1.php';
$date = date("Y-m-d");
$time = date("H:i:s");
?>

<div class="content-dashboard">
    <div class="form">
        <?php if (in_array("user", $_SESSION['admin_akses'])) { ?>
            <div class="container-card" id='masuk'>
                <h6>LIST PESANAN</h6>
                <a href="../tb_cek/">
                    <h5><?= $jlh_pic_pesan ?></h5>
                </a>
            </div>
            <div class="container-card" id='dikirim'>
                <h6>PESANAN DITERIMA</h6>
                <a href="../tb_report/">
                    <h5><?= $data_report ?></h5>
                </a>
            </div>
        <?php } ?>
        <?php if (in_array("admin", $_SESSION['admin_akses']) || in_array("super_admin", $_SESSION['admin_akses'])) { ?>
            <div class="container-card" id='masuk'>
                <h6>PESANAN MASUK 2</h6>
                <a href="../tb_pesanan/">
                    <h5><?= $jlh_masuk ?></h5>
                </a>
            </div>
            <div class="container-card" id='approve'>
                <h6>PESANAN APPROVE</h6>
                <a href="../tb_print/">
                    <h6><?= $jlh_approve ?></h6>
                </a>
            </div>
            <div class="container-card" id='dikirim'>
                <h6>PESANAN DIKIRIM</h6>
                <a href="../tb_print/">
                    <h6><?= $jumlah_data3 ?></h6>
                </a>
            </div>
            <div class="container-card" id='diterima'>
                <h6>PESANAN DITERIMA</h6>
                <a href="../tb_report/index_admin.php">
                    <h6><?= $report_admin ?></h6>
                </a>
            </div>
        <?php } ?>
        <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
            <div class="container-card" id='anggota'>
                <h6>ANGGOTA</h6>
                <a href="../tb_request/">
                    <h6><?= $jlh_user ?></h6>
                </a>
            </div>
        <?php } ?>
    </div>
</div>




<?php
include '../../../footer.php';
?>