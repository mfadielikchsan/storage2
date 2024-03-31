<?php 
$roleNames = [
  1 => 'admin',
  2 => 'supervisor',
  3 => 'foreman',
  4 => 'operator',
];
?>
<div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img
                src="dist/img/user2-160x160.jpg"
                class="img-circle elevation-2"
                alt="User Image"
              />
            </div>
            <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['user_nama'].' | '.$roleNames[$_SESSION['user_role']];?></a>
            </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input
                class="form-control form-control-sidebar"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <!-- Sidebar Menu -->
            <?php
            if (isset($_SESSION['user_role'])) {
                switch ($_SESSION['user_role']) {
            case 1:
                include('menu/menu_admin.php');
                break;
            case 2:
                include('menu/menu_supervisor.php');
                break;
            case 3:
                include('menu/menu_foreman.php');
                break;
            case 4:
                include('menu/menu_operator.php');
                break;
            default:
                // Tangani peran lain jika diperlukan
                break;
        }
    }
    ?>
          <!-- /.sidebar-menu -->
        </div>