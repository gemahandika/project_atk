<?php
    include '../../../app/config/koneksi.php';
    $date = date("Y-m-d");
    $time = date("H:i");
 ?>
<!-- Modal Create -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="../../../app/controller/Barang_atk.php" method="post">
            <div class="modal-content">
                <div class="modal-header btn btn-success">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">FORM TAMBAH BARANG ATK</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="report-it">
                        <div class="label-1">
                            <label for="kode_barang">Kode Barang :</label><br>
                            <input type="text" id="kode_barang" name="kode_barang" required >
                        </div>
                        <div class="label-1">
                            <label for="nama_barang">Nama Barang :</label><br>
                            <input type="text" id="nama_barang" name="nama_barang" required >
                        </div>
                        <div class="label-1">
                            <label for="stok">Jumlah Stok :</label><br>
                            <input type="text" id="stok" name="stok" onkeypress="return hanyaAngka(event)" required >
                        </div>
                        <div class="label-1">
                            <label for="satuan">Satuan :</label><br>
                            <select class="dept-1" name="satuan" type="text" required>
                                <option value="PCS">PCS</option>
                                <option value="BUNGKUS">BUNGKUS</option>
                                <option value="GULUNG">GULUNG</option>
                             </select>
                        </div>
                        <div class="label-1">
                            <label for="status_barang">Dijual :</label><br>
                            <select class="dept-1" name="status_barang" type="text" >
                                <option value="">TIDAK</option>
                                <option value="dijual">YA</option>
                             </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success" name="add">TAMBAH</button>
                </div>
            </div>
        </form>
    </div>
</div>


