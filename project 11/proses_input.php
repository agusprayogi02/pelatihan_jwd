<?php

include "koneksi.php";

if (isset($_POST)) {
    $nama = $_POST['nama'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $alamat = $_POST['alamat'];

    $insert = mysqli_query($mysqli, "insert into identitas set nama='$nama', jeniskelamin='$jeniskelamin', alamat='$alamat'");
}

header("location:tampil_data.php?pesan=tambah");
