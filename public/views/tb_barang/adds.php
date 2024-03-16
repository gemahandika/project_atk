<?php include_once('../header.php'); ?>

<div class="box">
    <div class="col-lg-offset-3">
        <h2 class="brand-text font-weight-bold">Form Request Cancel</h2>
    </div>
    <br>
    <br>
    <div class="row ">
        <div class="col-lg-6 col-lg-offset-2">
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
                            <input type="hidden" name="nama-<?= $i ?>" class="form-control" value="<?= $_SESSION['admin_username'] ?>" required>

                            <td>
                                <input type="text" name="resi-<?= $i ?>" class="form-control" required>
                            </td>

                            <input type="hidden" name="alasan-<?= $i ?>" class="form-control" value="<?= @$_POST['alasan'] ?>" required>


                            <input type="hidden" name="status-<?= $i ?>" class="form-control" value="Waiting" required>

                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <div class="form-group pull-right">
                    <input type="submit" name="adds" value="Simpan Semua" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>


<?php include_once('../footer.php'); ?>