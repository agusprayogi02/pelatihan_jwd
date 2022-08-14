<?php
include("koneksi.php");
if (isset($_POST['tkode'])) {

    $kode = $_POST['tkode'];
    $id = $_POST['tid'] / 123 / 123;
    $judul = $_POST['tjudul'];
    $kategori = $_POST['tkategori'];
    $penerbit = $_POST['tpenerbit'];
    $pengarang = $_POST['tpengarang'];
    $jumlah = $_POST['tjumlah'];


    $db->query("update buku set judul='$judul',kategori='$kategori',
    penerbit='$penerbit',pengarang='$pengarang',jumlah='$jumlah' where id='$id'");

    if ($_FILES['tgbr']) {
        $tmp = $_FILES['tgbr']['tmp_name'];

        $namaFiles = $_POST['tnmFileLama'];
        unlink('gbr_buku/' . $namaFiles);
        move_uploaded_file($tmp, 'gbr_buku/' . $namaFiles);
    }
    header("location:uptBooks.php?id=" . $id * 123 * 123);
} else {
    $pesan = "Input data gagal terjadi";
    include("addBooks.php");
}
