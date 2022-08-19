<?php
include("koneksi.php");


if (isset($_POST['tbuku'])) {

    $anggota = $_POST['tanggota'];
    $buku = $_POST['tbuku'];
    $pinjam = $_POST['tpinjam'];
    $kembali = $_POST['tkembali'];



    $checkUser = $db->query("select*from transaksi where idanggota='$anggota' and status=1");
    $ada = mysqli_num_rows($checkUser);
    if ($ada > 2) {
        $pesan = "Anggota telah meminjam 2 buku";
        include("addPeminjaman.php");
    } else {
        $db->query("insert into transaksi(idanggota,idbuku,tglpinjam,tglkembali,status)values
        ('$anggota','$buku','$pinjam','$kembali',1)") or die("Query gagal");
        header("location:dataPeminjaman.php");
    }
} else {
    $pesan = "Input data gagal terjadi";
    include("addPeminjaman.php");
}
