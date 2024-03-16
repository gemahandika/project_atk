<?php

include '../../../app/config/koneksi.php';
$date = date("Y-m-d");
$time = date("H:i");
?>
<!-- Modal Create -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="../../../app/controller/User_app.php" method="post">
            <div class="modal-content">
                <div class="modal-header btn btn-success">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data User App</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="report-it">
                        <div class="label-1">
                            <label for="nip">Cust ID :</label><br>
                            <input type="text" id="nip" name="nip" required onkeyup="myFunction()">
                        </div>
                        <div class="label-1">
                            <label for="username">Username :</label><br>
                            <input type="text" id="username" name="username" required onkeyup="myFunction()">
                        </div>
                        <div class="label-1">
                            <label for="password">Password :</label><br>
                            <input type="text" id="password" name="password" required onkeyup="myFunction()">
                        </div>
                        <div class="label-1">
                            <label for="fullname">Fullname :</label><br>
                            <input type="text" id="fullname" name="fullname" required onkeyup="myFunction()">
                        </div>
                        <div class="label-1">
                            <label for="cabang">Cabang :</label><br>
                            <input type="text" id="cabang" name="cabang" required onkeyup="myFunction()">
                        </div>
                        <div class="label-1">
                            <label for="unit">Unit :</label><br>
                            <input type="text" id="unit" name="unit" required onkeyup="myFunction()">
                        </div>
                        <input type="hidden" id="status" name="status" value="NON AKTIF" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="add">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>