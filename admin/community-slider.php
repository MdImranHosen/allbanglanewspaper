<?php 
include "inc/header.php";
 if (!Session::get('level') == '0') {
  header("Location:index.php");
}
?>

<link rel="stylesheet" href="dist_files/imgareaselect.css">
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
        Slider
        <small>Add Slider Image</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Slider</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-8 col-lg-offset-2">
                    
          <div class="box box-info">
            <div class="box-body">
              <img id="slider_image" data-src="images/slider/Slider_Blank670x360.jpg" data-holder-rendered="true" src="images/slider/Slider_Blank670x360.jpg">
            </div>
            <div class="box-footer">
              <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" id="slider_image_add">
              Add Slider Image
            </button>

          <!-- Modal -->
          <div class="modal fade" id="add_slider_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Slider Image</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="cropimage" method="post" enctype="multipart/form-data" action="crop_img.php">
                    <strong>Upload Image:</strong> <br><br>
                    <input type="file"   name="slider_images" id="slider_images" accept="image/*" />
                    <input type="hidden" name="hdn-slider-id" id="hdn-slider-id" value="1" />
                    <input type="hidden" name="hdn-x1-axis"   id="hdn-x1-axis"   value="" />
                    <input type="hidden" name="hdn-y1-axis"   id="hdn-y1-axis"   value="" />
                    <input type="hidden" name="hdn-x2-axis"   id="hdn-x2-axis"   value="" />
                    <input type="hidden" name="hdn-y2-axis"   id="hdn-y2-axis"   value="" />
                    <input type="hidden" name="hdn-thumb-width"  id="hdn-thumb-width"   value="" />
                    <input type="hidden" name="hdn-thumb-height" id="hdn-thumb-height" value="" />
                    <input type="hidden" name="action" id="action" value="" />
                    <input type="hidden" name="image_name" id="image_name" value="" />
                    <div id='preview-slider-img'></div>
                    <div id="thumbs" style="padding:5px; width:600px"></div>
                </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" id="save_crop" class="btn btn-primary">Crop & Save</button>
                </div>
              </div>
            </div>
          </div>
            </div>
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
<script src="dist_files/jquery.imgareaselect.js" type="text/javascript"></script>
<script src="dist_files/jquery.form.js"></script>
<script src="js/functions.js"></script>
