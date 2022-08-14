<?php
include 'koneksi.php';
include("header.php");
?>


<div class="row m-1">
    <a href="addBooks.php">

        <button class="btn btn-flat btn-sm btn-success"><i class="fas fa-plus"></i> Tambah Data</button>
    </a>
</div>
<div class="card">

    <div class="card-header">
        Data Buku Perpustakaan
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 8px;">No</th>
                    <th></th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>

                    <th style="width: 8px;">STOK</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $query = $db->query("select * from buku order by id DESC");
                $no = 0;
                foreach ($query as $q) {
                    $no++;

                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td class="text-center">
                            <a href="uptBooks.php?id=<?php echo $q['id'] * 123 * 123 ?>" <button class="btn btn-success btn-flat btn-xs">
                                <i class="fa fa-edit"></i>
                                </button>

                        </td>

                        <td><?php echo $q['kode'] ?> </td>
                        <td><?php echo $q['judul'] ?></td>
                        <td><?php echo $q['pengarang'] ?></td>
                        <td><?php echo $q['penerbit'] ?></td>
                        <td><?php echo $q['jumlah'] ?></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include("footer.php"); ?>