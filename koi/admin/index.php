<?php
session_start();
include "../conn.php";

$title = "Admin KOI";

if (!isset($_SESSION)) {
    header("Location: ../index.php");
}else{
    if ($_SESSION['level'] !== 'admin') {
        header("Location: ../index.php");
    }
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $title = $page;
    include '../heading.php';

    if ($page !== "") {
        include $page . '.php';
    } else {
        include 'dataKoi.php';
    }
} else {
    include '../heading.php';
    include 'dataKoi.php';
}

include '../footer.php';

