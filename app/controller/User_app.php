<?php
require_once "../config/koneksi.php";

if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $nip = trim(mysqli_real_escape_string($koneksi, $_POST['nip']));
    $username = trim(mysqli_real_escape_string($koneksi, $_POST['username']));
    $password = trim(mysqli_real_escape_string($koneksi, $_POST['password']));
    $fullname = trim(mysqli_real_escape_string($koneksi, $_POST['fullname']));
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $unit = trim(mysqli_real_escape_string($koneksi, $_POST['unit']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));
    mysqli_query($koneksi, "INSERT INTO user (login_id, nip, nama_user, cabang, unit, username, password, status) 
    VALUES('$id', '$nip', '$fullname', '$cabang', '$unit', '$username', MD5('$password'), '$status')");
    echo "<script>window.location='../../public/views/user_app/aktivasi.php';</script>";
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nip = trim(mysqli_real_escape_string($koneksi, $_POST['nip']));
    $username = trim(mysqli_real_escape_string($koneksi, $_POST['username']));
    $nama_user = trim(mysqli_real_escape_string($koneksi, $_POST['nama_user']));
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $unit = trim(mysqli_real_escape_string($koneksi, $_POST['unit']));
    mysqli_query($koneksi, "UPDATE user SET nip='$nip', username='$username', nama_user='$nama_user', cabang='$cabang', unit='$unit' 
    WHERE login_id='$id'");
    echo "<script>window.location='../../public/views/user_app/';</script>";
} else if (isset($_POST['aktif_user'])) {
    $id = $_POST['id'];
    $password = $_POST['password'];
    $status = $_POST['role'];
    mysqli_query($koneksi, "UPDATE user SET password='$password', status='$status' 
    WHERE login_id='$id'");
    $id = trim(mysqli_real_escape_string($koneksi, $_POST['id']));
    $akses = trim(mysqli_real_escape_string($koneksi, $_POST['role']));
    mysqli_query($koneksi, "INSERT INTO admin_akses (login_id, akses_id) VALUES('$id', '$akses')");
    echo "<script>window.location='../../public/views/user_app/aktivasi.php';</script>";
} else if (isset($_POST['nonaktif_user'])) {
    $id = $_POST['id'];
    $password = $_POST['password'];
    $status = $_POST['role'];
    mysqli_query($koneksi, "UPDATE user SET password='$password', status='$status' 
    WHERE login_id='$id'");
    $sql = mysqli_query($koneksi, "DELETE FROM admin_akses WHERE login_id = '$id'") or die(mysqli_error($koneksi));
    echo "<script>window.location='../../public/views/user_app/aktivasi.php';</script>";
} else if (isset($_POST['reset'])) {
    $id = $_POST['id'];
    $password = $_POST['password'];
    mysqli_query($koneksi, "UPDATE user SET password=MD5('$password') WHERE login_id='$id'");
    echo "<script>window.location='../../public/views/user_app/';</script>";
}
