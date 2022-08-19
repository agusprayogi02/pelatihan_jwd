<?php

$lmenu = "transaksi";
$sbLmenu = "pinjam";
$judul = "Data Transaksi Peminjaman ";
$rmenu = ["Home", "Pinjam"];
$rlink = ["index.php", "dataPeminjaman.php"];

include("head.php");
include("koneksi.php");
?>


<div class="row m-1">
    <a href="addPeminjaman.php">

        <button class="btn btn-flat btn-sm btn-success"><i class="fas fa-plus"></i> Tambah Data</button>
    </a>
</div>
<div class="card col-md-11">

    <div class="card-header">
        Data Peminjaman
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 10px;">No</th>
                    <th style="width: 10px;"></th>
                    <th>Nama Anggota</th>
                    <th>Nama Buku </th>
                    <th style="width: 15px;">Status</th>
                    <th style="width: 15px;">Tanggal Pinjam</th>
                    <th style="width: 15px;">Tanggal Kembali</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $query = $db->query("select anggota.nama, buku.judul,transaksi.status,transaksi.tglpinjam,transaksi.tglkembali 
                from transaksi inner join anggota on transaksi.idanggota=anggota.id inner join buku on transaksi.idbuku=buku.id");
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
                        <td><?php echo $q['judul'] ?></td>
                        <td class="text-center"><?php

                                                $waktuawal = date_create(date('Y-m-d', strtotime($q['tglkembali']))); //waktu di setting
                                                $waktuakhir   = date_create(); //2019-02-21 09:35 waktu sekarang
                                                if ($waktuawal < $waktuakhir) {

                                                    $diff  = date_diff($waktuawal, $waktuakhir);
                                                    $telat = $diff->d;
                                                    if ($telat > 0) {
                                                        echo '<span class="badge bg-danger text-center">Telat ' . $telat   . ' hari</span>';
                                                    } else {
                                                        echo '<span class="badge bg-warning text-center">ok</span>';
                                                    }
                                                } else {
                                                    echo '<span class="badge bg-success text-center">Ok</span>';
                                                }


                                                ?></td>
                        <td class="text-center"><?php echo date("d M Y", strtotime($q['tglpinjam'])) ?></td>
                        <td><?php echo date("d M Y", strtotime($q['tglkembali'])) ?></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include("footer.php"); ?>