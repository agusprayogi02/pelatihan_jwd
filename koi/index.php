<?php
include "conn.php";

$title = "Jual KOI";
$bagian = "Home";
$page = "Dashboard";


if (isset($_SESSION['level'])) {
    if ($_SESSION['level'] === 'admin') {
        header("Location: " . baseURL("admin/index.php"));
    }
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $pageName = $page;

    if ($pageName !== "") {
        if ($pageName === "pembelian") {
            $title = "Pembelian Koi";
            $bagian = "Transaksi";
            $page = "Pembelian";
        } else if ($pageName === "history") {
            $bagian = "Transaksi";
            $title = "Histori Pembelian";
            $page = "Histori";
        }
        include 'heading.php';
        include $pageName . '.php';
    } else {
        include 'dataKoi.php';
    }
} else {
    include 'heading.php';
    include 'dataKoi.php';
}

include 'footer.php';
