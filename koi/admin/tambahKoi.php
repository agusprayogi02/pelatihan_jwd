<?php

if (isset($_POST['save'])) {
  $name = $_POST['name'];
  $kategori = $_POST['kategori'];
  $harga = $_POST['harga'];
  $ukuran = $_POST['ukuran'];
  $stok = $_POST['stok'];
  $uid = $_SESSION['id'];
  $tmp = $_FILES['image']['tmp_name'];
  $namaFiles = $_FILES['image']['name'];
  $ext = substr(strrchr($namaFiles, '.'), 1);

  $nmFile = 'KOI' . time() . '.' . $ext;
  $query = "INSERT INTO fish (name, category_id, price, size, stock, image, uid) VALUES ('$name', '$kategori', '$harga', '$ukuran', '$stok', '$nmFile', '$uid')";
  $upp = mysqli_query($db, $query) or die("Query gagal");
  if ($upp) {
    move_uploaded_file($tmp, '../image/' . $nmFile) or die("gagal upload!!");
    $success =  'Berhasil Menambahkan Data Ikan $name!!';
  } else {
    $error =  'Gagal Menambahkan Data!!';
  }
}

?>

<div class="card card-light col-md-8 mx-auto p-0">
  <div class="card-header ">
    <h3 class="card-title">Input Data Koi</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="card-body ">

      <!-- /.card -->
      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Nama Ikan</label>
        <div class="col-sm-10">
          <input name="name" type="text" class="form-control" id="name" placeholder="Nama Ikan ..." required>
        </div>
      </div>
      <div class="form-group row">
        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
        <div class="col-sm-10">
          <select name="kategori" id="kategori" class="select2" style="width: 100%;" required>

            <option selected>--Pilih Kategori --</option>
            <?php
            $kategori = query("select * from category");
            // $kate = mysqli_fetch_assoc($kategori);
            foreach ($kategori as $k) {
              echo '<option value="' . $k['id'] . '">' . $k['name'] . '</option>';
            }
            ?>


          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
          <input name="harga" id="harga" type="number" class="form-control" placeholder="Harga ..." required>
        </div>
      </div>

      <div class="form-group row">
        <label for="ukuran" class="col-sm-2 col-form-label">Ukuran</label>
        <div class="col-sm-10">
          <input name="ukuran" type="text" class="form-control" id="ukuran" placeholder="Ukuran ..." required>
        </div>
      </div>

      <div class="form-group row">
        <label for="stock" class="col-sm-2 col-form-label">Stok Ikan</label>
        <div class="col-sm-10">
          <input name="stok" type="number" class="form-control" id="stock" placeholder="Stok Ikan ..." required>
        </div>
      </div>
      <div class="form-group row ">
        <label for="stock" class="col-sm-2 col-form-label">Gambar</label>
        <div class="col-sm-10 custom-file">
          <input name="image" type="file" class="custom-file-input" id="customFile" accept=".jpg,.png,.jpeg,.gif" required>
          <label for="customFile" class="custom-file-label">Input Gambar...</label>
        </div>
      </div>

    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" name="save" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan Data Koi</button>
      <button type="reset" class="btn btn-danger btn-sm float-right ml-2">Reset</button>
      <a href="index.php" class="btn btn-default btn-sm float-right">Batal</a>
    </div>
    <!-- /.card-footer -->
  </form>
</div>
<!-- /.card -->