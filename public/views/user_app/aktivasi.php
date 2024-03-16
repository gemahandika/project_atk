<?php
include '../../../header.php';
if (!in_array("super_admin", $_SESSION['admin_akses']) && !in_array("admin", $_SESSION['admin_akses'])) {
    echo "Ooopss!! Kamu Tidak Punya Akses";
    exit();
}
include '../../../app/config/koneksi.php';
$date = date("Y-m-d");
$time = date("H:i");
?>

<div class="content-table">
    <h6>Data User Non Aktif</h6>
    <h5></h5>
    <table id="example3" class="display nowrap" style="width:100%">
        <thead>
            <tr class="aktivasi">
                <th>NO</th>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                <th>NAMA USER</th>
                <th>STATUS</th>
                <th>AKSES</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE STATUS = 'NON AKTIF'  ORDER BY LOGIN_ID DESC") or die(mysqli_error($koneksi));
            $result = array();
            while ($data = mysqli_fetch_array($sql)) {
                $result[] = $data;
            }
            foreach ($result as $data) {
                $no++;
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $data['username'] ?></td>
                    <td><?= $data['password'] ?></td>
                    <td><?= $data['nama_user'] ?></td>
                    <td><?= $data['status'] ?></td>
                    <td>
                        <!-- <a href="aktivasi_user.php?id=<?= $data['login_id'] ?>" class="action btn btn-warning">Create Hak Akses</a> -->
                        <a href="#" class="action btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['login_id'] ?>">Aktifkan User</a>
                    </td>
                </tr>
                <!-- Modal Aktivasi User -->
                <div class="modal fade" id="editModal<?= $data['login_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="../../../app/controller/User_app.php" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Aktifkan User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="report-it">
                                        <input type="hidden" name="id" value="<?= $data['login_id'] ?>">
                                        <input type="hidden" name="password" value="<?= $data['password'] ?>">
                                        <h6>Apakah Anda ingin mengaktifkan user atas nama <b> <?= $data['nama_user'] ?> ?</b></h6>
                                        <input class="dept-1" name="role" type="hidden" value="user" readonly>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <input type="submit" name="aktif_user" class="btn btn-success" value="Aktifkan">
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