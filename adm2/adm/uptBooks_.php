<?php
include("koneksi.php");
if (isset($_POST['tkode'])) {
    $id = $_POST['tid'];
    $kode = $_POST['tkode'];
    $judul = $_POST['tjudul'];
    $kategori = $_POST['tkategori'];
    $penerbit = $_POST['tpenerbit'];
    $pengarang = $_POST['tpengarang'];
    $jumlah = $_POST['tjumlah'];
    $db->query("update buku set judul='$judul', 
    kategori='$kategori', penerbit='$penerbit',pengarang='$pengarang',
    jumlah='$jumlah' where id='$id'");

    if (isset($_FILES['tgbr']['name'])) {

        $tmp = $_FILES['tgbr']['tmp_name'];
        $nmFile = $_POST['tnmFile'];
        unlink('gbr_buku/' . $nmFile);
        move_uploaded_file($tmp, 'gbr_buku/' . $nmFile);
    }
    header("location:uptBooks.php?id=" . $id);
} else {

    header("location:uptBooks.php?id=" . $id);
}
