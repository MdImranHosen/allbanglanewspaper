<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php
include "../classes/User_reg_co.php";
$user_reg = new User_reg_co();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_termsAndConditions'])) {
    
    $getTermsConditionsMsg = $user_reg->getTermsConditionsInsert($_POST);
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
        <li><a href="post_list.php" title="All News List."><i class="fa fa-list"></i>All News List</a></li>
        <li class="active"></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <?php
           if (isset($getTermsConditionsMsg)) {
             echo $getTermsConditionsMsg;
             echo "<script>
               setTimeout(function () {
                   window.location.href= 'user-terms-and-conditions-add.php'; 

                },2000);
            </script>";
           }
        ?>
        <section class="col-md-12 connectedSortable">
          <div class="box box-info">
          <div class="box-header">
              <h3 class="box-title breadcrumb"><i class="fa fa-edit"></i> Add Terms and Conditions</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Hidden Of Input From"><i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <?php 
                 $getTermsCondition = $user_reg->getTermsAndConditions();
                 if ($getTermsCondition) {
                   while ($result = $getTermsCondition->fetch_assoc()) { 
                    #$id = $result['id'];
            ?>
          <div class="box-body pad">
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
              <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
             <div class="form-group">
              <input type="text" class="form-control" name="termsTitle" id="formGroupExampleInput" aria-describedby="emailHelp" value="<?php echo $result['title']; ?>" >
            </div>
           <div class="form-group">
                 <textarea id="editor1" name="details_terms_conditions" rows="10" cols="80">
                   <?php echo $result['details']; ?>
                 </textarea>
           </div>
            <button type="submit" name="update_termsAndConditions" title="Update Terms and Conditions." class="btn btn-primary">Update</button>
          </form>
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
