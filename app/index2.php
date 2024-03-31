<?php
session_start();

// Periksa jika pengguna tidak masuk, redirect ke halaman login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index2.php?session=expired");
    exit();
}

// Periksa peran pengguna
$userRole = $_SESSION['user_role'];

// Redirect berdasarkan peran pengguna
switch ($userRole) {
    case 1:
        // Admin, lanjutkan dengan kode HTML yang ada
        ?>
        <?php
        break;
    case 2:
        // Supervisor, lanjutkan dengan kode HTML yang sesuai
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
    <!-- Tempusdominus Bootstrap 4 -->
    <link
      rel="stylesheet"
      href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"
    />
    <!-- iCheck -->
    <link
      rel="stylesheet"
      href="plugins/icheck-bootstrap/icheck-bootstrap.min.css"
    />
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css" />
    <!-- overlayScrollbars -->
    <link
      rel="stylesheet"
      href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css"
    />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  </head>

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Preloader -->
      <?php include('preloader.php');?>

      <!-- Navbar -->
      <?php include('navbar.php');?>
      <!-- /Navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
      
      <!-- Brand Logo -->
      <?php include('logo.php');?>

        <!-- Sidebar -->
        <?php include('sidebar.php');?>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php include('content_header.php');?>
        <!-- /.content-header -->

        <!-- Main content admin-->
        <?php 
        // include('data_mesin.php');
        if (isset($_GET['page'])){
          if ($_GET['page']=='dashboard-supervisor'){
            include('dashboard/dashboard_supervisor.php');
          }
          else if($_GET['page']=='data-users'){
            include('data/data_users.php');
          }
          else if($_GET['page']=='data-mesin'){
            include('data/data_mesin.php');
          }
          else if($_GET['page']=='data-jadwal'){
            include('data/data_jadwal.php');
          }
          else if($_GET['page']=='edit-mesin'){
            include('edit/edit_mesin.php');
          }
          else if($_GET['page']=='edit-users'){
            include('edit/edit_users.php');
          }
          else{
            include('not_found.php');
        } 
        }
          else{
            include('dashboard/dashboard_supervisor.php');
        } 
        ?>
        <!-- /.content -->
      </div>

      
      <!-- /.content-wrapper -->
      <!-- Footer -->
      <?php include('footer.php');?>
      <!-- /Footer -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

  </body>
</html>
        <?php
        break;
    default:
        // Untuk peran lain, redirect ke halaman yang sesuai atau tampilkan pesan kesalahan
        header("Location: unauthorized.php");
        exit();
}
?>
