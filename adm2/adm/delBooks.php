<?php
include("koneksi.php");
$id = $_GET['id'] / 123 / 123;

$buku = $db->query("select * from buku where id='$id'");
$nmfile = mysqli_fetch_assoc($buku);
unlink("gbr_buku/" . $nmfile['nama_file']);

$db->query("delete from buku where id='$id'");
header("location:index.php");
