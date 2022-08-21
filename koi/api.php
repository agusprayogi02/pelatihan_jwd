<?php

session_start();
include 'conn.php';

if (isset($_GET['func'])) {
  $func = $_GET['func'];
  $func();
}

function delete()
{
  global $db;
  if (isset($_POST['delete'])) {
    $code = base64_decode($_POST['code']);
    if (isset($code)) {
      $data = explode('?=?', $code);
    } else {
      throw 'Error : Tidak ada Kode';
    }
    $del = $db->query("UPDATE fish SET isDelete = 1 WHERE id = '$data[0]'");
    if ($del) {
      $success = "Berhasil menghapus data $data[1]!";
      $data = [true, $success];
    } else {
      $error = "Gagal menghapus data $data[1]!";
      $data = [false, $error];
    }
    echo json_encode($data);
  }
}

function blokirUser()
{
  global $db;
  if (isset($_POST['blokir'])) {
    $code = base64_decode($_POST['code']);
    if (isset($code)) {
      $data = explode('?=?', $code);
    } else {
      throw 'Error : Tidak ada Kode';
    }
    $blokir = $db->query("UPDATE user SET user.status = '0' WHERE uid = " . $data[0]);
    if ($blokir) {
      $success = "Berhasil memblokir user $data[1]!";
      $data = [true, $success];
    } else {
      $error = "Gagal memblokir user $data[1]!";
      $data = [false, $error];
    }
    echo json_encode($data);
  }
}

function activeUser()
{
  global $db;
  if (isset($_POST['active'])) {
    $code = base64_decode($_POST['code']);
    if (isset($code)) {
      $data = explode('?=?', $code);
    } else {
      throw 'Error : Tidak ada Kode';
    }
    $active = $db->query("UPDATE user SET user.status = '1' WHERE uid = " . $data[0]);
    if ($active) {
      $success = "Berhasil Mengaktifkan User $data[1]!";
      $data = [true, $success];
    } else {
      $error = "Gagal Mengaktifkan User $data[1]!";
      $data = [false, $error];
    }
    echo json_encode($data);
  }
}
