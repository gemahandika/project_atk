<?php
include '../../../header.php';
include '../../../app/config/koneksi.php';
if (!in_array("super_admin", $_SESSION['admin_akses']) && !in_array("admin", $_SESSION['admin_akses'])) {
    echo "Ooopss!! Kamu Tidak Punya Akses";
    exit();
}
include 'modal.php';
$date = date("Y-m-d");
$time = date("H:i");
?>

<div class="content-table">
    <h6> Data Stok Barang</h6>
    <h5></h5>
    <div class="form-action1">
        <button type="button" class="btn btn-success fa-solid fa-add fa-1xl" data-bs-toggle="modal" data-bs-target="#exampleModal"> Tambah Barang </button>
        <a href="export.php" target="_blank" type="button" class="btn btn-dark"> Download </a>
    </div>
    <div class="pemasukan">
        <table id="example3" class="display nowrap" style="width:100%">
            <thead>
                <tr class="masuk" id="tb_barang">
                    <th>NO</th>
                    <th>KODE BARANG</th>
                    <th>NAMA BARANG</th>
                    <th>SATUAN</th>
                    <th>STOK BARANG</th>
                    <th>STATUS BARANG</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_barang ORDER BY id_barang DESC") or die(mysqli_error($koneksi));
                $total = 0;
                $result = array();
                while ($data = mysqli_fetch_array($sql)) {
                    $result[] = $data;
                }
                foreach ($result as $data) {
                    $no++;
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $data['kode_barang'] ?></td>
                        <td><?= $data['nama_barang'] ?></td>
                        <td><?= $data['satuan'] ?></td>
                        <td><?= $data['stok_barang'] ?></td>
                        <td><?= $data['status_barang'] ?></td>
                        <td>
                            <a href="#" class="action btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_barang'] ?>">Edit</a>
                            <a href="#" class="action btn btn-primary" data-bs-toggle="modal" data-bs-target="#stokModal<?= $data['id_barang'] ?>">Tambah Stok</a>
                            <a href="delete.php?id=<?= $data['id_barang'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="action btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal<?= $data['id_barang'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="../../../app/controller/Barang_atk.php" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Barang</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="report-it">
                                            <input type="hidden" name="id" value="<?= $data['id_barang'] ?>">
                                            <div class="label-1">
                                                <label for="kode_barang">Kode_barang :</label><br>
                                                <input type="text" id="kode_barang" name="kode_barang" value="<?= $data['kode_barang'] ?>">
                                            </div>
                                            <div class="label-1">
                                                <label for="nama_barang">Nama Barang :</label><br>
                                                <input type="text" id="nama_barang" name="nama_barang" value="<?= $data['nama_barang'] ?>">
                                            </div>
                                            <div class="label-1">
                                                <label for="satuan">Satuan :</label><br>
                                                <select class="dept-1" name="satuan" type="text" required>
                                                    <option value="<?= $data['satuan'] ?>"><?= $data['satuan'] ?></option>
                                                    <option value="PCS">PCS</option>
                                                    <option value="BUNGKUS">BUNGKUS</option>
                                                    <option value="GULUNG">GULUNG</option>
                                                </select>
                                            </div>

                                            <div class="label-1">
                                                <label for="status_barang">Dijual :</label><br>
                                                <select class="dept-1" name="status_barang" type="text">
                                                    <option value="<?= $data['status_barang'] ?>"><?= $data['status_barang'] ?></option>
                                                    <option value="">TIDAK</option>
                                                    <option value="AGEN">AGEN</option>
                                                    <option value="KCU">KCU</option>
                                                    <option value="AGEN DAN KCU">AGEN DAN KCU</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <input type="submit" name="edit" class="btn btn-primary" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Modal NON AKtif 111 -->

                    <div class="modal fade" id="stokModal<?= $data['id_barang'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="../../../app/controller/Barang_atk.php" method="post">
                                <div class="modal-content">
                                    <div class="modal-header btn btn-primary">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Stok Barang</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="report-it">
                                            <input type="hidden" name="id" value="<?= $data['id_barang'] ?>">
                                            <div class="label-1">
                                                <label for="nama_barang">Nama Barang :</label><br>
                                                <input type="text" id="nama_barang" name="nama_barang" value="<?= $data['nama_barang'] ?>" readonly>
                                            </div>
                                            <div class="label-1">
                                                <label for="stok">Tambah Stok :</label><br>
                                                <input type="text" id="stok" name="stok" onkeypress="return inputAngka(event)">
                                            </div>
                                            <input type="hidden" id="stok" name="stok_lama" value="<?= $data['stok_barang'] ?>">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <input type="submit" name="tambah_stok" class="btn btn-primary" value="Tambah Stok">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php } ?>
        </table>
    </div>
    <?php
    include '../../../footer.php';
    ?>