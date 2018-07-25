<?php 
include "inc/header.php"; 
if (!Session::get('level') == '0') {
  header("Location:index.php");
} 
include "../classes/Socail.php";
$socail = new Socail();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['socail'])) {
 $msg  = $socail->socaiilMediaUrl($_POST);
}

?>
<style type="text/css">
  .socail_media_image_top{
    padding: 0px;
    background-image: url('../upload/socail/ss.jpg');
    background-repeat: no-repeat;
    background-position: center;
    background-color: #b8b4a9;

  }
  .box-footer {
  border-top: 0px solid #f4f4f4;
  background-color: transparent;
  padding: 0px;
}
 .form-group {
  border: 2px solid #666259;
}
 .form-control{
   background-color: #000;
   opacity: 0.8;
   color: #fff;
   font-weight: bold;
 }
 .box.box-info {
  border-top-color: #9A9A9A;
}
</style>
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
       <img src="../images/icon/ns_world.png">
      </h1>
      <!-- <div id="google_translate_element"></div> -->

      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Socail Media</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
         <section class="col-lg-6 col-lg-offset-3">
          <?php
              if (isset($msg)) {
                echo $msg;
               }
           ?>
          <div class="box box-success socail_media_image_top">
            <div class="box-header">
              <i class="fa fa-plus"></i>
              <h3 class="box-title text-success">Socail Media </h3>
              <img src="../upload/socail/social_media.png" width="80%" height="auto">
            </div>
        <?php
         $getSocailm = $socail->getSocailMediaByIdShow();
         if ($getSocailm) {
           while ($result = $getSocailm->fetch_assoc()) {
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div class="box-body">
                <input type="hidden" name="so_id" value="<?php echo $result['so_id']; ?>">
               <div class="form-group">
                 <input type="text" class="form-control" name="bn_ns_fb" value="<?php echo $result['bn_ns_fb']; ?>">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control" name="bn_ns_tw" value="<?php echo $result['bn_ns_tw']; ?>">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control" name="bn_ns_gp" value="<?php echo $result['bn_ns_gp']; ?>">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control" name="bn_ns_lk" value="<?php echo $result['bn_ns_lk']; ?>">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control" name="bn_ns_ig" value="<?php echo $result['bn_ns_ig']; ?>">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control" name="bn_ns_ps" value="<?php echo $result['bn_ns_ps']; ?>">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control" name="bn_ns_yt" value="<?php echo $result['bn_ns_yt']; ?>">
                </div>
            <div class="box-footer">
              <button type="submit" name="socail" class="center-block pull-center btn btn-success">Update</button>
            </div>
          </div>
           </form>
          <?php } } ?>
          </div>
        </section>
       <!-- right col (We are only adding the ID to make the widgets sortable)-->
       
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"; ?>
