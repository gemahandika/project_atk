
<?php
// setting default timezone
date_default_timezone_set('Asia/Jakarta');


// koneksi database
// $koneksi = mysqli_connect('localhost', 'root', '', 'db_atk');
$koneksi = mysqli_connect('localhost', 'u568977811_atk', 'Piss1994@', 'u568977811_db_atk');
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}
