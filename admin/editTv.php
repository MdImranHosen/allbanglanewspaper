<?php 
include "inc/header.php"; 
if (!Session::get('level') == '0') {
  header("Location:index.php");
} 

include "../classes/Tvchannels.php";
$tvc = new Tvchannels();

 if (isset($_GET['edit_bangla_tv']) && $_GET['edit_bangla_tv']) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['edit_bangla_tv']);
    $id = preg_replace('/\D/', '', $_GET['edit_bangla_tv']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
 }

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editTv'])) {
  $getBanglaTvMsg = $tvc->getUpdateBanglaTv($_POST, $_FILES, $id);
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
      <h1>
        <img src="../images/icon/radio2.png">
        All Bangla News
        <small>Edit TV Id</small><br>
      </h1>   
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Bangla TV</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <?php
          if (isset($getBanglaTvMsg)) {
            echo $getBanglaTvMsg;
            
          }
       ?>
      <div class="row">
        <section class="col-lg-8 col-lg-offset-2">
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-plus"></i>
              <h3 class="box-title text-success">Edit Bangla TV</h3>
              <!-- tools box -->
              <button type="button" class="btn btn-success pull-right" onclick="viewRadiolist();">
                <i class="fa fa-eye"></i>
                 View LIst
               </button>
              <!-- /. tools -->
            </div>
            <?php
              $rEresult = $tvc->getTvIdEditResultShow($id);
              if ($rEresult) {
                while ($eresultShow = $rEresult->fetch_assoc()) {
            ?>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="box-body">
               <div class="form-group">
                 <input type="text" class="form-control" id="tvNameEdit" name="tvNameEdit" value="<?php echo $eresultShow['tv_n'] ?>">
                </div>
                <div class="form-group">
                  <select class="form-control selectedStyle" name="tvCatEdit">
                    <option value="" style="display: none" selected hidden>Select Category</option>
                    <?php if ($eresultShow['tv_cat'] == 1) { ?>
                    <option selected = "selected" value="1">বাংলাদেশি টিভি</option>
                    <option value="2">ভারতীয় বাংলা টিভি </option>
                    <option value="3">অন্যান্য বিদেশি বাংলা টিভি</option>
                    <?php } elseif ($eresultShow['tv_cat'] == 2) { ?>
                    <option value="1">বাংলাদেশি টিভি</option>
                    <option selected = "selected" value="2">ভারতীয় বাংলা টিভি </option>
                    <option value="3">অন্যান্য বিদেশি বাংলা টিভি</option>
                    <?php } elseif ($eresultShow['tv_cat'] == 3) { ?>
                    <option value="1">বাংলাদেশি টিভি</option>
                    <option value="2">ভারতীয় বাংলা টিভি </option>
                    <option selected = "selected" value="3">অন্যান্য বিদেশি বাংলা টিভি</option>
                    <?php }else{ echo "Empty!"; } ?>
                  </select>
               </div>
                <div class="form-group">
                 <input type="text" class="form-control" id="tvCityEdit" name="tvCityEdit" value="<?php echo $eresultShow['city_tv']; ?>">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control" id="tvurlEdit" name="tvurlEdit" value="<?php echo $eresultShow['tvc_url']; ?>" >
                </div>
                <img src="../<?php echo $eresultShow['tv_img']; ?>" width='100' height='auto'>
                <div class="form-group">
                 <input type="file" name="tvOImgEdit" id="file-7" accept="image/x-png,image/gif,image/jpeg" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
                  <label for="file-7"><span></span> <strong><svg  width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose logo &hellip;</strong></label>
                </div>
            <div class="box-footer">
              <button type="submit" name="editTv" class="pull-right btn btn-success">Edit TV</button>
            </div>

          </div>
           </form>
           <?php } }?>
          </div>
        </section>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script src="js/custom-file-input.js"></script>
<?php include "inc/footer.php"; ?>
