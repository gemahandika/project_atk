<?php
include '../../../header.php';
include '../../../app/config/koneksi.php';
if (!in_array("super_admin", $_SESSION['admin_akses']) && !in_array("admin", $_SESSION['admin_akses'])) {
    echo "Ooopss!! Kamu Tidak Punya Akses";
    exit();
}
include 'modal.php';
$date = date("Y-m-d");
$time = date("H:i");
?>

<div class="content-table">
    <h6>- Data yang akan di kirim ke pickup -</h6>
    <h5></h5>
    <table id="example1" class="display nowrap" style="width:100%">
        <thead>
            <tr class="masuk">
                <th>N0</th>
                <th>NAMA PIC</th>
                <th>PESANAN</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE pesanan_2='YES' ORDER BY nama_user DESC") or die(mysqli_error($koneksi));
            $result = array();
            while ($data = mysqli_fetch_array($sql)) {
                $result[] = $data;
            }
            foreach ($result as $data) {
                $no++;
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $data['nama_user'] ?></td>
                    <td><?= $data['pesanan_2'] ?></td>
                    <td>
                        <a href="export.php?nama_user=<?= $data['nama_user'] ?>" target="_blank" class="action btn btn-success">Print</a>
                        <a href="#" class="action btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['login_id'] ?>">Kirim Pickup</a>
                    </td>
                </tr>
                <!-- Modal Approve -->
                <div class="modal fade" id="editModal<?= $data['login_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="../../../app/controller/Print.php" method="post" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Kirim ATK ke Pickup </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="report-it">
                                        <div class="label-1">
                                            <h6>Apakah Ingin mengirim ATK <b><?= $data['nama_user'] ?></b> ke Tim Pickup ?<h6>
                                        </div>
                                        <div class="label-1">
                                            <h6>Upload Photo : </h6>
                                            <input class="add-poto" type="file" name="file" required>
                                        </div>
                                        <input type="hidden" name="proses" value="YA">
                                        <input type="hidden" id="nama_user" name="nama_user" value="<?= $data['nama_user'] ?>">
                                        <input type="hidden" name="pesanan3" value="YES">
                                        <input type="hidden" name="pesanan2" value="NO">
                                        <input type="hidden" name="keterangan" value="Dikirim ke tim pickup">
                                        <input type="hidden" name="kode4" value="4">
                                        <input type="hidden" name="kode3" value="3">
                                        <input type="hidden" name="time" value="<?= $time ?>">
                                        <input type="hidden" name="date" value="<?= $date ?>">
                                        <input type="hidden" name="status_photo" value="unapprove">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <input type="submit" name="kirim" class="btn btn-success" value="Kirim">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>
    </table>

    <div class="form-approve">
        <h6>- List Pesanan yang Dikirim ke Pickup -</h6>
    </div>
    <div class="pengeluaran">
        <table id="example3" class="display nowrap" style="width:100%">
            <thead>
                <tr class="keluar">
                    <th>N0</th>
                    <th>NAMA PIC</th>
                    <th>TANGGAL</th>
                    <th>PHOTO</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_photo ORDER BY date DESC") or die(mysqli_error($koneksi));
                $result = array();
                while ($data = mysqli_fetch_array($sql)) {
                    $result[] = $data;
                }
                foreach ($result as $data) {
                    $no++;

                    $gambar = $data['photo'];
                    if ($gambar == null) {
                        $img = 'No Photo';
                    } else {
                        $img1 = '<img src="../../../app/assets/img/uploads/' . $gambar . '" class="zoomable" style="width: 400px; height: 400px; padding-left: 50px;">';
                        $img = '<img src="../../../app/assets/img/uploads/' . $gambar . '" class="zoomable">';
                    }
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $data['nama_photo'] ?></td>
                        <td><?= $data['date'] ?></td>
                        <td><a href="#" class="action btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_photo'] ?>">Cek Photo</a></td>
                    </tr>
                    <!-- Modal Approve -->
                    <div class="modal fade" id="editModal<?= $data['id_photo'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="../../../app/controller/Print.php" method="post" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header btn btn-dark">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel"> Detail Kiriman </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <?php
                                    $waktu = $data['time'];
                                    $sql1 = mysqli_query($koneksi, "SELECT * FROM tb_request WHERE time='$waktu'") or die(mysqli_error($koneksi));
                                    $data3 = mysqli_fetch_array($sql1);
                                    ?>
                                    <div class="modal-body">
                                        <div class="report-it">
                                            <div class="label-1">
                                                <h1><?= $img1 ?></h1>
                                            </div>
                                            <!-- <div class="label-1">
                                                <h6><?= $data3['nama_barang'] ?></h6>
                                            </div> -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <!--<input type="submit" name="kirim" class="btn btn-success" value="Kirim">-->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php } ?>
        </table>
    </div>


</div>


<?php
include '../../../footer.php';
?>