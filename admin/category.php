<?php 
include "inc/header.php"; 
 if (!Session::get('level') == '0') {
  header("Location:index.php");
} 
include "../classes/Category.php";
$cat = new Category();
 # Category Add insert Query pass..
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
          
    $category_msg  = $cat->categoryAdd($_POST);
 }

  # Category List Delete Action Get....
 if (isset($_GET['action']) && $_GET['action']) {
    $catId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['action']);
    $catId = (int)$catId;
    $getMsg = $cat->getCategoryDelete($catId);
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
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-5 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <!-- /.nav-tabs-custom -->
           <?php
             #Reistration from massage show..
               if (isset($category_msg)) {
                 echo $category_msg;
                 echo "<script>
                   setTimeout(function () {
                       window.location.href= 'category.php'; 

                    },2000);
                 </script>";
               }
           ?>
          <!-- quick email widget -->
                    
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-plus-square"></i>

              <h3 class="box-title">Category</h3>
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
                 <input type="text" class="form-control" name="category" placeholder="Add Category! ">
                </div>
            <div class="box-footer">
              <button type="submit" name="submit" class="pull-right btn btn-success" id="sendEmail">Add</button>
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
               echo "<script>
                   setTimeout(function () {
                       window.location.href= 'category.php'; 

                    },2000);
                 </script>";
             }
          ?>
          <div class="box">
            <div class="box-header">
              <i class="fa fa-list-ul"></i>

              <h3 class="box-title">Category List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              <?php
                 $getData = $cat->getCategoryData();
                 if ($getData) {
                   $i = 0;
                   while ($result = $getData->fetch_assoc()) {
                   $i++;
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $result['category']; ?></td>
                  <td  class="menu_defarent">
                    <span><a href="editCategory.php?edit_Category=<?php echo $result['catId']; ?>"><i class="glyphicon glyphicon-edit"></i></a></span>
                    <span><a onclick="return confirm('Are you Sure to Delete!')" href="?action=<?php echo $result['catId']; ?>"><i class="glyphicon glyphicon-trash"></i></a></span>

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
