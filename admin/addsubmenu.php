<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php
include "../classes/Menu.php";
$menu = new Menu();

 #Sub Menu Table Edite Action Get..
 if (!isset($_GET['submenuadd']) || $_GET['submenuadd'] == NULL) {
      header("Location:menu_list.php");
 } else{
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['submenuadd']);
    $id = (int)$id;
 }

 #Add Main Menu post method data pass.. 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submenu'])) {

    $menuSubMsg = $menu->getAddSubMenu($_POST, $id);
}
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
         <section class="col-lg-12 col-sm-12 connectedSortable">
          <?php
             if (isset($menuSubMsg)) {
               echo $menuSubMsg;
               echo "<script>window.location.href = 'menu_list.php';</script>";
             }
          ?>
          <form action="" method="post">
            <div class="box-body">
                <div class="form-group">
                 <input type="text" class="form-control" name="subname" placeholder="Enter Sub Menu Name.." >
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="submenu_url" placeholder=" Website URL...">
                </div>
                  <input type="hidden" class="form-control" name="submenu_id" />
                <div class="box-footer">
                <button type="submit" name="submenu" class="pull-right btn btn-success" id="sendEmail">Add SubMenu</button>
               </div>
          </div>
           </form>
         </section>
      </div>

      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"; ?>
