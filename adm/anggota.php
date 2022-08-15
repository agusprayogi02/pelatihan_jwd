<?php

$lmenu = "anggota";
$judul = "Data Anggota Perpustakaan";
$rmenu = ["Home", "Anggota"];
$rlink = ["index.php", "anggota.php"];

include("head.php");
include("koneksi.php");
?>


<div class="row m-1">
    <a href="addAnggota.php">

        <button class="btn btn-flat btn-sm btn-success"><i class="fas fa-plus"></i> Tambah Data</button>
    </a>
</div>
<div class="card col-md-8">

    <div class="card-header">
        Data Anggota
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 10px;">No</th>
                    <th style="width: 10px;"></th>
                    <th>Nama Anggota</th>
                    <th>Alamat </th>
                    <th style="width: 15px;">Status</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $query = $db->query("select * from anggota where status<2");
                $no = 0;
                foreach ($query as $q) {
                    $no++;

                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td class="text-center">
                            <a href="uptBooks.php?id=<?php echo $q['id'] * 123 * 123 ?>" <button class="btn btn-success btn-flat btn-xs"><i class="fa fa-edit"></i></button>

                        </td>
                        <td><?php echo $q['nama'] ?> </td>
                        <td><?php echo $q['alamat'] ?></td>
                        <td><?php echo $q['status'] ?></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include("footer.php"); ?>