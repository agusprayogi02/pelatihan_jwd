<?php

if (isset($_GET['id']) && $_GET['id'] != '') {
  $id = $_GET['id'] / 22 / 22 / 103;

  if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $ukuran = $_POST['ukuran'];
    $stok = $_POST['stok'];

    if (isset($_FILES['image'])) {
      if ($_FILES['image']['name'] !== '') {
        $tmp = $_FILES['image']['tmp_name'];
        $namaFiles = $_FILES['image']['name'];
        $ext = substr(strrchr($namaFiles, '.'), 1);
        $nmFile = 'KOI' . time() . '.' . $ext;
        move_uploaded_file($tmp, '../image/' . $nmFile) or die("gagal upload!!");
      } else {
        $nmFile = $_POST['image_old'];
      }
    } else {
      $nmFile = $_POST['image_old'];
    }
    $query = "UPDATE fish SET name = '$name', category_id = '$kategori', price = '$harga', size = '$ukuran', stock = '$stok', image = '$nmFile' WHERE id = '$id'";
    $upp = mysqli_query($db, $query) or die("Query gagal");
    if ($upp) {
      $success = "Berhasil Mengubah Data Ikan $name!!";
    } else {
      $error = "Gagal Mengubah Data!!";
    }
  }

  $data = query("select * from fish where id='" . $id . "'")[0];
} else {
  header("Location: index.php");
  exit(0);
}

?>

<div class="card card-light col-md-10 p-0">
  <div class="card-header ">
    <h3 class="card-title">Update Data Buku</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="card-body ">
      <div class="row">
        <div class="col-md-8">
          <!-- /.card -->
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nama Ikan</label>
            <div class="col-sm-10">
              <input name="name" type="text" class="form-control" value="<?= $data['name']; ?>" id="name" placeholder="Nama Ikan ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
              <select name="kategori" id="kategori" class="select2" style="width: 100%;" required>

                <option>--Pilih Kategori --</option>
                <?php
                $kategori = query("select * from category");
                // $kate = mysqli_fetch_assoc($kategori);
                foreach ($kategori as $k) {
                  if ($k['id'] == $data['category_id']) {
                    $pilih = 'selected';
                  } else {
                    $pilih = '';
                  }
                  echo '<option ' . $pilih . ' value="' . $k['id'] . '">' . $k['name'] . '</option>';
                }
                ?>


              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
              <input name="harga" id="harga" type="number" class="form-control" value="<?= $data['price']; ?>" placeholder="Harga ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="ukuran" class="col-sm-2 col-form-label">Ukuran</label>
            <div class="col-sm-10">
              <input name="ukuran" type="text" class="form-control" id="ukuran" placeholder="Ukuran ..." required value="<?= $data['size']; ?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="stock" class="col-sm-2 col-form-label">Stok Ikan</label>
            <div class="col-sm-10">
              <input name="stok" type="number" class="form-control" id="stock" placeholder="Stok Ikan ..." required value="<?= $data['stock']; ?>">
            </div>
          </div>
          <div class="form-group row ">
            <label for="stock" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-10 custom-file">
              <input name="image" type="file" class="custom-file-input" id="customFile" accept=".jpg,.png,.jpeg,.gif">
              <input name="image_old" type="text" value="<?= $data['image']; ?>" hidden>
              <label for="customFile" class="custom-file-label">Input Gambar...</label>
            </div>
          </div>
        </div>
        <div class="col-md-4 text-center">
          <img src="<?= baseURL('image/' . $data['image']); ?>" alt="Gambar tidak ditemukan" width="90%" class="img-rounded">

        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer pt-2">
      <button type="submit" name="update" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan Perubahan</button>

      <a href="index.php" class="float-right btn btn-default btn-sm">
        Batal
      </a>
    </div>
    <!-- /.card-footer -->
  </form>
</div>

<!-- /.card -->