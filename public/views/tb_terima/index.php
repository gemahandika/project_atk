<?php
include '../../../header.php';
include '../../../app/config/koneksi.php';
//  include 'modal.php';
$date = date("Y-m-d");
$time = date("H:i");
$nama = $data1['nama_user'];
?>

<div class="content-table">
    <h6> Barang Atk Diterima</h6>
    <h5></h5>
    <div class="pengeluaran">
        <form method="post" name="proses">
            <table id="example3" class="display nowrap" style="width:100%">
                <thead>
                    <tr class="keluar">
                        <th>N0</th>
                        <th>NAMA PIC</th>
                        <th>TANGGAL</th>
                        <th>JAM</th>
                        <th>PHOTO</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_photo WHERE nama_photo='$nama' AND status='unapprove' ORDER BY id_photo DESC") or die(mysqli_error($koneksi));
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
                            <td><?= $data['time'] ?></td>
                            <td><a href="#" class="action btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_photo'] ?>">Cek Photo</a></td>
                            <td>
                                <a href="detail_atk.php?time=<?= $data['time'] ?>&nama=<?= $data['nama_photo'] ?>&id_photo=<?= $data['id_photo'] ?>" class="action btn btn-warning">Cek List</a>
                            </td>
                        </tr>
        </form>
        <!-- Modal Photo -->
        <div class="modal fade" id="editModal<?= $data['id_photo'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="../../../app/controller/Print.php" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header btn btn-dark">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"> Detail Photo </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="report-it">
                                <div class="label-1">
                                    <h1><?= $img1 ?></h1>
                                </div>
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
    <?php
    include '../../../footer.php';
    ?>