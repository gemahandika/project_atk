<?php
// setting default timezone
date_default_timezone_set('Asia/Jakarta');


// koneksi database
$koneksi = mysqli_connect('localhost', 'root', '', 'db_toko');
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
}
