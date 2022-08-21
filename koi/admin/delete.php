<?php

session_start();
include '../conn.php';

if (isset($_POST['delete'])) {
  $code = base64_decode($_POST['code']);
  if (isset($code)) {
    $id = explode('?=?', $code)[0];
  } else {
    throw 'Error : Tidak ada Kode';
  }
  $del = $db->query("UPDATE fish SET isDelete = 1 WHERE id = '$id'");
  if ($del) {
    $success = "Berhasil menghapus data!";
    echo $success;
  } else {
    $error = "Gagal menghapus data!";
    throw $error;
  }
}
