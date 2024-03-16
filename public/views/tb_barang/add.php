<?php
 include '../../../header.php';
 include '../../../app/config/koneksi.php';
 include 'modal.php';
 $date = date("Y-m-d");
 $time = date("H:i");
?>

<div class="content-table">
    <h4> Form Request Barang ATK</h4>
    <h5></h5>
<!-- <div class="pull-right mr-3 ">
    <a href="dataresi.php" class="btn btn-warning mr-2"><i class="glyphicon glyphicon-circle-arrow-right"></i></a>
</div> -->

<div class="box">
    <div class="row ">
        <div class="col-lg-7 col-lg-offset-2 mt-4 ">
            <form action="proses.php" method="post">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="nama" id="nama" value="<?= $_SESSION['admin_username'] ?>" required>
                    <div class="form-group mt-4">
                        <label for="resi">Connote Cancel</label>
                        <input type="text" class="form-control" placeholder="Masukan Resi Cancel" id="resi" name="resi">
                    </div>
                    <div class="form-group">
                        <label for="alasan">Alasan Cancel</label>
                        <select class="form-control" name="alasan" id="alasan">
                            <option value="Salah Alamat">Salah Alamat</option>
                            <option value="Salah Berat">Salah Berat</option>
                            <option value="Ganti Service">Ganti Service</option>
                        </select>
                    </div>
                    <input type="hidden" class="form-control" name="status" id="status" value="Waiting">
                    <div class="pull-left">
                        <a href="generate.php" class="btn btn-success mb-2 "><i class="glyphicon glyphicon-plus"></i>Tambah Lebih Banyak Resi</a>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="add" value="Simpan" class="btn btn-success">
                    </div>
            </form>
        </div>
    </div>
</div>


<?php
 include '../../../footer.php';
?>