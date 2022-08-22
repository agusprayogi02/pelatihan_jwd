<?php

session_start();
include 'conn.php';

if (isset($_GET['func'])) {
  if (!isset($_SESSION['id'])) {
    $data = [false, 'Anda harus login terlebih dahulu'];
    echo json_encode($data);
  } else {
    $func = $_GET['func'];
    $func();
  }
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

function modifyUser()
{
  global $db;
  if (isset($_POST['status'])) {
    $code = base64_decode($_POST['code']);
    if (isset($code)) {
      $data = explode('?=?', $code);
    } else {
      throw 'Error : Tidak ada Kode';
    }
    $status = intval($data[2]);
    $blokir = $db->query("UPDATE user SET user.status = '$status' WHERE uid = " . $data[0]);
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

function beli()
{
  global $db;
  if (isset($_POST['value'])) {
    $code = base64_decode($_POST['code']);
    if (isset($code)) {
      $data = explode('?=?', $code);
    } else {
      throw 'Error : Tidak ada Kode';
    }

    $id = $_SESSION['id'];

    $jml = intval($_POST['value']);
    $trans = query("SELECT * FROM transaksi WHERE transaksi.status = 1 AND uid = $id");
    if (!empty(count($trans))) {
      $kodeTrans = $trans[0]['kode_trans'];
    } else {
      $kodeTrans = "TR" . uniqid();
      $uppTrans = $db->query("INSERT INTO transaksi(kode_trans, uid, status) VALUES('$kodeTrans', '$id', 1)");
    }

    $Fid = intval($data[0]);
    $cekKeranjang = query("SELECT * FROM item_trans WHERE fish_id = '$Fid' AND kode_trans = '$kodeTrans'");

    if (empty(count($cekKeranjang))) {
      $beli = $db->query("INSERT INTO item_trans(kode_trans, fish_id, amount) VALUES ('$kodeTrans', '$Fid', '$jml')");
      $jmlCart = count($trans) + 1;
    } else {
      $Kid = $cekKeranjang[0]['id'];
      $beli = $db->query("UPDATE item_trans SET amount = (amount + $jml) WHERE id = '$Kid'");
      $jmlCart = count($trans); // Jumlah Barang yang dibeli
    }

    $_SESSION['keranjang'] = $jmlCart;
    if ($beli) {
      $success = "Berhasil membeli data $data[1]!";
      $data = [true, $success];
    } else {
      $error = "Gagal membeli data $data[1]!";
      $data = [false, $error];
    }
    echo json_encode($data);
  }
}
