<?php
include '../../../header.php';
include '../../../app/config/koneksi.php';
//  include 'modal.php';
$date = date("Y-m-d");
$time = date("H:i");
$waktu = @$_GET['time'];
$nama = $data1['nama_user'];
$id_photo = @$_GET['id_photo'];
?>

<div class="content-table">
    <h6> Barang Atk Diterima</h6>
    <div class="card">
        <div class="card-body">
            <form action="../../../app/controller/Terima.php" method="post">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>TANGGAL</th>
                            <th>NAMA BARANG</th>
                            <th>JUMLAH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $no = 0;
                        $sql = mysqli_query($koneksi, "SELECT * FROM tb_request WHERE time='$waktu' AND pic='$nama' ") or die(mysqli_error($koneksi));
                        $result = array();
                        while ($data = mysqli_fetch_array($sql)) {
                            $result[] = $data;
                        }
                        foreach ($result as $data) {
                            $no++;
                        ?>
                            <tr>
                                <input type="hidden" name="id_photo" value="<?= $id_photo ?>">
                                <input type="hidden" name="id2[]" value="<?= $data['id_request'] ?>">
                                <input type="hidden" name="tgl_terima[]" value="<?= $date; ?>">
                                <input type="hidden" name="time_report[]" value="<?= $time; ?>">
                                <input type="hidden" name="pic[]" value="<?= $data['pic'] ?>">
                                <input type="hidden" id="nama_barang" name="barang[]" value="<?= $data['nama_barang'] ?>" readonly>
                                <input type="hidden" id="jumlah" name="jumlah[]" value="<?= $data['jumlah'] ?>">
                                <input type="hidden" name="tgl_pesan[]" value="<?= $data['tgl_request'] ?>">
                                <input type="hidden" name="status[]" value="Diterima">
                                <input type="hidden" name="status_photo" value="approve">
                                <td><?= $no ?></td>
                                <td><?= $data['tgl_request'] ?></td>
                                <td><?= $data['nama_barang'] ?></td>
                                <td><?= $data['jumlah'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <div class="mb-4">
                        <input type="submit" name="approve" value="Approve" class="btn btn-success">
                    </div>
                </table>
            </form>
        </div>
    </div>
</div>
<?php
include '../../../footer.php';
?>