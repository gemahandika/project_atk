<?php
require_once "../config/koneksi.php";
if (isset($_POST['approve'])) {
    for ($i = 0; $i < count($_POST['id2']); $i++) {
        $id = trim(mysqli_real_escape_string($koneksi, $_POST['id'][$i]));
        $id2 = trim(mysqli_real_escape_string($koneksi, $_POST['id2'][$i]));
        $tgl_terima = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_terima'][$i]));
        $time_report = trim(mysqli_real_escape_string($koneksi, $_POST['time_report'][$i]));
        $pic = trim(mysqli_real_escape_string($koneksi, $_POST['pic'][$i]));
        $barang = trim(mysqli_real_escape_string($koneksi, $_POST['barang'][$i]));
        $jumlah = trim(mysqli_real_escape_string($koneksi, $_POST['jumlah'][$i]));
        $tgl_pesan = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_pesan'][$i]));
        $status = trim(mysqli_real_escape_string($koneksi, $_POST['status'][$i]));
        mysqli_query($koneksi, "INSERT INTO tb_report (id_report, tgl_terima, time_report, pic, barang, jumlah, tgl_pesan, status) 
        VALUES('$id', '$tgl_terima', '$time_report', '$pic', '$barang', '$jumlah','$tgl_pesan','$status')");
        mysqli_query($koneksi, "DELETE FROM tb_request WHERE id_request = '$id2'") or die(mysqli_error($koneksi));
    }
    $status_photo = trim(mysqli_real_escape_string($koneksi, $_POST['status_photo']));
    $id_photo = trim(mysqli_real_escape_string($koneksi, $_POST['id_photo']));
    mysqli_query($koneksi, "UPDATE tb_photo SET status='$status_photo' WHERE id_photo='$id_photo'");
    echo "<script>alert('Data Berhasil Di Terima');window.location='../../public/views/tb_terima/';</script>";
}
