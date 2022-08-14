<?php

    include "koneksi.php";
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $alamat = $_POST['alamat'];

?>
<h2>LATIHAN MENAMPILKAN DATA DARI DATABASE DENGAN TABEL</h2>
<a href="file_input.php?id=<?php echo $hasil['id']; ?>">Tambah data</a>|
<table border="1">
    <tr>
        <td>Nomor</td>
        <td>Nama</td>
        <td>jenis Kelamin</td>
        <td>Alamat</td>
        <td>Aksi</td>
    </tr>
    <?php

        $tampil = mysqli_query($mysqli, "select * from identitas");
        $no = 1;
        while($hasil = mysqli_fetch_array($tampil)){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $hasil['nama']; ?></td>
        <td><?php echo $hasil['jeniskelamin']; ?></td>
        <td><?php echo $hasil['alamat']; ?></td>
        <td>
            <a href="edit_data.php?id=<?php echo $hasil['id']; ?>">edit</a>|
            <a href="hapus_data.php?id=<?php echo $hasil['id']; ?>">hapus</a>
        </td>
    </tr>
    <?php
        }
    ?>
</table>
