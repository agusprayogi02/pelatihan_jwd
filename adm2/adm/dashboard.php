<?php





include("head.php");
if (!isset($_SESSION['nama'])) {
    header('location:../');
}
include("koneksi.php");
?>


<div class="row">
    <div class="col-lg-4">
        <!-- small box -->
        <div class="small-box bg-teal">
            <div class="inner">
                <h3><?php if ($_SESSION['level'] == 1) {
                        echo 'Admin';
                    } else {
                        echo 'Anggota';
                    } ?></h3>

                <p><?php echo $_SESSION['nama'] ?></p>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>