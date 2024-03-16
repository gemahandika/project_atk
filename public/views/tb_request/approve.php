<?php
include_once '../../../header.php';
$date = date("Y-m-d");
$time = date("H:i");
$chk = $_POST['checked'];
if (!isset($chk)) {
    echo "<script>alert('Silahkan Pilih Data Terlebih Dahulu'); window.location='index.php';</script>";
} else {
?>
    <div class="content-table">
        <h6></i> Detail Belanja ATK</h6>
        <h5></h5>
        <div class="card">
            <div class="card-body">
                <form action="../../../app/controller/Request.php" method="post">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA BARANG</th>
                                <th>JUMLAH </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $j = 100000;
                            $no = 0;
                            foreach ($chk as $id) {
                                $sql_resi = mysqli_query($koneksi, "SELECT * FROM tb_request WHERE id_request = '$id'") or die(mysqli_error($koneksi));
                                while ($data = mysqli_fetch_array($sql_resi)) {
                                    $no++; ?>
                                    <tr>
                                        <input type="hidden" name="id[]" value="<?= $data['id_request'] ?>">
                                        <input type="hidden" name="tgl_request[]" value="<?= $data['tgl_request'] ?>">
                                        <input type="hidden" name="pic[]" value="<?= $data['pic']  ?>">
                                        <input type="hidden" name="cabang[]" value="<?= $data['cabang'] ?>">
                                        <input type="hidden" name="unit[]" value="<?= $data['unit'] ?>">
                                        <input type="hidden" name="nama_barang[]" value="<?= $data['nama_barang'] ?>">
                                        <input type="hidden" name="jumlah[]" value="<?= $data['jumlah'] ?>">
                                        <input type="hidden" name="pesan" value="YA">
                                        <input type="hidden" name="keterangan" value="Dipesan ke tim GA">
                                        <input type="hidden" name="pesanan" value="YES">
                                        <input type="hidden" name="kode" value="2">
                                        <td><?= $no; ?></td>
                                        <td><?= $data['nama_barang'] ?></td>
                                        <td><?= number_format($data['jumlah']) ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                            <div>
                                <input type="submit" name="approve" value="Approve" class="btn btn-success">
                            </div>
                    </table>
                </form>
            </div>
        </div>
    </div>

<?php
    include_once '../../../footer.php';
}
?>