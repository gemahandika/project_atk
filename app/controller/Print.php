<?php
require_once "../config/koneksi.php";

$allowed_extension = array('png', 'jpg', 'jpeg');
$nama = $_FILES['file']['name'];
$dot = explode('.', $nama);
$ekstensi = strtolower(end($dot));
$ukuran = $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];
$image = md5(uniqid($nama, true) . time()) . '.' . $ekstensi;
if (in_array($ekstensi, $allowed_extension) === true) {
    if ($ukuran < 15000000) {
        move_uploaded_file($file_tmp, '../assets/img/uploads/' . $image);
    } else {
        echo '<script> alert("Ukuran Terlalu Besar") <script>';
    }
} else {
    echo '<script> alert("File Harus png") <script>';
}

if (isset($_POST['kirim'])) {
    $nama_user = trim(mysqli_real_escape_string($koneksi, $_POST['nama_user']));
    $proses = trim(mysqli_real_escape_string($koneksi, $_POST['proses']));
    $pesanan2 = trim(mysqli_real_escape_string($koneksi, $_POST['pesanan2']));
    $pesanan3 = trim(mysqli_real_escape_string($koneksi, $_POST['pesanan3']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    $kode3 = trim(mysqli_real_escape_string($koneksi, $_POST['kode3']));
    $kode4 = trim(mysqli_real_escape_string($koneksi, $_POST['kode4']));
    $time = trim(mysqli_real_escape_string($koneksi, $_POST['time']));
    mysqli_query($koneksi, "UPDATE tb_request SET kirim='$proses', keterangan='$keterangan', time='$time' WHERE kode='$kode3' AND pic='$nama_user'");
    mysqli_query($koneksi, "UPDATE tb_request SET kode='$kode4' WHERE kirim='$proses' AND pic='$nama_user'");
    mysqli_query($koneksi, "UPDATE user SET pesanan_3='$pesanan3', pesanan_2='$pesanan2', pesanan_1='$pesanan2' WHERE nama_user='$nama_user'");

    $id = $_POST['id'];
    $date = trim(mysqli_real_escape_string($koneksi, $_POST['date']));
    $file = trim(mysqli_real_escape_string($koneksi, $_POST['file']));
    $status_photo = trim(mysqli_real_escape_string($koneksi, $_POST['status_photo']));

    mysqli_query($koneksi, "INSERT INTO tb_photo (id_photo, nama_photo, date, time, photo, status) 
    VALUES('$id', '$nama_user', '$date', '$time', '$image', '$status_photo')");


    echo "<script>window.location='../../public/views/tb_print/';</script>";
}
