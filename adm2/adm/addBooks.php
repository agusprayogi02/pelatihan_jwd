<?php include("head.php");
include("koneksi.php");
if (isset($pesan)) {
?>

    <div class="card bg-gradient-danger col-md-8 mx-auto">
        <div class="card-header">
            <h3 class="card-title"><?php echo $pesan ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
    </div>
<?php } ?>

<div class="card card-light col-md-8 mx-auto p-0">
    <div class="card-header ">
        <h3 class="card-title">Input Data Buku</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="addBooks_.php" method="POST" enctype="multipart/form-data">
        <div class="card-body ">

            <!-- /.card -->

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Buku</label>
                <div class="col-sm-10">
                    <input name="tkode" type="text" class="form-control" id="inputEmail3" placeholder="Kode Buku ..." required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Judul Buku</label>
                <div class="col-sm-10">
                    <input name="tjudul" type="text" class="form-control" id="inputEmail3" placeholder="Judul Buku ..." required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <select name="tkategori" class="form-control" required>

                        <option value="">--Pilih Kategori --</option>
                        <?php
                        $kategori = $db->query("select * from kategori");
                        // $kate = mysqli_fetch_assoc($kategori);
                        foreach ($kategori as $k) {
                            echo '<option value="' . $k['id'] . '">' . $k['kategori'] . '</option>';
                        }
                        ?>


                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Penerbit</label>
                <div class="col-sm-10">
                    <input name="tpenerbit" type="text" class="form-control" id="inputEmail3" placeholder="Penerbit ..." required>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Pengarang</label>
                <div class="col-sm-10">
                    <input name="tpengarang" type="text" class="form-control" id="inputEmail3" placeholder="Pengarang ..." required>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Buku</label>
                <div class="col-sm-10">
                    <input name="tjumlah" type="number" class="form-control" id="inputEmail3" placeholder="Jumlah Buku ..." required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-10">
                    <input name="tgbr" type="file" class="form-control" id="inputEmail3" accept=".jpg,.png,.jpeg,.gif" placeholder="Jumlah Buku ..." required>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan Data Buku</button>
            <button type="reset" class="btn btn-default float-right">Batal</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
<!-- /.card -->

<?php include("footer.php"); ?>