<?php
include '../../../header.php';
include '../../../app/models/Dashboard_models1.php';
include '../../../app/config/koneksi.php';
if (!in_array("user", $_SESSION['admin_akses'])) {
    echo "Ooopss!! Anda Bukan User";
    exit();
}
$date = date("Y-m-d");
$time = date("H:i");
$unit = $data1['unit']
?>

<div class="content-table">
    <h4><i class="fa-solid fa-book-open-reader"></i> Form Pesan Barang</h4>
    <h5></h5>
    <form action="../../../app/controller/Request.php" method="post">
        <div class="form-action">
            <div class="form-req">
                <label for="barang" class="form-label">Pilih Barang :</label>
                <select class="form-select" id="barang" name="barang" aria-label="Default select example" required>
                    <option value="">- Pilih Barang -</option>
                    <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE status_barang='$unit' OR status_barang='AGEN DAN KCU' ORDER BY nama_barang ASC") or die(mysqli_error($koneksi));
                    $result = array();
                    while ($data = mysqli_fetch_array($sql)) {
                        $result[] = $data;
                    }
                    foreach ($result as $data) {
                    ?>
                        <option value="<?= $data['nama_barang'] ?>"><?= $data['nama_barang'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-req">
                <label for="jumlah" class="form-label">Jumlah :</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="0" onkeypress="return inputAngka(event)" required>
            </div>
            <input type="hidden" name="date" value="<?= $date ?>">
            <input type="hidden" name="pic" value="<?= $data1['nama_user'] ?>">
            <input type="hidden" name="cabang" value="<?= $data1['cabang'] ?>">
            <input type="hidden" name="unit" value="<?= $data1['unit'] ?>">
            <input type="hidden" name="status" value="list">
            <input type="hidden" name="keterangan" value="list">
            <input type="hidden" name="kode" value="1">

            <div class="tombol">
                <button type="submit" class="btn btn-danger" name="add">Create List</button>
            </div>
        </div>
    </form>

    <div class="form-approve">
        <h6>- List Pesanan -</h6>

    </div>
    <div class="card">
        <div class="card-body">
            <button class="btn btn-success " onclick="edit()">Proses</button>
            <form method="post" name="proses">
                <table id="example4" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select_all" value=""></th>
                            <th>ACTION</th>
                            <th>TANGGAL</th>
                            <th>NAMA PIC</th>
                            <th>CABANG</th>
                            <th>UNIT</th>
                            <th>NAMA BARANG</th>
                            <th>JUMLAH </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $sql = mysqli_query($koneksi, "SELECT * FROM tb_request WHERE pesan ='list' AND pic='$pic' ORDER BY id_request DESC") or die(mysqli_error($koneksi));
                        $result = array();
                        while ($data = mysqli_fetch_array($sql)) {
                            $result[] = $data;
                        }
                        foreach ($result as $data) {
                            $no++;
                        ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="checked[]" class="check" value="<?= $data['id_request'] ?>">
                                </td>
                                <td>
                                    <a href="delete.php?id=<?= $data['id_request'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="action btn btn-danger">Hapus</a>
                                </td>
                                <td><?= $data['tgl_request'] ?></td>
                                <td><?= $data['pic'] ?></td>
                                <td><?= $data['cabang'] ?></td>
                                <td><?= $data['unit'] ?></td>
                                <td><?= $data['nama_barang'] ?></td>
                                <td><?= number_format($data['jumlah']) ?></td>
                            </tr>
                        <?php } ?>
                </table>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#select_all').on('click', function() {
            if (this.checked) {
                $('.check').each(function() {
                    this.checked = true;
                })
            } else {
                $('.check').each(function() {
                    this.checked = false;
                })
            }
        });

        $('.check').on('click', function() {
            if ($('.check:checked').length == $('.check').length) {
                $('#select_all').prop('checked', true)
            } else {
                $('#select_all').prop('checked', false)
            }
        })
    })

    function edit() {
        document.proses.action = 'approve.php';
        document.proses.submit();
    }

    function hapus() {
        var conf = confirm('Yakin Akan Menghapus Data?');
        if (conf) {
            document.proses.action = 'del.php';
            document.proses.submit();
        }

    }
</script>

<?php include '../../../footer.php'; ?>