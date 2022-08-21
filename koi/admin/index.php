<?php
session_start();
include "../conn.php";

$title = "Admin KOI";
$bagian = "Home";
$page = "Dashboard";
$pageName = "Dashboard";

if (isset($_SESSION['level'])) {
    if ($_SESSION['level'] !== 'admin') {
        header("Location: " . baseURL("index.php"));
    }
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $title = $page;
    $pageName = $page;

    if ($page !== "") {
        if ($page === "user") {
            $bagian = "Users";
        } elseif ($page === "pemesanan") {
            $bagian = "Transaksi";
            $page = "Pemesanan";
        } elseif ($page === "history") {
            $bagian = "Transaksi";
            $page = "Histori Pemesanan";
        }
        include '../heading.php';
        include $pageName . '.php';
    } else {
        include '../heading.php';
        include 'dataKoi.php';
    }
} else {
    include '../heading.php';
    include 'dataKoi.php';
}

include '../footer.php';
