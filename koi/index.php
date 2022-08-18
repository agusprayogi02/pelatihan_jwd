<?php
session_start();
include "conn.php";

$title = "Jual KOI";
$bagian = "Home";
$page = "Dashboard";


if (isset($_SESSION)) {
    if ($_SESSION['level'] === 'admin') {
        header("Location: admin/index.php");
    }
}

if (isset($_POST['logOut'])) {
    session_destroy();
    header("Location: " . baseURL("index.php"));
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    if ($page !== "") {
        if ($page === "pembelian") {
            $title = "Pembelian Koi";
            $bagian = "Transaksi";
            $page = "Pembelian";
        } else if ($page === "history") {
            $bagian = "Transaksi";
            $title = "Histori Pembelian";
            $page = "Histori";
        }
        include 'heading.php';
        include $page . '.php';
    } else {
        include 'dataKoi.php';
    }
} else {
    include 'heading.php';
    include 'dataKoi.php';
}

include 'footer.php';
