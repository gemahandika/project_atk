<?php
 include '../../../header.php';
 include '../../../app/config/koneksi.php';
 if (!in_array("ADMIN", $_SESSION['admin_akses'])) {
    echo "Ooopss!! Kamu Tidak Punya Akses";
    exit();
}
 $date = date("Y-m-d");
 $time = date("H:i:s");
?>

<div class="content-dashboard">
    <div class="dasboard-label">
        <h3>Create Data User App</h3>
    </div>
    <form action="../../../app/controller/User_app.php" method="post">
        <div class="report-it">
            <div class="label-1">
                <label for="user_id">User ID :</label><br>
                <input type="text" id="report" name="user_id" required onkeyup="myFunction()">
            </div>
            <div class="label-1">
                <label for="password">Password :</label><br>
                <input type="text" id="report1" name="password" required onkeyup="myFunction()">
            </div>
            <div class="label-1">
                <label for="fullname">Fullname :</label><br>
                <input type="text" id="report2" name="fullname" required onkeyup="myFunction()">
            </div>
            <input type="hidden" id="status" name="status" value="NON AKTIF" readonly>
           
        </div>
        <div class="tombol">
            <input type="submit" name="add" class="tombol__simpan" value="SIMPAN">
        </div>
    </form>
</div>
<?php
 include '../../../footer.php';
?>