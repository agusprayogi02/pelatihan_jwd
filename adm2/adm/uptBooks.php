<?php include("head.php");
if ($_SESSION['level'] != 1) {
    echo '<meta http-equiv="refresh" content="0;dashboard.php">';
}
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
    <?php }
if (isset($_GET['id']) && $_GET['id'] != '') {
    $query = $db->query("select*from buku where id='" . $_GET['id'] / 123 / 123 . "'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
    ?>

        <div class="card card-light col-md-10 p-0">
            <div class="card-header ">
                <h3 class="card-title">Update Data Buku</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="uptBooks_.php" method="POST" enctype="multipart/form-data">
                <div class="card-body ">

                    <div class="row">


                        <div class="col-md-8">


                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Buku</label>
                                <div class="col-sm-10">
                                    <input value="<?php echo $data['id'] * 123 * 123 ?>" name="tid" type="text" hidden>
                                    <input value="<?php echo $data['kode'] ?>" name="tkode" type="text" class="form-control" id="inputEmail3" placeholder="Kode Buku ..." readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Judul Buku</label>
                                <div class="col-sm-10">
                                    <input value="<?php echo $data['judul'] ?>" name="tjudul" type="text" class="form-control" id="inputEmail3" placeholder="Judul Buku ..." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select name="tkategori" class="form-control" required>

                                        <option value="">--Pilih Kategori --</option>
                                        <?php
                                        $kategori = $db->query("select * from kategori");

                                        foreach ($kategori as $k) {
                                            if ($k['id'] == $data['kategori']) {
                                                $pilih = 'selected';
                                            } else {
                                                $pilih = '';
                                            }
                                            echo '<option ' . $pilih . ' value="' . $k['id'] . '">' . $k['kategori'] . '</option>';
                                        }
                                        ?>


                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Penerbit</label>
                                <div class="col-sm-10">
                                    <input value="<?php echo $data['penerbit'] ?>" name="tpenerbit" type="text" class="form-control" id="inputEmail3" placeholder="Penerbit ..." required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Pengarang</label>
                                <div class="col-sm-10">
                                    <input value="<?php echo $data['pengarang'] ?>" name="tpengarang" type="text" class="form-control" id="inputEmail3" placeholder="Pengarang ..." required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Buku</label>
                                <div class="col-sm-10">
                                    <input value="<?php echo $data['jumlah'] ?>" name="tjumlah" type="number" class="form-control" id="inputEmail3" placeholder="Jumlah Buku ..." required>
                                    <input value="<?php echo $data['nama_file'] ?>" name="tnmFile" type="text" hidden>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-10">
                                    <input name="tgbr" type="file" class="form-control" id="inputEmail3" accept=".jpg,.png,.jpeg,.gif" placeholder="Jumlah Buku ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="gbr_buku/<?php echo $data['nama_file'] ?>" alt="Gambar tidak ditemukan" width="90%">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm  btn-flat"><i class="fa fa-save"></i> Simpan Perubahan</button>
                    <a href="delBooks.php?id=<?php echo $q['id'] * 123 * 123 ?>" <button class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash"></i> Hapus Buku</button>

                        <a href="index.php">
                            <button type="button" class="btn btn-default btn-sm btn-flat float-right">Batal</button>
                        </a>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>

        <!-- /.card -->

<?php
    }
}
include("footer.php"); ?>