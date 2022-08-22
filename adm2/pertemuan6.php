<style>
	form {
		width: 50%;
		margin-left: auto;
		margin-right: auto;
		margin-top: 5%;
		background: lightyellow;
	}

	input {
		width: 100%;
		padding: 5px;
		margin-bottom: 5px;
	}

	.radio {
		width: 20%;
	}
</style>
<form action="pertemuan6.php" method="POST">
	<input type="text" name="nama" class="nama" placeholder="Nama ... " required>
	<input name="kelas" value="JWD A" type="radio" class="kelas">JWD A
	<input name="kelas" Value="jwd B" type="radio" class="kelas">JWD B
	<input type="number" name="umur" class="umur" placeholder="Umur ... " required>
	<input name="simpan" type="submit" value="simpan">
</form>


<?php
$db = mysqli_connect("localhost", "root", "", "jwd") or die("Koneksi database gagal");

if (isset($_POST['simpan'])) {
	echo "asdsg";
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$umur = $_POST['umur'];
	//	$ = $_POST['umur'];

	$db->query("INSERT INTO peserta(nama,kelas,umur) values('$nama','$kelas','$umur')");

	if ($db) {
		header("location: pertemuan6.php");
	} else {
		echo "gagal input data";
	}
}

$query = $db->query("SELECT * FROM peserta") or die("tabel gagal tampil");


// $query=$db->query("select*from peserta") or die("Konek tabel gagal");

//  $db->query("delete from peserta");
// if(isset($_POST['tnama'])){

// 	$db->query("delete from peserta where nama='".$_GET['nama']."'");
// 	header('location:pertemuan6.php');
// }
// foreach($query as $q){
// echo $q['nama']."<a href='?nama=".$q['nama']."'>Hapus<a><br>";
// }

foreach ($query as $q) {

	echo $q['nama'] . "<a href= '?nama'" . $q['nama'] . "'>Hapus<a><br>";
}
?>