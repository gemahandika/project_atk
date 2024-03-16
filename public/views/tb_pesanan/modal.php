<?php
    include '../../../app/config/koneksi.php';
    $date = date("Y-m-d");
    $time = date("H:i");
 ?>
<!-- Modal Create -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="../../../app/controller/Kas_masuk.php" method="post">
            <div class="modal-content">
                <div class="modal-header btn btn-success">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Pemasukan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="report-it">
                        <div class="label-1">
                            <label for="date">Tanggal Pemasukan :</label><br>
                            <input type="date" id="date" name="date" value="<?= $date ?>" >
                        </div>
                        <div class="label-1">
                            <label for="sumber">Sumber Pemasukan :</label><br>
                            <input type="text" id="sumber" name="sumber">
                        </div>
                        <div class="label-1">
                            <label for="keterangan">Keterangan :</label><br>
                            <input type="text" id="keterangan" name="keterangan">
                        </div>
                        <div class="label-1">
                            <label for="jumlah">Jumlah Pemasukan :</label><br>
                            <input type="text" id="jumlah" name="jumlah" onkeypress="return hanyaAngka(event)" > 
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success" name="add">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>


