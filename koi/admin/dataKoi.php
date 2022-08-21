<div class="card">
    <div class="card-header">
        <div class="row">
            <p class="col h4">Data Koi</p>
            <div class="col text-right">
                <a href="index.php?page=tambahKoi" class="btn btn-flat btn-sm btn-outline-success">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="table_koi" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 10px;">No</th>
                    <th>Action</th>
                    <th>Nama Ikan</th>
                    <th>Harga</th>
                    <th>Ukuran</th>
                    <th>Kategori</th>
                    <th style="width: 15px;">STOK</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $queryText = "SELECT c.name as kategori, fish.name as fish_name, fish.id, fish.stock, fish.price, fish.size FROM fish inner join category as c on fish.category_id = c.id WHERE fish.uid = " . $_SESSION['id'] . " AND isDelete = 0";
                $query = query($queryText);
                $no = 0;
                foreach ($query as $q) :
                    $no++;

                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td class="text-center">
                            <a href="index.php?page=updateKoi&id=<?= $q['id'] * 22 * 22 * 103 ?>" class="btn btn-outline-warning btn-xs mr-2"><i class="fa fa-edit"></i> Ubah</a>
                            <button data-koi="<?= base64_encode($q['id'] . '?=?' . $q['fish_name']); ?>" class="btn btn-outline-danger btn-xs delete-koi"><i class="fa fa-trash"> Hapus</i>
                            </button>
                        </td>
                        <td><?= $q['fish_name'] ?></td>
                        <td><?= $q['price'] ?></td>
                        <td><?= $q['size'] ?></td>
                        <td><?= $q['kategori'] ?></td>
                        <td><?= $q['stock'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>