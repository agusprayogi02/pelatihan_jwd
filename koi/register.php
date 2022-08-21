<?php
session_start();
include "conn.php";

if (isset($_SESSION['level'])) {
  if ($_SESSION['level'] === 'admin') {
    header("Location: admin/index.php");
  } else if ($_SESSION['level'] === 'user') {
    header("Location: index.php");
  }
}

if (isset($_POST['register'])) {
  $email = $_POST['email'];
  $query = "SELECT * FROM user WHERE email = '$email'";
  $result = query($query);
  if (empty(count($result))) {
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $name = $_POST['full_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $query = "INSERT INTO user (email, password, full_name, address, phone) VALUES ('$email', '$password', '$name', '$address', '$phone')";
    $result = $db->query($query);
    if ($result) {
      $query = "SELECT * FROM user WHERE email = '$email'";
      $user = query($query)[0];
      $_SESSION['level'] = 'user';
      $_SESSION['email'] = $email;
      $_SESSION['user'] = $name;
      $_SESSION['id'] = $user['uid'];
      $success = "Berhasil mendaftar !";
    } else {
      $error = "Gagal mendaftar!";
    }
  } else {
    $error = "Email sudah terdaftar!";
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KOIGus | Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= baseURL('plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= baseURL('plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= baseURL('plugins/sweetalert2/sweetalert2.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= baseURL('dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="<?= baseURL('index.php'); ?>" class="h1"><b class="text-primary">KOI</b>Gus</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="" method="POST">
          <div class="input-group mb-3">
            <input name="full_name" type="text" class="form-control" placeholder="Nama Lengkap" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="email" type="email" class="form-control" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="address" type="text" class="form-control" placeholder="Alamat" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-address-book"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="phone" type="number" class="form-control" placeholder="No HP" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="password" minlength="8" type="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                <label for="agreeTerms">
                  I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <a href="login.php" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="<?= baseURL('plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= baseURL('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= baseURL('dist/js/adminlte.min.js') ?>"></script>
  <script src="<?= baseURL("plugins/sweetalert2/sweetalert2.min.js"); ?>"></script>
  <script>
    $(async () => {
      var Toast = Swal.mixin({
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true
      });
      <?php if (isset($error)) { ?>
        Toast.fire({
          icon: 'error',
          title: '<?= $error ?>',
          text: $(this).data('message')
        });
      <?php } else if (isset($success)) { ?>
        await Toast.fire({
          icon: 'success',
          title: '<?= $success ?>',
          text: $(this).data('message')
        });
        location.replace("index.php");
      <?php } ?>
    });
  </script>

</body>

</html>