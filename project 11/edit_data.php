<?php

include "koneksi.php";
$id = $_GET['id'];
$tampil = mysqli_query($mysqli, "select * from identitas where id='$id'");
$hasil = mysqli_fetch_array($tampil);

?>
<h2>LATIHAN EDIT DATA DARI DATABASE</h2>
<form method="post" action="proses_edit.php?id=<?= $id; ?>">
    <table>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value="<?php echo $hasil['nama'] ?>"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
                <input type="radio" <?php if ($hasil['jeniskelamin'] == "laki-laki") {
                                        echo "checked";
                                    } ?> name="jeniskelamin" value="laki-laki">Laki-laki
                <input type="radio" <?php if ($hasil['jeniskelamin'] == "perempuan") {
                                        echo "checked";
                                    } ?> name="jeniskelamin" value="perempuan">Perempuan
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat" value="<?php echo $hasil['alamat'] ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="kirim"></td>
        </tr>
    </table>
</form>