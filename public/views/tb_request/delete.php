<?php
 include '../../../app/config/koneksi.php';

mysqli_query($koneksi, "DELETE FROM tb_request WHERE id_request = '$_GET[id]'") or die(mysqli_error($koneksi));
echo "<script>window.location='index.php';</script>";
