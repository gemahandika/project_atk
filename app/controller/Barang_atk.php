<?php
require_once "../config/koneksi.php";
if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $kode_barang = trim(mysqli_real_escape_string($koneksi, $_POST['kode_barang']));
    $nama_barang = trim(mysqli_real_escape_string($koneksi, $_POST['nama_barang']));
    $stok = trim(mysqli_real_escape_string($koneksi, $_POST['stok']));
    $satuan = trim(mysqli_real_escape_string($koneksi, $_POST['satuan']));
    $status_barang = trim(mysqli_real_escape_string($koneksi, $_POST['status_barang']));
    mysqli_query($koneksi, "INSERT INTO tb_barang (id_barang, kode_barang, nama_barang, satuan, stok_barang, status_barang) 
    VALUES('$id', '$kode_barang', '$nama_barang', '$satuan', '$stok', '$status_barang')");
    echo "<script>window.location='../../public/views/tb_barang/';</script>";
    
}else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $kode_barang = trim(mysqli_real_escape_string($koneksi, $_POST['kode_barang']));
    $nama_barang = trim(mysqli_real_escape_string($koneksi, $_POST['nama_barang']));
    $satuan = trim(mysqli_real_escape_string($koneksi, $_POST['satuan']));
    $status_barang = trim(mysqli_real_escape_string($koneksi, $_POST['status_barang']));
    mysqli_query($koneksi, "UPDATE tb_barang SET kode_barang='$kode_barang', nama_barang='$nama_barang', satuan='$satuan', status_barang='$status_barang'
    WHERE id_barang='$id'");
    echo "<script>window.location='../../public/views/tb_barang/';</script>";

}else if (isset($_POST['tambah_stok'])) {
    $id = $_POST['id'];
    $stok = trim(mysqli_real_escape_string($koneksi, $_POST['stok']));
    $stok_lama = trim(mysqli_real_escape_string($koneksi, $_POST['stok_lama']));
    $stok_baru = $stok_lama + $stok;
    mysqli_query($koneksi, "UPDATE tb_barang SET stok_barang='$stok_baru' WHERE id_barang='$id'");
    echo "<script>window.location='../../public/views/tb_barang/';</script>";
}