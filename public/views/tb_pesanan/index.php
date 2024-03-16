<?php
include '../../../header.php';
include '../../../app/config/koneksi.php';
if (!in_array("super_admin", $_SESSION['admin_akses']) && !in_array("admin", $_SESSION['admin_akses'])) {
    echo "Ooopss!! Kamu Tidak Punya Akses";
    exit();
}
$date = date("Y-m-d");
$time = date("H:i");
?>

<div class="content-table">
    <h6>- Data Pesanan Barang ATK -</h6>
    <h5></h5>
    <div class="pengeluaran">
        <form method="post" name="proses">
            <table id="example3" class="display nowrap" style="width:100%">
                <thead>
                    <tr class="keluar">
                        <th>NO</th>
                        <th>NAMA PIC</th>
                        <th>CABANG</th>
                        <th>UNIT</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE pesanan_1='YES' ORDER BY nama_user DESC") or die(mysqli_error($koneksi));
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
                            <td><?= $data['cabang'] ?></td>
                            <td><?= $data['unit'] ?></td>
                            <td>
                                <a href="approve.php?nama_user=<?= $data['nama_user'] ?>" class="action btn btn-warning">Cek List</a>
                            </td>
                        </tr>
        </form>
    <?php } ?>
    </table>
    </div>
</div>
<?php
include '../../../footer.php';
?>