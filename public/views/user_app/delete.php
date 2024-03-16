<?php
include '../../../header.php';
if (!in_array("ADMIN", $_SESSION['admin_akses'])) {
    echo "Kamu tidak punya akses ";
    exit();
}

mysqli_query($koneksi, "DELETE FROM admin_akses WHERE login_id = '$_GET[id]'") or die(mysqli_error($con));
mysqli_query($koneksi, "DELETE FROM admin WHERE login_id = '$_GET[id]'") or die(mysqli_error($con));
echo "<script>window.location='index.php';</script>";

include_once('../footer.php');

