<?php
if (!isset($_SESSION)) {
    session_start();
}


if (isset($_POST['tuser'])) {


    $user = $_POST['tuser'];
    $pass = $_POST['tpass'];
    $level = $_POST['tlevel'];
    $db = mysqli_connect("localhost", "root", "admin123", "jwd_b");
    $query = $db->query("select*from login where user='$user' and level='$level'");
    $row = mysqli_num_rows($query);

    if ($row > 0) {

        $isiQuery = $query->fetch_array(MYSQLI_ASSOC);
        if ($isiQuery['pass'] == md5($pass)) {
            if ($level == 1) {
                $query_anggota = $db->query("select*from admin where id='" . $isiQuery['iduser'] / 123 / 123 . "'");
            } else {
                $query_anggota = $db->query("select*from anggota where id='" . $isiQuery['iduser'] / 123 / 123 . "'");
            }
            $data =  $query_anggota->fetch_array(MYSQLI_ASSOC);
            if ($data['status'] == 1) {
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['level'] = $isiQuery['level'];
                header("location: adm/dashboard.php");
            } else {
                $pesan = "User tidak aktif";
                include("index.php");
            }
        } else {
            $pesan = "Password salah";
            include("index.php");
        }
    } else {
        $pesan = "Maaf user anda tidak ditemukan";
        include("index.php");
    }
} else {
    header('location:index.php');
}
