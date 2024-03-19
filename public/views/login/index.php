<?php
session_start();

// Jika sudah login, redirect ke halaman index
if (isset($_SESSION['admin_username'])) {
    header("location:../index.php");
    exit();
}

include '../../../app/config/koneksi.php';

$username = "";
$password = "";
$err = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input kosong
    if (empty($username) || empty($password)) {
        $err = "Silahkan Masukan Username dan Password";
    } else {
        // Query untuk mendapatkan user berdasarkan username
        $sql1 = "SELECT * FROM user WHERE username = ?";
        $stmt1 = mysqli_prepare($koneksi, $sql1);

        if ($stmt1) {
            mysqli_stmt_bind_param($stmt1, "s", $username);
            mysqli_stmt_execute($stmt1);

            $result1 = mysqli_stmt_get_result($stmt1);

            // Validasi akun ditemukan dan password sesuai
            if ($result1->num_rows === 0) {
                $err = "Akun Tidak ditemukan";
            } else {
                $row = $result1->fetch_assoc();

                // Periksa password menggunakan md5
                if ($row['password'] !== md5($password)) {
                    $err = "Password Salah";
                } else {
                    // Query untuk mendapatkan akses user
                    $login_id = $row['login_id'];
                    $sql2 = "SELECT akses_id FROM admin_akses WHERE login_id = ?";
                    $stmt2 = mysqli_prepare($koneksi, $sql2);

                    if ($stmt2) {
                        mysqli_stmt_bind_param($stmt2, "s", $login_id);
                        mysqli_stmt_execute($stmt2);

                        $result2 = mysqli_stmt_get_result($stmt2);

                        $akses = [];
                        while ($row2 = $result2->fetch_assoc()) {
                            $akses[] = $row2['akses_id'];
                        }

                        // Validasi akses tidak kosong
                        if (empty($akses)) {
                            $err = "Kamu Tidak Punya Akses";
                        } else {
                            // Set session dan redirect
                            $_SESSION['admin_username'] = $username;
                            $_SESSION['admin_akses'] = $akses;
                            header("location:../index.php");
                            exit();
                        }
                    } else {
                        $err = "Kesalahan pada prepared statement 2";
                    }
                }
            }
        } else {
            $err = "Kesalahan pada prepared statement 1";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="../../../App/assets/img/JNE.png">
    <link rel="stylesheet" href="../../../app/assets/css/style_login.css">
    <link rel="stylesheet" href="../../../app/assets/fontawesome/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Rubik:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="container-content">
                <div class="logo">
                    <!-- <img class="photo" src="../../../app/assets/img/logo1.png" alt="profile"> -->
                    <h2></h2>
                </div>
                <div class="label-judul">
                    <img class="photo" src="../../../app/assets/img/atk_jne2.png" alt="profile">
                </div>
                <div class="pesan">
                    <?php
                    if ($err) {
                        echo "<h5>$err</h5>";
                    }
                    ?>
                </div>
                <div class="label-form">
                    <label>Username 3</label><br>
                    <input class="input" value="<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?>" type="text" name="username" id="report" onkeyup="myFunction()">
                </div>
                <div class="label-form">
                    <label>Password</label><br>
                    <input class="input" type="password" name="password">
                </div>
                <input type="submit" name="login" class="tombol_login" value="LOGIN">
            </div>
        </form>
    </div>
    <script src="../../../app/assets/js/script.js"></script>
</body>

</html>