<?php

include "koneksi.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $alamat = $_POST['alamat'];

    mysqli_query($mysqli, "update identitas set nama='$nama', jeniskelamin='$jeniskelamin', alamat='$alamat' where id='$id' ");
}

header("location:tampil_data.php?pesan=update");
