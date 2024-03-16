<?php
 include '../../../app/config/koneksi.php';

mysqli_query($koneksi, "DELETE FROM tb_barang WHERE id_barang = '$_GET[id]'") or die(mysqli_error($con));
echo "<script>window.location='index.php';</script>";