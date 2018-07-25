<?php 
include "inc/header.php"; 
if (!Session::get('level') == '0') {
  header("Location:index.php");
} 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['site_etc'])) {
 $msg  = $site_etc->getSiteEtc($_POST, $_FILES);
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
       <img src="../images/icon/ns_world.png">
      </h1>
      <!-- <div id="google_translate_element"></div> -->

      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Site ETC</li>
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
                echo '<script>
                    setTimeout(function(){
                      window.location.href="site_etc.php";
                      }, 2000);
                     </script>';
               }
           ?>
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-plus"></i>
              <h3 class="box-title text-success">Site ETC </h3>
            </div>
        <?php
         $getSiteetc = $site_etc->getSiteEtcByIdShow();
         if ($getSiteetc) {
           while ($result = $getSiteetc->fetch_assoc()) {
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
            <div class="box-body">

                <input type="hidden" name="ste_id" value="<?php echo $result['ste_id']; ?>">
               <div class="form-group">
                <label>Website Name: </label>
                 <input type="text" class="form-control" name="site_name"  value="<?php echo $result['site_name']; ?>">
                </div>
                <div style="margin-left: 20px;margin-bottom: 10px;"><img  class="img-thumbnail" src="../<?php echo $result['browser_icon']; ?>"></div>
                <div class="form-group">
                  <label>Browser Tab Icon (12*12): </label>
                 <input type="file" name="browser_icon">
                </div>
                <div class="form-group">
                  <label>Copyright Text: </label>
                 <input type="text" class="form-control" name="copyright_text" value="<?php echo $result['copyright_text']; ?>">
                </div>
                <div class="form-group">
                  <label>Copyright Site url: </label>
                 <input type="text" class="form-control" name="copyright_surl" value="<?php echo $result['copyright_surl']; ?>">
                </div>
                <div class="form-group">
                  <label>Developer Name: </label>
                 <input type="text" class="form-control" name="developer_name" value="<?php echo $result['developer_name']; ?>" />
                </div>
                <div class="form-group">
                  <label>Developer Site url: </label>
                 <input type="text" class="form-control" name="developer_surl" value="<?php echo $result['developer_surl']; ?>" />
                </div>
            <div class="box-footer">
              <button type="submit" name="site_etc" class="center-block pull-center btn btn-success">Update</button>
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

