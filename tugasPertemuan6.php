<?php
$con = mysqli_connect("localhost", "root", "admin123", "jwd_b");

// Check connection error
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


if (isset($_POST['submit'])) {
	// var_dump($_POST);
	// die();
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$umur = $_POST['umur'];

	$rest = $con->query("INSERT INTO peserta VALUES (null,'" . $nama . "','" . $kelas . "'," . $umur . ")") or die($con->error);
	if ($rest) {
		echo "<script>alert('Data berhasil ditambahkan!!');</script>";
	} else {
		echo "<script>alert('Data gagal ditambahkan!!');</script>";
	}
}


?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pertemuan 6 Agus Prayogi</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
	<h1 class="text-center mt-4">Form Sederhana</h1>
	<center>
		<form method="POST" action="" class="card m-5 p-3 col-md-4 text-start">

			<label for="nama" class="form-label">Nama Lengkap</label>
			<input type="text" class="form-control" name="nama" id="nama" required placeholder="Nama Lengkap...">

			<div class="row my-3 mx-1">
				<div class="form-check col-md">
					<input type="radio" class="form-check-input" id="kelasa" name="kelas" value="Kelas JWD A" required>
					<label class="form-check-label" for="kelasa">Kelas JWD A</label>
				</div>
				<div class="form-check col-md">
					<input type="radio" class="form-check-input" id="kelasb" name="kelas" value="Kelas JWD B" required>
					<label class="form-check-label" for="kelasb">Kelas JWD B</label>
				</div>
			</div>
			<div class="mb-3">
				<label for="umur" class="form-label">Umur</label>
				<input type="number" name="umur" class="form-control" id="umur" placeholder="Umur..." required>
			</div>
			<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
		</form>
	</center>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>