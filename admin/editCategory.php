<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php
include "../classes/Category.php";
$cat = new Category();

 #Menu Table Edite Action Get..
 if (!isset($_GET['edit_Category']) || $_GET['edit_Category'] == NULL) {
      header("Location:category.php");
 } else{
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['edit_Category']);
    $id = (int)$id;
 }

 #Update Category post method data pass.. 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {

    $catEditMsg = $cat->getEditCategory($_POST, $id);
}
?>
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/component.css" />
<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
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
     <ol class="breadcrumb">
      <li><a href="category.php" title="Category List."><i class="fa fa-list"></i>Category List</a></li>
        <li class="active"></li>
     </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
         <section class="col-lg-8 col-sm-12 connectedSortable">
          <?php
             if (isset($catEditMsg)) {
               echo $catEditMsg;
                echo "<script>
               setTimeout(function () {
                   window.location.href= 'category.php'; 

                },2000);
            </script>";
               }
          ?>
          <?php 
                $catResult = $cat->showUpdateCatResult($id);
                if ($catResult) {
                  while ($result = $catResult->fetch_assoc()) {
          ?>
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title breadcrumb"><i class="fa fa-edit"></i> Edit New Post</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info" title="View News List" onclick="cat_list();">
                <i class="fa fa-eye"></i> Category LIst </button>
              </div>
              <!-- /. tools -->
            </div>
          <div class="box-body pad">
          <form action="" method="post">
                <div class="form-group">
                 <input type="text" class="form-control" name="category" value="<?php echo $result['category']; ?>"> 
                </div>
                <div class="box-footer">
                 <button type="submit" name="update" class="pull-right btn btn-success">Update Category</button>
               </div>
           </form>
          </div>
        </div>
           <?php } } ?>
         </section>
      </div>

      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script src="js/custom-file-input.js"></script>
<?php include "inc/footer.php"; ?>
