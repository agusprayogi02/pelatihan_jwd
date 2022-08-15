<?php
include("koneksi.php");
if (isset($_POST['tkode'])) {

    $kode = $_POST['tkode'];
    $judul = $_POST['tjudul'];
    $kategori = $_POST['tkategori'];
    $penerbit = $_POST['tpenerbit'];
    $pengarang = $_POST['tpengarang'];
    $jumlah = $_POST['tjumlah'];
    $tmp = $_FILES['tgbr']['tmp_name'];
    $namaFiles = $_FILES['tgbr']['name'];
    $ext = substr(strrchr($namaFiles, '.'), 1);

    $checkKode = $db->query("select*from buku where kode='$kode'");
    $ada = mysqli_num_rows($checkKode);
    if ($ada > 0) {
        $pesan = "Kode sudah ada";
        include("addBooks.php");
    } else {

        $nmFile = 'buku' . date("YmdHis") . '.' . $ext;
        $query = $db->query("insert into buku(kode,judul,kategori,penerbit,pengarang,jumlah,nama_file,aktif) 
         values('$kode','$judul','$kategori','$penerbit','$pengarang','$jumlah','$nmFile',1)") or die("Query gagal");

        move_uploaded_file($tmp, 'gbr_buku/buku' . date("YmdHis") . '.' . $ext);
        header("location:index.php");
    }
} else {
    $pesan = "Input data gagal terjadi";
    include("addBooks.php");
}
