<?php
session_start();
include "koneksi.php";

$title = "Jual KOI";

if (isset($_GET['page'])) {
  $page = $_GET['page'];
  $title = $page;
  include 'heading.php';

  if ($page !== "") {
    include $page . '.php';
  } else {
    include 'dataKoi.php';
  }
} else {
  include 'heading.php';
  include 'dataKoi.php';
}

include 'footer.php';
