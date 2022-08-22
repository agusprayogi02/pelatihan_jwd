<?php
if (!isset($_SESSION)) {
    session_start();
} ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success p-1">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">JWD 2022</a>

        </div>
    </nav>
    <?php if (isset($_SESSION['nama'])) {
        header('location:adm/dashboard.php');
    } ?>
    <div class="container">
        <div class="row">
            <form action="login.php" method="POST" class="p-4">

                <div class="col-md-5 mx-auto border p-4">
                    <?php if (isset($pesan)) { ?>


                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?php echo $pesan; ?>.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>


                    <?php } ?>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jenis</label>
                        <select class="form-control" name="tlevel">
                            <option value="">--Pilih Jenis--</option>
                            <option value="1">Admin</option>
                            <option value="2">Anggota</option>
                        </select>
                        <!-- <input name="tuser" type="email" class="form-control" id="exampleFormControlInput1" placeholder="E-mail" required> -->
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input name="tuser" type="email" class="form-control" id="exampleFormControlInput1" placeholder="E-mail" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input name="tpass" type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password" required>
                    </div>
                    <div class="mb-3 ">

                        <input type="submit" class="btn btn-success ml-auto" id="exampleFormControlInput1" value="Login">
                    </div>
                </div>
            </form>
        </div>

    </div>

    <footer class="bg-success bg-gradient p-2 text-center text-white  fixed-bottom">@jwd2012</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>