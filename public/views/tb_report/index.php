<?php
include '../../../header.php';
include '../../../app/config/koneksi.php';
include '../../../app/models/Dashboard_models1.php';
$date = date("Y-m-d");
$time = date("H:i");
$nama = $data1['nama_user'];
?>

<div class="content-table">
    <h6> Report Barang ATK</h6>
    <h5></h5>
    <div class="container mt-4">
        <!-- form filter data berdasarkan range tanggal  -->
        <form action="index.php" method="get">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label class="col-form-label">Periode</label>
                </div>
                <div class="col-auto">
                    <input type="date" class="form-control" name="dari" required>
                </div>
                <div class="col-auto">
                    -
                </div>
                <div class="col-auto">
                    <input type="date" class="form-control" name="ke" required>
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>
        <br>
        <div class="label1">
            <?php
            if (isset($_GET['dari']) && isset($_GET['ke'])) {
                echo "<p>Data Dari Tanggal " . $_GET['dari'] . " Sampai Tanggal " . $_GET['ke'] . "</p>";
            } else {
                echo "-";
            }
            ?>
        </div>
        <br>
        <h6></h6>
        <div class="card">
            <div class="card-body">
                <form action="../../../app/controller/Report.php" method="post">
                    <table id="mauexport" style="width:100%">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Tanggal Terima</td>
                                <td>Jam Terima</td>
                                <td>Pic</td>
                                <td>Nama Barang</td>
                                <td>Jumlah</td>
                                <td>Tanggal Pesan</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <?php
                        //jika tanggal dari dan tanggal ke ada maka
                        if (isset($_GET['dari']) && isset($_GET['ke'])) {
                            // tampilkan data yang sesuai dengan range tanggal yang dicari 
                            $data = mysqli_query($koneksi, "SELECT * FROM tb_report WHERE pic='$nama'AND tgl_terima BETWEEN '" . $_GET['dari'] . "' and '" . $_GET['ke'] . "'");
                        } else {
                            //jika tidak ada tanggal dari dan tanggal ke maka tampilkan seluruh data
                            $data = mysqli_query($koneksi, "select * from tb_report WHERE pic='$nama'");
                        }
                        // $no digunakan sebagai penomoran 
                        $no = 1;
                        // while digunakan sebagai perulangan data 
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['tgl_terima']; ?></td>
                                <td><?php echo $d['time_report']; ?></td>
                                <td><?php echo $d['pic']; ?></td>
                                <td><?php echo $d['barang']; ?></td>
                                <td><?php echo $d['jumlah']; ?></td>
                                <td><?php echo $d['tgl_pesan']; ?></td>
                                <td><?php echo $d['status']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
        $('#mauexport').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
<?php include '../../../footer.php'; ?>