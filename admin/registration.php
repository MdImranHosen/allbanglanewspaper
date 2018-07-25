<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php
 include "../classes/Registration.php";
$reg = new Registration();
 # Admin Registration insert Query pass..
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
          
          $admin_usereg  = $reg->adminRegistration($_POST);
 }
?>
<?php
  # Admin List Delete Action Get....
 if (isset($_GET['action']) && $_GET['action']) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['action']);
    $id = (int)$id;
    $getMsg = $reg->getAdminDelete($id);
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
        <!-- Left col -->
        <section class="col-lg-5 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <!-- /.nav-tabs-custom -->
           <?php
             #Reistration from massage show..
               if (isset($admin_usereg)) {
                 echo $admin_usereg;
                 echo "<script>
                setTimeout(function(){
                   window.location.href='registration.php'; 
                 },2000)</script>";
               }
           ?>
          <!-- quick email widget -->
                    
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-user-plus"></i>

              <h3 class="box-title">Admin Registration</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div class="box-body">
                <div class="form-group">
                 <input type="text" class="form-control" name="name" placeholder="Enter User Name.">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="email" placeholder="Enter User Email.">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Enter User Password.">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="cpassword" placeholder="Confram Password.">
                </div>
                <div class="form-group">
                  <select class="form-control" name="level">
                    <option value="" style="display: none" selected hidden>Select Level</option>
                    <option value="0">Admin</option>
                    <option value="1">Editor</option>
                  </select>
                </div>
            <div class="box-footer">
              <button type="submit" name="submit" class="pull-right btn btn-success" id="sendEmail">Submit</button>
            </div>
          </div>
           </form>
          </div>
          
        </section>
        <!-- /.Left col -->
        <section class="col-lg-7 connectedSortable">
          <?php
             if (isset($getMsg)) {
               echo $getMsg;
             }
          ?>
          <div class="box">
            <div class="box-header">
              <i class="fa fa-users"></i>

              <h3 class="box-title">Admin List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Name</th>
                  <th>Email Address</th>
                  <th>Level</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              <?php
                 $getData = $reg->getAdminData();
                 if ($getData) {
                   $i = 0;
                   while ($result = $getData->fetch_assoc()) {
                   $i++;
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $result['name']; ?></td>
                  <td><?php echo $result['email']; ?></td>
                  <td><?php  
                         if ($result['level'] == '0') {
                           echo "Admin";
                         }else{
                          echo "Editor";
                         }
                   ?></td>
                  <td  align="center">
                   <span style="margin-right: 5px;"><a href="editAdmin.php?edit_admin=<?php echo $result['id']; ?>"><i class="glyphicon glyphicon-edit"></i></a></span>
                    <span><a onclick="return confirm('Are you Sure to Delete!')" href="?action=<?php echo $result['id']; ?>"><i class="glyphicon glyphicon-trash"></i></a></span>

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

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include "inc/footer.php"; ?>
