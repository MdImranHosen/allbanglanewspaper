<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php
include "../classes/Menu.php";
$menu = new Menu();
 #Add Main Menu post method data pass.. 
/*if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) { 

    $menuAddMsg = $menu->getAddMenu($_POST);
} */
?>
<?php 
# Delete menu Catch action Code....
 if (isset($_GET['actionDelete']) && $_GET['actionDelete']) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['actionDelete']);
    $id = (int)$id;
    $getDeleteMsg = $menu->getDeleteMenu($id);
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
        <!-- Left col -->
      <!--  <section class="col-lg-4 connectedSortable">
          
        <?php 
        # Menu Add Massage Show..
        /*  if (isset($menuAddMsg)) {
            echo $menuAddMsg;
          } */
        ?> -->

         
                    
       <!--   <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-plus-square"></i>

              <h3 class="box-title">Menu</h3> -->
              <!-- tools box -->
             <!-- <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>-->
              <!-- /. tools -->
         <!--   </div>
            <form action="<?php # echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div class="box-body">
                <div class="form-group">
                 <input type="text" class="form-control" name="name" placeholder="Add Menu Name! ">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control" name="tbl_url" placeholder="Add URL! ">
                </div>
                <input type="hidden" name="menu_id" value="0" />
            <div class="box-footer">
              <button type="submit" name="submit" class="pull-right btn btn-success" id="sendEmail">Add</button>
            </div>
          </div>
           </form>
          </div>
          
        </section> -->
        <!-- /.Left col -->
        <section class="col-lg-12 col-md-12 col-sm-12 connectedSortable">
          <div id="deleteMassagetimeout">
          <?php
           if (isset($getDeleteMsg)) {
             echo $getDeleteMsg;
           }
          ?>
          </div>
          <div class="box">
            <div class="box-header">
             
               <i class="fa fa-list-ul"></i>
               <h3 class="box-title">Menu List</h3>
               
               <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus-square"></i>
                Add Main Menu 
               </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th width="15%">Menu Name</th>
                  <th>Website Url</th>
                  <th>Main Menu</th>
                  <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $result = $menu->getMenuSelect();
                     $i = 0;
                     if ($result) {
                        while ($rows = $result->fetch_assoc()) {
                          $i++;
                  ?>
               <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $rows['name']; ?></td>
                  <td><?php echo $rows['tbl_url']; ?></td>
                <td>
                   <?php 
                      $menu_id   = $rows['menu_id'];
                      $rowResult = $menu->getMenuRowResult($menu_id);
                      if ($rowResult) {
                        while ($rowData = $rowResult->fetch_assoc()) {
                         echo  $rowData['name'];
                        }
                      }

                   ?>
                  </td>
                  <td class="menu_defarent">
                  <!--  <button type="button" class="edit_data" data-toggle="modal" data-target="#modal-default" name="addSub" value="addSub" id="<?php # $rows['id']; ?>">Add</button> -->
                    <span><a href="addsubmenu.php?submenuadd=<?php echo $rows['id']; ?>" >+SM </a></span>
                    <span><a href="editSubmenu.php?edit_menu=<?php echo $rows['id']; ?>"><i class="glyphicon glyphicon-edit"></i></a></span>
                    <span><a class="btn_delete" href="?actionDelete=<?php echo $rows['id']; ?>"><i class="glyphicon glyphicon-trash"></i></a></span>
                  </td>
                </tr>
                 <?php } } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </section>
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
      </div>

      <!-- /.row (main row) -->
      <!-- Add and Edit Menu and Sub Menu .. Start..-->
      <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="post" action="">
              <div class="modal-header">
                <button type="button" class="close" onclick="Redirect();" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Menu</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                 <input type="text" class="form-control" id="addmenuname" name="addmenuname" placeholder="Add Menu Name! ">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control" id="addmenu_url" name="addmenu_url" placeholder="Add URL! ">
                </div>
                <input type="hidden" name="menu_id_add" id="menu_id_add" value="0" />
                </div>
              <div class="modal-footer">
                <button type="button" onclick="Redirect();" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
               <button type="submit" name="addmenu" id="addmenu" class="btn btn-primary">Add</button> 
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
             <span id="state"></span>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      <!-- Add and Edit Menu and Sub Menu .. End ..--> 

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"; ?>
