<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ave Hijup</title>

  <!-- Custom fonts for this template -->
  <link href="<?= base_url('assets/admin/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/admin/font/font.css'); ?>" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/admin/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?= base_url('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
  <!-- Icofont -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/icofont/icofont.min.css'); ?>">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="icofont-grocery"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Ave Hijup</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
          <i class="icofont-home"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin_akun') ?>">
          <i class="icofont-support"></i>
          <span>Akun Admin</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin_customer') ?>">
          <i class="icofont-users-alt-3"></i>
          <span>Customer</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin_kategori_produk') ?>">
          <i class="icofont-bag"></i>
          <span>Kategori Produk</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin_produk') ?>">
          <i class="icofont-grocery"></i>
          <span>Produk</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin_testimoni') ?>">
          <i class="icofont-heart-eyes"></i>
          <span>Testimoni</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin_transaksi') ?>">
          <i class="icofont-ui-note"></i>
          <span>Transaksi</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
                <i class="icofont-user-alt-3" style="font-size:30px;"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('profile'); ?>">
                  <i class="icofont-id fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->