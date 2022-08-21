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

if (isset($_POST['signIn'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $query = "SELECT * FROM user WHERE email = '$email'";
  $result = query($query);
  if (count($result) < 0) {
    $error = "Email tidak terdaftar!";
  } else {
    $user = $result[0];
    if ($user['status'] == 0) {
      $error = "Akun anda diblokir oleh admin!";
    } else {
      $checkPW = password_verify($password, $user['password']);

      if ($checkPW) {
        $_SESSION['level'] = $user['level'];
        if ($_SESSION['level'] === 'admin') {
          $url = baseURL('admin/index.php');
        } else if ($_SESSION['level'] === 'user') {
          $url = baseURL('index.php');
        }
        $_SESSION['email'] = $email;
        $_SESSION['user'] = $user['full_name'];
        $_SESSION['id'] = $user['uid'];
        $success = "Berhasil masuk dengan email $email!";
      } else {
        $error = "Password anda salah!";
      }
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KOiGus | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?= baseURL('plugins/sweetalert2/sweetalert2.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="<?= baseURL('index.php'); ?>" class="h1"><b class="text-primary">KOI</b>Gus</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="login.php" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="signIn" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mb-0">
          <a href="register.php" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
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
        location.replace('<?= $url ?>');
      <?php } ?>
    });
  </script>
</body>

</html>