<?php
include 'koneksi.php';

if (isset($_GET)) {
  $id = $_GET['id'];
  $mysqli->query("DELETE FROM identitas WHERE id='$id'") or die(mysqli_errno($this));
}

header("location:tampil_data.php?pesan=hapus");
