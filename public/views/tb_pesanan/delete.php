<?php
include '../../../app/config/koneksi.php';
mysqli_query($koneksi, "DELETE FROM tb_pemasukan WHERE id_pemasukan = '$_GET[id]'") or die(mysqli_error($koneksi));
echo "<script>window.location='index.php';</script>";
