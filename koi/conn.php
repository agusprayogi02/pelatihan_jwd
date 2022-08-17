<?php
$db = mysqli_connect("localhost", "root", "admin123", "jwd_b_koi") or die("Koneksi Server Gagal");

function query($query)
{
  global $db;
  $result = mysqli_query($db, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
