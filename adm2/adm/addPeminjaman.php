<?php
$lmenu = "transaksi";
$sbLmenu = "pinjam";
$judul = "Form Peminjaman ";
$rmenu = ["Home", "Pinjam"];
$rlink = ["index.php", "dataPeminjaman.php"];
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
<div class="card card-default col-md-8 p-0 mx-auto">
    <div class="card-header ">
        <h3 class="card-title"></h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="addPeminjaman_.php" method="POST">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nama Anggota</label>
                        <select name="tanggota" class="form-control select2" style="width: 100%;" required>
                            <option value=""></option>

                            <?php
                            $query = $db->query("select * from anggota");

                            foreach ($query as $q) { ?>
                                <option value="<?php echo $q['id'] ?>"><?php echo $q['nama'] ?> (<?php echo $q['alamat'] ?>)</option>
                            <?php  } ?>

                        </select>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nama Buku</label>
                        <select name="tbuku" class="form-control select2" style="width: 100%;" required>
                            <option value=""></option>
                            <?php
                            $query = $db->query("select * from buku");

                            foreach ($query as $q) { ?>
                                <option value="<?php echo $q['id'] ?>"><?php echo $q['judul'] ?> (<?php echo $q['kode'] ?>)</option>
                            <?php  } ?>
                        </select>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input name="tpinjam" type="date" class="form-control" value="<?php echo date("Y-m-d") ?>">
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        $tgl1 = date("Y-m-d");
                        $tgl2 = date('Y-m-d', strtotime('+1 month', strtotime($tgl1)));
                        ?>
                        <label>Tanggal Kembali</label>
                        <input name="tkembali" type="date" class="form-control" value="<?php echo $tgl2  ?>">
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">

                        <button class="btn btn-flat btn-success"><i class="fa fa-save" class="form-control"></i> Simpan Data</button>

                    </div>
                </div>


            </div>
        </form>

    </div>

</div>

<?php include("footer.php"); ?>