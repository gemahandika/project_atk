<?php
require_once "../config/koneksi.php";
if (isset($_POST['approve2'])) {
    $pic = trim(mysqli_real_escape_string($koneksi, $_POST['pic']));
    $proses = trim(mysqli_real_escape_string($koneksi, $_POST['proses']));
    $pesan = trim(mysqli_real_escape_string($koneksi, $_POST['pesan']));
    $pesanan2 = trim(mysqli_real_escape_string($koneksi, $_POST['pesanan2']));
    $pesanan1 = trim(mysqli_real_escape_string($koneksi, $_POST['pesanan1']));
    $ket = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    $kode1 = trim(mysqli_real_escape_string($koneksi, $_POST['kode1']));
    mysqli_query($koneksi, "UPDATE tb_request SET proses='$proses', keterangan='$ket'  WHERE kode='$kode1' AND pic='$pic'");
    mysqli_query($koneksi, "UPDATE user SET pesanan_1='$pesanan1', pesanan_2='$pesanan2' WHERE nama_user='$pic'");
    $kode = trim(mysqli_real_escape_string($koneksi, $_POST['kode']));
    mysqli_query($koneksi, "UPDATE tb_request SET kode='$kode'  WHERE keterangan='$ket'");
    echo "<script>alert('Data Berhasil Di Proses');window.location='../../public/views/tb_print/';</script>";
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama_barang = trim(mysqli_real_escape_string($koneksi, $_POST['nama_barang']));
    $jumlah = trim(mysqli_real_escape_string($koneksi, $_POST['jumlah']));
    mysqli_query($koneksi, "UPDATE tb_request SET nama_barang='$nama_barang', jumlah='$jumlah'  WHERE id_request='$id'");
    echo "<script>window.location='../../public/views/tb_pesanan/';</script>";
}
