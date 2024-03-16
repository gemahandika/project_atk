<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("location:../login/index.php");
}
include 'app/config/koneksi.php';
$user1 = $_SESSION['admin_username'];
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user1'") or die(mysqli_error($koneksi));
$data1 = $sql->fetch_array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E - ATK</title>
    <link rel="shortcut icon" href="../../../app/assets/img/atk_jne.png">
    <link rel="stylesheet" href="../../../app/assets/fontawesome/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Rubik:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../app/assets/css/style.css">
    <link rel="stylesheet" href="../../../app/assets/css/style-export.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src=https://code.jquery.com/jquery-3.5.1.js></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src=https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>

    <div class="danger">
        <p><strong>Oopppssss!!</strong> Tidak Bisa di buka di Handphone</p>
        <a href="../login/logout.php">Log Out</a>
    </div>

    <div class="sidebar">
        <div class="logo-details">
            <span class="logo_name">E - ATK</span>
            <img class="photo" src="../../../app/assets/img/atk_jne2.png" alt="profile">
        </div>
        <div class="logo-details1">
            <img class="photo" src="../../../app/assets/img/User.png" alt="profile">
            <span class="logo_name">
                <h6><?= $user1 ?> </h6>
            </span>
        </div>
        <ul class="nav-link">
            <li>
                <a href="../dashboard/index.php">
                    <i class="fa-solid fa-house-chimney"></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Dasboard</a></li>
                </ul>
            </li>
            <?php if (in_array("user", $_SESSION['admin_akses'])) { ?>
                <li>
                    <a href="../tb_request/index.php">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="link_name">Request ATK</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="../tb_request/index.php">Request ATK</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../tb_terima/index.php">
                        <i class="fa-solid fa-bell"></i>
                        <span class="link_name">ATK Masuk</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="../tb_terima/index.php">ATK Masuk</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../tb_cek/index.php">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span class="link_name">Cek Pesanan ATK</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="../tb_cek/index.php">Cek Pesanan ATK</a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if (in_array("admin", $_SESSION['admin_akses']) || in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                <li>
                    <a href="../tb_pesanan/index.php">
                        <i class="fa-solid fa-bell"></i>
                        <span class="link_name">Pesanan Masuk</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="../tb_pesanan/index.php">Pesanan Masuk</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../tb_print/index.php">
                        <i class="fa-solid fa-print"></i>
                        <span class="link_name">Print</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="../tb_print/index.php">Print</a></li>
                    </ul>
                </li>
                <li>
                    <div class="icon-link">
                        <a href="../tb_barang/index.php">
                            <i class="fa-solid fa-database"></i>
                            <span class="link_name">Data Barang</span>
                        </a>
                        <i class="fa-solid fa-caret-down arrow"></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Data Barang</a></li>
                        <li><a href="../tb_barang/index.php">Stok Barang</a></li>
                        <!--<li><a href="../tb_barang/index_nonaktif.php">Report Barang</a></li>-->
                    </ul>
                </li>
                <!-- report admin -->
                <li>
                    <a href="../tb_report/index_admin.php">
                        <i class="fa-solid fa-flag"></i>
                        <span class="link_name">Report</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="../tb_request/index_admin.php">Report</a></li>
                    </ul>
                </li>
            <?php } ?>
            <!-- report user -->
            <?php if (in_array("user", $_SESSION['admin_akses'])) { ?>
                <li>
                    <a href="../tb_report/index.php">
                        <i class="fa-solid fa-flag"></i>
                        <span class="link_name">Report</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="../tb_request/index.php">Report</a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if (in_array("admin", $_SESSION['admin_akses']) || in_array("super_admin", $_SESSION['admin_akses'])) { ?>
                <li>
                    <div class="icon-link">
                        <a href="#">
                            <i class="fa-solid fa-gear"></i>
                            <span class="link_name">Setting</span>
                        </a>
                        <i class="fa-solid fa-caret-down arrow"></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Setting</a></li>
                        <li><a href="../user_app/index.php">User</a></li>
                    </ul>
                </li>
            <?php } ?>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="../../../app/assets/img/atk_jne.png" alt="profile">
                    </div>
                    <div class="name-job">
                        <div class="profile_name">IT Development </div>
                        <div class="job">JNE MES 2023</div>
                    </div>
                    <a href="../login/logout.php"><i class="fa-solid fa-right-from-bracket fa-rotate-180"></i></a>
                </div>
            </li>

        </ul>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class="fa-solid fa-bars"></i>
        </div>