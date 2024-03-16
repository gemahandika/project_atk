
<?php
require_once "../config/koneksi.php";
if (isset($_POST['add'])) {
    $id = trim(mysqli_real_escape_string($koneksi, $_POST['id']));
    $date = trim(mysqli_real_escape_string($koneksi, $_POST['date']));
    $pic = trim(mysqli_real_escape_string($koneksi, $_POST['pic']));
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $unit = trim(mysqli_real_escape_string($koneksi, $_POST['unit']));
    $barang = trim(mysqli_real_escape_string($koneksi, $_POST['barang']));
    $jumlah = trim(mysqli_real_escape_string($koneksi, $_POST['jumlah']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));
    $ket = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    $kode = trim(mysqli_real_escape_string($koneksi, $_POST['kode']));
    // Masukan data ke tabel anggota
    mysqli_query($koneksi, "INSERT INTO tb_request (id_request, tgl_request, pic, cabang, unit, nama_barang, jumlah, pesan, keterangan, kode) 
    VALUES('$id', '$date', '$pic', '$cabang', '$unit', '$barang','$jumlah','$status' ,'$ket','$kode')");
    echo "<script>window.location='../../public/views/tb_request/';</script>";
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nip = trim(mysqli_real_escape_string($koneksi, $_POST['nip']));
    $join_date = trim(mysqli_real_escape_string($koneksi, $_POST['join_date']));
    $nama_anggota = trim(mysqli_real_escape_string($koneksi, $_POST['nama_anggota']));
    $divisi = trim(mysqli_real_escape_string($koneksi, $_POST['divisi']));
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $saldo = trim(mysqli_real_escape_string($koneksi, $_POST['saldo']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));
    mysqli_query($koneksi, "UPDATE tb_anggota SET nip='$nip', join_date='$join_date', nama_anggota='$nama_anggota', divisi='$divisi', cabang='$cabang', saldo='$saldo',
    status='$status' WHERE id_anggota='$id'");
    mysqli_query($koneksi, "UPDATE user SET nama_user='$nama_anggota' WHERE nip='$nip'");
    mysqli_query($koneksi, "UPDATE user SET nip='$nip' WHERE nama_user='$nama_anggota'");
    mysqli_query($koneksi, "UPDATE tb_pemasukan SET sumber_pemasukan='$nama_anggota' WHERE nip='$nip'");
    mysqli_query($koneksi, "UPDATE tb_pemasukan SET nip='$nip' WHERE sumber_pemasukan='$nama_anggota'");
    echo "<script>window.location='../../public/views/data_anggota/';</script>";
} else if (isset($_POST['approve'])) {
    for ($i = 0; $i < count($_POST['id']); $i++) {
        $id = $_POST['id'][$i];
        $id1 = $_POST['id'];
        $tgl_request = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_request'][$i]));
        $pic = trim(mysqli_real_escape_string($koneksi, $_POST['pic'][$i]));
        $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang'][$i]));
        $unit = trim(mysqli_real_escape_string($koneksi, $_POST['unit'][$i]));
        $nama_barang = trim(mysqli_real_escape_string($koneksi, $_POST['nama_barang'][$i]));
        $jumlah = trim(mysqli_real_escape_string($koneksi, $_POST['jumlah'][$i]));
        $pesan = trim(mysqli_real_escape_string($koneksi, $_POST['pesan']));
        $ket = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
        $pesanan = trim(mysqli_real_escape_string($koneksi, $_POST['pesanan']));
        $kode = trim(mysqli_real_escape_string($koneksi, $_POST['kode']));
        mysqli_query($koneksi, "UPDATE tb_request SET pesan='$pesan', keterangan='$ket', kode='$kode' WHERE id_request='$id'");
        mysqli_query($koneksi, "UPDATE user SET pesanan_1='$pesanan' WHERE nama_user='$pic'");
    }
    echo "<script>alert('Data Berhasil Di Kirim');window.location='../../public/views/tb_request/';</script>";
}
