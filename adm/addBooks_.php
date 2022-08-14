<?php
include("koneksi.php");
if (isset($_POST['tkode'])) {

    $kode = $_POST['tkode'];
    $judul = $_POST['tjudul'];
    $kategori = $_POST['tkategori'];
    $penerbit = $_POST['tpenerbit'];
    $pengarang = $_POST['tpengarang'];
    $jumlah = $_POST['tjumlah'];


    $checkKode = $db->query("select*from buku where kode='$kode'");
    $ada = mysqli_num_rows($checkKode);
    if ($ada > 0) {
        $pesan = "Kode sudah ada";
        include("addBooks.php");
    } else {
        $query = $db->query("insert into buku(kode,judul,kategori,penerbit,pengarang,jumlah) 
         values('$kode','$judul','$kategori','$penerbit','$pengarang','$jumlah')") or die("Query gagal");
        header("location:index.php");
    }
} else {
    $pesan = "Input data gagal terjadi";
    include("addBooks.php");
}
