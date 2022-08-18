<div class="card">
    <div class="card-header row">
        <p class="col h4">Data Koi</p>
        <div class="col text-right">
            <a href="index.php?page=tambahKoi" class="btn btn-flat btn-sm btn-outline-success">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>
    </div>
    <div class="card-body">
        <table id="table_koi" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th style="width: 10px;">No</th>
                <th style="width: 10px;"></th>
                <th>Nama Ikan</th>
                <th>Harga</th>
                <th>Ukuran</th>
                <th>Kategori</th>
                <th style="width: 15px;">STOK</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $queryText = "SELECT c.name as kategori, fish.name as fish_name, fish.id, fish.stock, fish.price, fish.size FROM fish inner join category as c on fish.category_id = c.id";
            $query = query($queryText);
            $no = 0;
            foreach ($query as $q) :
                $no++;

                ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td class="text-center">
                        <a href="uptBooks.php?id=<?php echo $q['id'] * 123 * 123 ?>"
                        <button class="btn btn-outline-warning btn-flat btn-xs"><i class="fa fa-edit"></i></button>

                    </td>
                    <td><?php echo $q['fish_name'] ?></td>
                    <td><?php echo $q['price'] ?></td>
                    <td><?php echo $q['size'] ?></td>
                    <td><?php echo $q['kategori'] ?></td>
                    <td><?php echo $q['stock'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>