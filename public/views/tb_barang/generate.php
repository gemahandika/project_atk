<?php
 include '../../../header.php';
 include '../../../app/config/koneksi.php';
 include 'modal.php';
//  include '../../../app/models/Dashboard_models.php';
 $date = date("Y-m-d");
 $time = date("H:i");
?>

<div class="content-table">
    <h4> Form Request Barang ATK</h4>
    <h5></h5>


<!-- <div class="row">
    <div class="col-lg-6 col-lg-offset-3 mt-4">
        <form action="" method="post">
            <div class="form-group">
                <label for="count_add">Banyak Resi</label>
                <input type="text" name="count_add" id="count_add" maxlength="2" pattern="[0-9]+" class="form-control" required>
            </div>
            <div class="form-group pull-right">
                <input type="submit" name="generate" value="Generate" class="btn btn-success">
            </div>
        </form>
    </div>
</div> -->
<form action="proses.php" method="post">
                <input type="hidden" name="total" id="nama" value="<?= @$_POST['count_add'] ?>">
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th class="text-center">Masukan Nomor resi</th>
                    </tr>
                    <?php
                    for ($i = 1; $i <= $_POST['count_add']; $i++) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <input type="date" name="date-<?= $i ?>" class="form-control" value="<?= $date ?>" required>
                            <input type="text" name="dept-<?= $i ?>" class="form-control"  value="<?= $data1['nama_user'] ?>"required>
                            <td>
                                <input type="text" name="resi-<?= $i ?>" class="form-control" required>
                            </td>

                            <input type="text" name="alasan-<?= $i ?>" class="form-control" value="<?= @$_POST['alasan'] ?>" required>


                            <input type="text" name="status-<?= $i ?>" class="form-control" value="Waiting" required>

                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <div class="form-group pull-right">
                    <input type="submit" name="adds" value="Simpan Semua" class="btn btn-success">
                </div>
            </form>

<?php
 include '../../../footer.php';
?>