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

  $nmFile = 'buku' . time() . '.' . $ext;
  $query = "INSERT INTO fish (name, category_id, price, size, stock, image, uid) VALUES ('$name', '$kategori', '$harga', '$ukuran', '$stok', '$nmFile', '$uid')";
  $upp = mysqli_query($db, $query) or die("Query gagal");
  if ($upp) {
    move_uploaded_file($tmp, 'image/' . $nmFile);
    header("Location: index.php?page=dataKoi");
    echo "<script>alert('Data berhasil ditambahkan!');</script>";
  } else {
    echo "<script>alert('Data gagal ditambahkan!');</script>";
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
          <select name="kategori" id="kategori" class="form-control" required>

            <option value="">--Pilih Kategori --</option>
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
      <div class="form-group row">
        <label for="image" class="col-sm-2 col-form-label">Gambar</label>
        <div class="col-sm-10">
          <input name="image" type="file" class="form-control" id="image" accept=".jpg,.png,.jpeg,.gif" required>
        </div>
      </div>

    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" name="save" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan Data Koi</button>
      <button type="reset" class="btn btn-default float-right">Batal</button>
    </div>
    <!-- /.card-footer -->
  </form>
</div>
<!-- /.card -->