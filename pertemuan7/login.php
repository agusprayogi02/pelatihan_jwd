<?php
session_start();

if (isset($_POST['tuser'])) {

    $user = $_POST['tuser'];
    $pass = $_POST['tpass'];
    $db = mysqli_connect("localhost", "root", "admin123", "jwd_b");
    $query = $db->query("select * from login where user='$user'");
    $row = mysqli_num_rows($query);

    if ($row > 0) {
        $isiQuery = $query->fetch_array(MYSQLI_ASSOC);
        
        if (md5($pass) === $isiQuery['pass']) {
            $_SESSION['nama'] = $isiQuery['nama'];
            $_SESSION['level'] = $isiQuery['level'];
            header("location:admin.php");
        }else {
            $pesan = "Maaf Password yang anda masukkan salah!";
            include("index.php");
        }
    } else {
        $pesan = "Maaf user tidak ditemukan!";
        include("index.php");
    }
} else {
    header('location:index.php');
}
