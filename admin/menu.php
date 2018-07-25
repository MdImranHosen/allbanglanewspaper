<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php
include "../classes/Menu.php";
$menu = new Menu();
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include "inc/header_bottom.php"; ?>
  <!-- Left side column. contains the logo and sidebar -->
<!--SideBar Start-->
  <?php include "inc/sidebar.php"; ?>
<!--SideBar End-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <section class="col-lg-12 connectedSortable">
          <div class="box">
            <div class="box-header">
              <i class="fa fa-list-ul"></i>

              <h3 class="box-title">Menu List</h3>
            </div>
            <!-- /.box-header -->
            <!-- /.box-body -->
            <div class="nav-tabs-custom">
          <?php
          function loop_array($array = array(), $menu_id = 0){
            if (!empty($array[$menu_id])) {
              echo '<ul class="nav nav-tabs">';
              foreach ($array[$menu_id] as $items) { ?>
                <li class="dropdown">
                <a class="dropdown-toggle" target="_blank" href="<?php echo $items['tbl_url']; ?>">
                   <?php echo $items['name']; ?>
                    </a>
                   <?php   loop_array($array, $items['id']); ?>
                
              </li>
               <?php  }
                
              echo '</ul>';
            }
          }

          $result = $menu->dispaly_menus();
            $array = array();
            if ($result) {
              while ($rows = $result->fetch_assoc()) {
                $array[$rows['menu_id']][] = $rows;
              }
              loop_array($array);
            }
           
          ?>

          </div>
         </div>
        </section>
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
      </div>

      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"; ?>
