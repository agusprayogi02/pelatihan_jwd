<?php
include("koneksi.php");


if (isset($_POST['tnama'])) {

    $nama = $_POST['tnama'];
    $alamat = $_POST['talamat'];
    $user = $_POST['tuser'];
    $pass = md5($_POST['tpass']);



    $checkUser = $db->query("select*from login where user='$user'");
    $ada = mysqli_num_rows($checkUser);
    if ($ada > 0) {
        $pesan = "User sudah ada";
        include("addAnggota.php");
    } else {


        $db->query("insert into anggota(nama,alamat,status)values
        ('$nama','$alamat',1)") or die("Query gagal");

        $idUser = $db->query("select*from anggota where nama='$nama' and 
        alamat='$alamat'");
        $data = mysqli_fetch_assoc($idUser);

        $id = $data['id'] * 123 * 123;
        $db->query("insert into login(level,user,pass,iduser)values(2,'$user',
        '$pass','$id')") or die("Query Login gagal");


        header("location:anggota.php");
    }
} else {
    $pesan = "Input data gagal terjadi";
    include("addAnggota.php");
}
