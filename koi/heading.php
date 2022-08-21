<?php

if (isset($_POST['logOut'])) {
    session_destroy();
    header("Location: " . baseURL('index.php'));
}

$url = baseURL('index.php?page=');
$pages = array(
    array(
        'url' => 'index.php?page=',
        'bagian' => 'Home',
        'title' => "Data Koi",
        'icon' => 'fas fa-fish',
        'pages' => array(
            array(
                'title' => 'Dashboard',
                'page' => 'dataKoi'
            ),
        ),
    ),
    array(
        'url' => 'index.php?page=',
        'bagian' => 'Transaksi',
        'title' => 'Transaksi',
        'icon' => 'fas fa-chart-bar',
        'pages' => array(
            array(
                'title' => 'Keranjang',
                'page' => 'pembelian'
            ),
            array(
                'title' => 'Histori Pembelian',
                'page' => 'history'
            ),
        ),
    ),
);

if (isset($_SESSION['level'])) {
    if ($_SESSION['level'] === 'admin') {
        $url = baseURL('admin/index.php?page=');
        $pages = array(
            array(
                'bagian' => 'Home',
                'title' => "Koi",
                'icon' => 'fas fa-fish',
                'pages' => array(
                    array(
                        'title' => 'Dashboard',
                        'page' => 'dataKoi'
                    ),
                    array(
                        'title' => 'Tambah Data Koi',
                        'page' => 'tambahKoi'
                    ),
                ),
            ),
            array(
                'bagian' => 'Transaksi',
                'title' => 'Transaksi',
                'icon' => 'fas fa-chart-bar',
                'pages' => array(
                    array(
                        'title' => 'Pesanan', // digunakan untuk status 2
                        'page' => 'pesanan'
                    ),
                    array(
                        'title' => 'Histori Pesanan', // digunakan untuk status 3
                        'page' => 'history'
                    ),
                ),
            ),
            array(
                'bagian' => 'Users',
                'title' => 'Users',
                'icon' => 'fas fa-users',
                'pages' => array(
                    array(
                        'title' => 'Data Users',
                        'page' => 'user'
                    ),
                ),
            ),
        );
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? "KOIGus" ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= baseURL('plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= baseURL('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= baseURL('plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= baseURL('plugins/jqvmap/jqvmap.min.css') ?>">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= baseURL('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= baseURL('plugins/daterangepicker/daterangepicker.css') ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= baseURL('plugins/summernote/summernote-bs4.min.css') ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= baseURL('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= baseURL('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= baseURL('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= baseURL('plugins/select2/css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?= baseURL('plugins/sweetalert2/sweetalert2.min.css'); ?>">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= baseURL('dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= baseURL('dist/img/AdminLTELogo.png') ?>" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link"><?= $bagian ?? "Home"; ?></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" data-toggle="dropdown">
                        <i class="fas fa-user"></i> <?= $_SESSION['user'] ?? "Guest"; ?>
                    </a>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-id-card mr-2"></i> Profil
                            </a>
                            <div class="dropdown-divider"></div>
                            <form action="" method="post">
                                <button type="submit" name="logOut" class="dropdown-item">
                                    <i class="fas fa-user mr-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    <?php else : ?>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                            <a href="<?= baseURL('login.php'); ?>" class="dropdown-item">
                                <i class="fas fa-id-card mr-2"></i> Login
                            </a>
                        </div>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-success elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="<?= baseURL('image/koi.jpg') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span><b class="text-primary">KOI</b>Gus</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= baseURL('dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $_SESSION['level'] ?? "Guest"; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                        <?php
                        foreach ($pages as $pg) :
                        ?>
                            <li class="nav-item <?= $bagian == $pg['bagian'] ? 'menu-open' : ''; ?>">
                                <a href="#" class="nav-link <?= $bagian == $pg['bagian'] ? 'menu-open active' : ''; ?>">
                                    <i class="nav-icon <?= $pg['icon']; ?>"></i>
                                    <p>
                                        <?= $pg['title']; ?>
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview">
                                    <?php foreach ($pg['pages'] as $p) : ?>
                                        <li class="nav-item">
                                            <a href="<?= $url . $p['page']; ?>" class="nav-link <?= $pageName == $p['page'] ? 'active' : ''; ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p><?= $p['title']; ?></p>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $page ?? "Dashboard"; ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"><?= $bagian; ?></a></li>
                                <li class="breadcrumb-item active"><?= $page; ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">