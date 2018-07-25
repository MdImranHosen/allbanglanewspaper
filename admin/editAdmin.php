<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') { 
  header("Location:index.php");
} ?>
<?php
 include "../classes/Registration.php";
$reg = new Registration();

 #Admin Table Edite Action Get..
 if (!isset($_GET['edit_admin']) || $_GET['edit_admin'] == NULL) {
      header("Location:registration.php");
 } else{
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['edit_admin']);
    $id = (int)$id;
 }

   #Update Information Admin Id..
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $updateMsg = $reg->updateAdminId($_POST, $id);
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
      <!-- Small boxes (Stat box) -->
      <?php include "inc/topbar.php"; ?>
      <!-- Main row -->
      <div class="row">
         <?php
             if (isset($updateMsg)) {
               echo $updateMsg;
               echo "<script>
                setTimeout(function(){
                   window.location.href='registration.php'; 
                 },2000)</script>";
             }
           ?>
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <!-- /.nav-tabs-custom -->

          <!-- quick email widget -->
           <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-user-plus"></i>

              <h3 class="box-title">Edit  Admin</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <?php
               $getResust = $reg->getAdminTableBayId($id);
               if ($getResust) {
                 while ($editResult = $getResust->fetch_assoc()) {
                                 
            ?>
            <form action="" method="post">
            <div class="box-body">
                <div class="form-group">
                 <input type="text" class="form-control" name="name" value="<?php echo $editResult['name']; ?>">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="email" value="<?php echo $editResult['email']; ?>">
                </div>
                <div class="form-group">
                  <select class="form-control" name="level">
                     <?php if ($editResult['level'] == '0') { ?>
                        <option selected="selected" value="0">Admin</option>
                        <option value="1">Editor</option>
                      <?php } elseif($editResult['level'] == '1'){ ?>
                        <option selected="selected" value="1">Editor</option>
                        <option value="0">Admin</option>
                      <?php } ?>
                  </select>
                </div>
            <div class="box-footer">
              <button type="submit" name="update" class="pull-right btn btn-success" id="sendEmail">Update</button>
            </div>
          </div>
           </form>
           <?php } } ?>
          </div>
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
      </div>

      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include "inc/footer.php"; ?>
