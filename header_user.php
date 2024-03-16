<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("location:../login/index.php");
}
 include '../../../App/config/koneksi.php';
 include '../../../App/Models/Dashboard_models1.php';
 $date = date("Y-m-d");
 $time = date("H:i:s");
 $user1 = $_SESSION['admin_username'];
$sql= mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user1'") or die(mysqli_error($koneksi));
$data1 = $sql->fetch_array();
$data2 = $data1["nip"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi</title>
    <link rel="shortcut icon" href="../../../App/assets/img/JNE.png">
    <link rel="stylesheet" href="../../../App/assets/fontawesome/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Rubik:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../App/assets/css/style_user.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src=https://code.jquery.com/jquery-3.5.1.js></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src=https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>
<body>

    <?php
        $sql= mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE nip = '$data2' AND jenis_transaksi ='pemasukan'") or die(mysqli_error($koneksi));
        $total_pemasukan=0;
        $result = array();
        while ($data = mysqli_fetch_array($sql)) {
            $total_pemasukan += $data['nominal_transaksi'];
            $result[] = $data;
        }
        $sql= mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE nip = '$data2' AND jenis_transaksi ='pengeluaran' ") or die(mysqli_error($koneksi));
        $total_pengeluaran=0;
        $result = array();
        while ($data = mysqli_fetch_array($sql)) {
            $total_pengeluaran += $data['nominal_transaksi'];
            $result[] = $data;
        }
        $saldo_user = $total_pemasukan-$total_pengeluaran;
    ?>
<div class="content-label">
    <div class="form">
        <div class="label-profile">
            <h2><img class="photo" src="../../../App/assets/img/LOGO1.png" alt="profile">E - Koperasi </h2>
            <!-- <span class="logo_name">Hallo.. <?= $data2?> </span> -->
            <!-- <a href="../login/logout.php"> Logout</a> -->
        </div>
    </div>
    
    