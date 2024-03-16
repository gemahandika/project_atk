<?php

$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user1'") or die(mysqli_error($koneksi));
$data1 = $sql->fetch_array();
$pic = $data1['nama_user'];

$sql3 = mysqli_query($koneksi, "SELECT * FROM user WHERE status='user' ") or die(mysqli_error($koneksi));
$user = mysqli_fetch_array($sql3);
$jlh_user = mysqli_num_rows($sql3);


$sql1 = mysqli_query($koneksi, "SELECT * FROM tb_request WHERE pic='$pic' ") or die(mysqli_error($koneksi));
$jumlah_data3 = mysqli_num_rows($sql1);

// tb report
$sql_report = mysqli_query($koneksi, "SELECT * FROM tb_report WHERE pic='$pic' ") or die(mysqli_error($koneksi));
$data_report = mysqli_num_rows($sql_report);
$sql_report1 = mysqli_query($koneksi, "SELECT * FROM tb_report") or die(mysqli_error($koneksi));
$report_admin = mysqli_num_rows($sql_report1);

$pic_pesan = mysqli_query($koneksi, "SELECT * FROM tb_request WHERE pic='$pic' AND pesan='YA' ") or die(mysqli_error($koneksi));
$jlh_pic_pesan = mysqli_num_rows($pic_pesan);
$masuk = mysqli_query($koneksi, "SELECT * FROM user WHERE pesanan_1='YES' ") or die(mysqli_error($koneksi));
$jlh_masuk = mysqli_num_rows($masuk);
$approve = mysqli_query($koneksi, "SELECT * FROM user WHERE pesanan_2='YES' ") or die(mysqli_error($koneksi));
$jlh_approve = mysqli_num_rows($approve);
