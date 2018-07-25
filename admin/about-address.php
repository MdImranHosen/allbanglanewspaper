<?php 
include "inc/header.php"; 
if (!Session::get('level') == '0') {
  header("Location:index.php");
}
$about_address = new About_address();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['site_about_address'])) {
 $msg  = $about_address->siteAboutAddressContact($_POST);
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
        <li class="active">Site About, Address & Contact</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
         <section class="col-lg-8 col-lg-offset-2">
          <?php
              if (isset($msg)) {
                echo $msg;
                echo '<script>
                    setTimeout(function(){
                      window.location.href="about-address.php";
                      }, 2000);
                     </script>';
               }
           ?>
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-plus"></i>
              <h3 class="box-title text-success">Site About, Address & Contact </h3>
            </div>
        <?php
         $getSiteAddress = $about_address->getSiteAboutAddressByIdShow();
         if ($getSiteAddress) {
           while ($result = $getSiteAddress->fetch_assoc()) {
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div class="box-body">
                <input type="hidden" name="ste_id" value="<?php echo $result['ste_id']; ?>">
               <div class="form-group">
                <label>Address: </label>
                 <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-map-marker"></i>
                    </div>
                  <input type="text" class="form-control" id="site_address" name="site_address"  value="<?php echo $result['s_ads']; ?>" />
                 </div>
                </div>
                <div class="form-group">
                  <label>Author Phone:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-phone"></i>
                    </div>
                    <input type="number" onkeypress="return isNumberKey(event)" class="form-control" id="site_phone" maxlength="15" name="site_phone" value="<?php echo $result['s_phone']; ?>" />
                  </div>
                  <!-- /.input group -->
               </div>
                <div class="form-group">
                  <label>E-mail: </label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-at"></i>
                    </div>
                   <input type="email" class="form-control" id="site_email" name="site_email" value="<?php echo $result['s_email']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label>Web Address: </label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-globe"></i>
                    </div>
                    <input type="url" class="form-control" id="website_url" name="website_url" value="<?php echo $result['ws_u']; ?>" />
                  </div>
                </div>
                <div class="form-group">
                  <label>About Us: </label>
                  <textarea id="editor1" name="site_about" rows="10" cols="80"><?php echo $result['s_about'] ?></textarea>
                </div>
            <div class="box-footer">
              <button type="submit" id="site_about_address" name="site_about_address" class="center-block pull-center btn btn-success">Update</button>
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