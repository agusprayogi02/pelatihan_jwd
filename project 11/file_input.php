<?php

    include "koneksi.php";
    $id = $_GET['id'];
    $tampil = mysqli_query($mysqli, "select * from identitas where id='$id'");
    $hasil = mysqli_fetch_array($tampil);

?>

<h2>LATIHAN INPUT DATA KE DALAM DATABASE</h2>
<form method="post" action="proses_input.php">
    <table>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
                <input type="radio" name="jeniskelamin" value="laki-laki">Laki-laki
                <input type="radio" name="jeniskelamin" value="perempuan">Perempuan
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="kirim"></td>
        </tr>
    </table>
</form>