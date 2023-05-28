<?php 
echo '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
    <span class="brand-text font-weight-light"><strong><b>Bilal<i> Beleke</strong> ART</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="admin.php" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="assets/backend/barang.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Barang
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="assets/backend/kategori.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kategori
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="assets/backend/ongkir.php" class="nav-link">
              <i class="fas fa-paper-plane"></i>
              <p>
                Ongkir
                
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="fas fa-shopping-cart"></i>
              <p>
                Transaksi 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="assets/backend/pesanan.php" class="nav-link">
                  <i class="fas fa-shopping-basket"></i>
                  <p>Pesanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="assets/backend/status.php" class="nav-link">
                  <i class="fas fa-dolly-flatbed"></i>
                  <p>Status</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="assets/backend/pembayaran.php" class="nav-link">
                  <i class="fas fa-credit-card"></i>
                  <p>Pembayaran</p>
                </a>
              </li>
        </ul>
        <li class="nav-item">
            <a href="assets/backend/invoice.php" class="nav-link">
             <i class="fas fa-receipt"></i>
              <p>
                Invoice
              </p>
            </a>
          </li>
        <li class="nav-item">
            <a href="assets/backend/logout.php" class="nav-link">
             <i class="fas fa-sign-out-alt"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->';
?>