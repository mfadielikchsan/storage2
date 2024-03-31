<!DOCTYPE html>
<html lang="en">
  <!-- Icon logo -->
  <link rel="icon" type="image/ico" href="../favicon.ico" />
  
<?php 
session_start();

// Periksa jika pengguna tidak masuk, redirect ke halaman login
if (!isset($_SESSION['user_id'])) {
  header("Location: ../index.php?session=expired");
  exit();
}

// Periksa peran pengguna
$userRole = $_SESSION['user_role'];

// Redirect berdasarkan peran pengguna
switch ($userRole) {
  case 1:
      // Admin, lanjutkan dengan kode HTML yang ada
  ?>
  <?php include('../conf/config.php');?>

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
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- Include necessary CSS and JavaScript libraries for select2 and dynamic table -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
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
    <!-- SELECT2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
          if ($_GET['page']=='dashboard-admin'){
            include('dashboard/dashboard_admin.php');
          }
          else if($_GET['page']=='data-users'){
            include('data/data_users.php');
          }
          else if($_GET['page']=='data-mesin'){
            include('data/data_mesin.php');
          }
          else if($_GET['page']=='data-form'){
            include('data/data_form_kerja.php');
          }
          else if($_GET['page']=='data-formitem'){
            include('data/data_form_item.php');
          }
          else if($_GET['page']=='data-formitem2'){
            include('data/data_form_item2.php');
          }
          else if($_GET['page']=='data-forminstruksikerja'){
            include('data/data_form_instruksikerja.php');
          }
          else if($_GET['page']=='data-add-ik'){
            include('data/data_add_ik.php');
          }
          else if($_GET['page']=='data-instruksikerja'){
            include('data/data_instruksikerja.php');
          }
          else if($_GET['page']=='data-bagiankerja'){
            include('data/data_bagian_kerja.php');
          }
          else if($_GET['page']=='data-itemkerja'){
            include('data/data_item_kerja.php');
          }
          else if($_GET['page']=='data-tipe'){
            include('data/data_tipe_mesin.php');
          }
          else if($_GET['page']=='data-preventive'){
            include('data/data_preventive.php');
          }
          else if($_GET['page']=='data-tanggalan'){
            include('data/data_tanggalan.php');
          }
          else if($_GET['page']=='data-schedule'){
            include('data/data_schedule.php');
          }
          else if($_GET['page']=='data-kategori-mesin'){
            include('data/data_kategori_mesin.php');
          }
          else if($_GET['page']=='data-jadwal'){
            include('data/data_jadwal.php');
          }
          else if($_GET['page']=='edit-mesin'){
            include('edit/edit_mesin.php');
          }
          else if($_GET['page']=='edit-preventive'){
            include('edit/edit_preventive.php');
          }
          else if($_GET['page']=='edit-pengecekan'){
            include('edit/edit_bagian_pengecekan.php');
          }
          else if($_GET['page']=='edit-pengecekan2'){
            include('edit/edit_bagian_pengecekan2.php');
          }
          else if($_GET['page']=='edit-pengecekan-jadwal'){
            include('edit/edit_jadwal_pengecekan.php');
          }
           else if($_GET['page']=='edit-pengecekan-instruksi'){
            include('edit/edit_instruksi_pengecekan.php');
          }
          else if($_GET['page']=='edit-instruksikerja'){
            include('edit/edit_instruksikerja.php');
          }
          else if($_GET['page']=='edit-bagiankerja'){
            include('edit/edit_bagiankerja.php');
          }
          else if($_GET['page']=='edit-itemkerja'){
            include('edit/edit_itemkerja.php');
          }
          else if($_GET['page']=='tambah-form'){
            include('add/tambah_form_mesin.php');
          }
          else if($_GET['page']=='edit-users'){
            include('edit/edit_users.php');
          }
          else if($_GET['page']=='edit-kategori'){
            include('edit/edit_kategori_mesin.php');
          }
          else{
            include('not_found.php');
        } 
        }
          else{
            include('dashboard/dashboard_admin.php');
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
        header("Location: ../unauthorized.php");

        exit();
                              }
?>
