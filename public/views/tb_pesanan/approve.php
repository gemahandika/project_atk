<?php
include_once '../../../header.php';
$date = date("Y-m-d");
$time = date("H:i");
?>

<?php
$nama = @$_GET['nama_user'];
?>
<div class="content-table">
    <h6> Data Yang Akan Di proses</h6>
    <h5></h5>
    <div class="content-approve">
        <form action="../../../app/controller/Pesanan.php" method="post">
            <div class="approve-iuran">
                <input type="submit" name="approve2" value="Approve" class="btn btn-success">
            </div>
            <table id="example4" class="display nowrap" style="width:100%" cellspacing="0">
                <thead>
                    <tr class="produk">
                        <th>NO</th>
                        <th>NAMA PIC </th>
                        <th>NAMA BARANG</th>
                        <th>JUMLAH </th>
                        <th>ACTION </th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_request WHERE pic='$nama' AND keterangan='Dipesan ke tim GA'") or die(mysqli_error($koneksi));
                    $result = array();
                    while ($data = mysqli_fetch_array($sql)) {
                        $result[] = $data;
                    }
                    foreach ($result as $data) {
                        $no++;
                    ?>
                        <tr>
                            <!--<input type="hidden" name="tgl_request[]" value="<?= $data['tgl_request'] ?>"> -->
                            <input type="hidden" name="pic" value="<?= $data['pic'] ?>">
                            <input type="hidden" name="keterangan" value="Sudah di Proses Tim GA">
                            <input type="hidden" name="proses" value="YA">
                            <input type="hidden" name="pesan" value="<?= $data['pesan'] ?>">
                            <input type="hidden" name="pesanan1" value="NO">
                            <input type="hidden" name="pesanan2" value="YES">
                            <input type="hidden" name="kode" value="3">
                            <input type="hidden" name="kode1" value="<?= $data['kode'] ?>">

                            <td><?= $no; ?></td>
                            <td><?= $data['pic'] ?></td>
                            <td><?= $data['nama_barang'] ?></td>
                            <td><?= number_format($data['jumlah']) ?></td>
                            <td><a href="#" class="action btn btn-danger" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_request'] ?>">Edit</a></td>
                        </tr>


                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal<?= $data['id_request'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="../../../app/controller/Pesanan.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-header btn btn-dark">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel"> Detail Kiriman </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="report-it">
                                                <input type="hidden" name="id" value="<?= $data['id_request'] ?>">
                                                <div class="label-1">
                                                    <label for="nama_barang">Nama Barang :</label><br>
                                                    <input type="text" id="nama_barang" name="nama_barang" value="<?= $data['nama_barang'] ?>" readonly>
                                                </div>
                                                <div class="label-1">
                                                    <label for="jumlah">Jumlah :</label><br>
                                                    <input type="text" id="jumlah" name="jumlah" value="<?= $data['jumlah'] ?>" onkeypress="return inputAngka(event)">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <input type="submit" name="edit" class="btn btn-success" value="Kirim">
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>

            </table>
        </form>
    </div>
</div>

<?php
include_once '../../../footer.php';
?>