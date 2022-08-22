<?php
$judul = "Form Input Data Anggota";
$rmenu = ["Home", "Anggota", "input anggota"];
$rlink = ["index.php", "anggota.php", "addAnggota.php"];
include("head.php");
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
        <h3 class="card-title">Input Data Anggota</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="addAnggota_.php" method="POST" enctype="multipart/form-data">
        <div class="card-body ">

            <!-- /.card -->

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Anggota</label>
                <div class="col-sm-9">
                    <input name="tnama" type="text" class="form-control" id="inputEmail3" placeholder="Nama Lengkap ..." required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">

                    <textarea name="talamat" class="form-control" placeholder="Alamat Anggota ..." required></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">User</label>
                <div class="col-sm-9">
                    <input name="tuser" type="email" class="form-control" id="inputEmail3" placeholder="User ..." required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input name="tpass" type="text" class="form-control" id="inputEmail3" placeholder="Password ..." required>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan Data Anggota</button>
            <button type="reset" class="btn btn-default float-right">Batal</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
<!-- /.card -->

<?php include("footer.php"); ?>