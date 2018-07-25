<?php 
include "inc/header.php"; 
if (!Session::get('level') == '0') {
  header("Location:index.php");
} 

 # Edit Populer news list Catch action Code....
if (!isset($_GET['edit_paper_cat']) || $_GET['edit_paper_cat'] == NULL) {
    header('Location:bangla-district.php');
 }elseif($_GET['edit_paper_cat'] == 0){
    header('Location:bangla-district.php');
 }elseif(!preg_replace('/\D/', '', $_GET['edit_paper_cat'])){
    header('Location:bangla-district.php');
 }else{
    $cid = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['edit_paper_cat']);
    $cid = preg_replace('/\D/', '', $_GET['edit_paper_cat']);
    $cid = mysqli_real_escape_string($db->link, $cid);
    $cid = (int)$cid;
 }

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editbanglacountry'])) {
 $msg  = $bn_ns->bnDistrictCountryEditById($_POST,$cid);
}

# Delete Populer news list Catch action Code....
 if (isset($_GET['banglaCountryDelete']) && $_GET['banglaCountryDelete']) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['banglaCountryDelete']);
    $id = preg_replace('/\D/', '', $_GET['banglaCountryDelete']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
    $getMsg = $bn_ns->getDeleteBnNscatId($id);
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
      <div id="google_translate_element"></div>

      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Bangla</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <?php 
          $getResult = $bn_ns->getIdByResultShow($cid);
          if ($getResult) {
            while ($showResult = $getResult->fetch_assoc()) {
        ?>
         <section class="col-lg-4">
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-plus"></i>
              <h3 class="box-title text-success"> বাংলাদেশী জেলা অথবা বিদেশি দেশের নাম </h3>
              <?php
                  if (isset($msg)) {
                    echo $msg;
                  }
               ?>
            </div>
          <form action="" method="post">
            <div class="box-body">
                <div class="form-group">
                  <label>প্রকাশক অবস্থান: </label> <span class="scolor">*</span>
                   <label class="radio-inline"><input type="radio" name="dis_con" data-toggle="collapse" data-target=".collapseOne:not(.in)" value="88" <?php if ($showResult["dis_con"] == '88') echo 'checked="checked"'; ?>" />বাংলাদেশ </label>
                   <label class="radio-inline"><input type="radio" name="dis_con" data-toggle="collapse" data-target=".collapseOne.in" value="99" <?php if ($showResult["dis_con"] == '99') echo 'checked="checked"'; ?>" /> বিশ্ব</label>
                </div>

                <div class="form-group collapseOne  collapse">
                  <label>বিভাগ:</label>
                  <select class="form-control selectedStyle" name="bd_div">
                    <option value="" style="display: none" selected hidden>বিভাগ সিলেক্ট করুন</option>
                    <?php include "inc/division_option.php"; ?>
                 </select>
                </div>

                <div class="form-group">
                 <input type="text" class="form-control" name="bn_cn" value="<?php echo $showResult['bn_cn']; ?>">
                </div>
            <div class="box-footer">
              <button type="submit" name="editbanglacountry" class="pull-right btn btn-success">Update</button>
            </div>

          </div>
           </form>
          </div>
        </section>
      <?php } }else{ echo "Empty!"; } ?>
        <section class="col-lg-8">
          <?php include "inc/edit_paper.php"; ?>
        </section>
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
       
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"; ?>
