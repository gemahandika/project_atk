<?php
include '../../../header.php';
include '../../../app/models/Dashboard_models1.php';
include '../../../app/config/koneksi.php';
$date = date("Y-m-d");
$time = date("H:i");
?>
<div class="content-table">
    <h6>- History Pesanan -</h6>
    <h5></h5>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="example3">
                <thead>
                    <tr class="masuk">
                        <th>TANGGAL</th>
                        <th>NAMA BARANG</th>
                        <th>JUMLAH </th>
                        <th>PESAN </th>
                        <th>DIPROSES </th>
                        <th>DIKIRIM </th>
                        <th>KETERANGAN </th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_request WHERE pesan='YA' AND pic='$pic' ORDER BY id_request DESC") or die(mysqli_error($koneksi));
                    $result = array();
                    while ($data = mysqli_fetch_array($sql)) {
                        $result[] = $data;
                    }
                    foreach ($result as $data) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $data['tgl_request'] ?></td>
                            <td><?= $data['nama_barang'] ?></td>
                            <td><?= number_format($data['jumlah']) ?></td>
                            <td><?= $data['pesan'] ?></td>
                            <td><?= $data['proses'] ?></td>
                            <td><?= $data['kirim'] ?></td>
                            <td><?= $data['keterangan'] ?></td>
                        </tr>
                    <?php } ?>
            </table>
        </div>
    </div>

    <?php include '../../../footer.php'; ?>