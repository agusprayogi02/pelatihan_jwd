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

function baseURL($url){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    '/'.$url
  );
}