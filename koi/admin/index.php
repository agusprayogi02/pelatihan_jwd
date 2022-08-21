<?php
include "../conn.php";

$title = "Admin KOI";
$bagian = "Home";
$page = "Dashboard";

if (isset($_SESSION['level'])) {
    if ($_SESSION['level'] === 'user') {
        header("Location: " . baseURL("index.php"));
    }
} else {
    header("Location: " . baseURL("login.php"));
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $title = $page;
    $pageName = $page;
    include '../heading.php';

    if ($page !== "") {
        if ($page === "delete") {
            $delete = "Apakah anda yakin bro, mau menghapus data ini??";
            include 'dataKoi.php';
        } else {
            include $page . '.php';
        }
    } else {
        include 'dataKoi.php';
    }
} else {
    include '../heading.php';
    include 'dataKoi.php';
}

include '../footer.php';
