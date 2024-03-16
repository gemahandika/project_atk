<?php
include '../../../header.php';
if (!in_array("super_admin", $_SESSION['admin_akses']) && !in_array("admin", $_SESSION['admin_akses'])) {
    echo "Ooopss!! Kamu Tidak Punya Akses";
    exit();
}
include 'modal.php';
include '../../../app/config/koneksi.php';
$date = date("Y-m-d");
$time = date("H:i");
?>

<div class="content-table">
    <h6>Data User Aktif</h6>
    <h5></h5>
    <div class="form-action1"> <!-- Button trigger modal -->
        <?php if (in_array("super_admin", $_SESSION['admin_akses'])) { ?>
            <button type="button" class="btn btn-success fa-solid fa-add fa-1xl" data-bs-toggle="modal" data-bs-target="#exampleModal"> Create </button>
            <a href="export.php" target="_blank" type="button" class="btn btn-primary fa-1xl"> Download </a>
        <?php } ?>
        <a href="aktivasi.php" type="button" class="btn btn-danger fa-1xl"> Aktivasi </a>
    </div>
    <table id="example4" class="display nowrap" style="width:100%">
        <thead>
            <tr class="user">
                <th>ACTION</th>
                <th>CUST ID / NIK</th>
                <th>USERNAME</th>
                <th>NAMA USER</th>
                <th>CABANG</th>
                <th>UNIT</th>
                <th>ROLE</th>
                <th>AKSES</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            $sql = mysqli_query($koneksi, "SELECT * FROM user INNER JOIN admin_akses ON user.LOGIN_ID = admin_akses.LOGIN_ID  ORDER BY user.LOGIN_ID DESC") or die(mysqli_error($koneksi));
            $result = array();
            while ($data = mysqli_fetch_array($sql)) {
                $result[] = $data;
            }
            foreach ($result as $data) {
                $no++;
            ?>
                <tr>
                    <td>
                        <a href="#" class="action btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['login_id'] ?>">Edit</a>
                    </td>
                    <td><?= $data['nip'] ?></td>
                    <td><?= $data['username'] ?></td>
                    <td><?= $data['nama_user'] ?></td>
                    <td><?= $data['cabang'] ?></td>
                    <td><?= $data['unit'] ?></td>
                    <td><?= $data['status'] ?></td>
                    <td>
                        <a href="#" class="action btn btn-primary" data-bs-toggle="modal" data-bs-target="#aksesModal<?= $data['login_id'] ?>">Nonaktif User</a>
                        <a href="#" class="action btn btn-warning" data-bs-toggle="modal" data-bs-target="#resetModal<?= $data['login_id'] ?>">Reset</a>
                    </td>
                </tr>
                <!-- Modal Edit 111 -->
                <div class="modal fade" id="editModal<?= $data['login_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="../../../app/controller/User_app.php" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="report-it">
                                        <input type="hidden" name="id" value="<?= $data['login_id'] ?>" readonly>
                                        <div class="label-1">
                                            <label for="nip">Cust ID / NIK :</label><br>
                                            <input type="text" id="nip" name="nip" value="<?= $data['nip'] ?>" required>
                                        </div>
                                        <div class="label-1">
                                            <label for="username">Username :</label><br>
                                            <input type="text" id="username" name="username" value="<?= $data['username'] ?>" required>
                                        </div>
                                        <div class="label-1">
                                            <label for="nama_user">Nama User :</label><br>
                                            <input type="text" id="nama_user" name="nama_user" value="<?= $data['nama_user'] ?>" required>
                                        </div>
                                        <div class="label-1">
                                            <label for="cabang">Cabang :</label><br>
                                            <input type="text" id="cabang" name="cabang" value="<?= $data['cabang'] ?>" required>
                                        </div>
                                        <div class="label-1">
                                            <label for="unit">Unit :</label><br>
                                            <input type="text" id="unit" name="unit" value="<?= $data['unit'] ?>" required>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <input type="submit" name="edit" class="btn btn-success" value="Edit Data">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Modal NON AKtif 111 -->
                <div class="modal fade" id="aksesModal<?= $data['login_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="../../../app/controller/User_app.php" method="post">
                            <div class="modal-content">
                                <div class="modal-header btn btn-primary">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Non Aktif User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="report-it">

                                        <h6>Apakah Anda ingin menon-aktifkan user atas nama <b><?= $data['nama_user'] ?></b> ?</h6>

                                        <input type="hidden" name="id" value="<?= $data['login_id'] ?>" readonly>
                                        <input type="hidden" id="user_id" name="user_id" value="<?= $data['username'] ?>" readonly>
                                        <input type="hidden" id="password" name="password" value="123" readonly>
                                        <input class="dept-1" name="role" type="hidden" value="NON AKTIF" readonly>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <input type="submit" name="nonaktif_user" class="btn btn-primary" value="Non Aktif">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Modal NON AKtif 111 -->
                <div class="modal fade" id="resetModal<?= $data['login_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="../../../app/controller/User_app.php" method="post">
                            <div class="modal-content">
                                <div class="modal-header btn btn-dark">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reset Password</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="report-it">
                                        <h6>Apakah Anda ingin mereset password <b><?= $data['nama_user'] ?></b> ?</h6>
                                        <input type="hidden" name="id" value="<?= $data['login_id'] ?>" readonly>
                                        <input type="hidden" id="password" name="password" value="123" readonly>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <input type="submit" name="reset" class="btn btn-warning" value="Reset">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>
    </table>
</div>
<?php
include '../../../footer.php';
?>