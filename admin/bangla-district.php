<?php 
include "inc/header.php"; 
if (!Session::get('level') == '0') {
  header("Location:index.php");
} 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addbanglacountry'])) {
 $msg  = $bn_ns->bnDistrictCountryAdd($_POST);
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
         <section class="col-lg-4">
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-plus"></i>
              <h3 class="box-title text-success"> বাংলাদেশী জেলা অথবা বিদেশি দেশের নাম </h3>
              <?php
                  if (isset($msg)) {
                    echo $msg;
                    echo "<script>
                       setTimeout(function () {
                           window.location.href= 'bangla-district.php'; 
                        },2000);
                     </script>";
                  }
               ?>
            </div>
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div class="box-body">
               <!--  <div class="form-group">
                 <label class="radio-inline"><input type="radio" name="dis_con" value="88" checked="">বাংলাদেশ </label>
                 <label class="radio-inline"><input type="radio" name="dis_con" value="99">বিশ্ব </label>
                </div> -->
                <div class="form-group">
                  <label>প্রকাশক অবস্থান: </label> <span class="scolor">*</span>
                   <label class="radio-inline"><input type="radio" name="dis_con" data-toggle="collapse" data-target=".collapseOne:not(.in)" value="88" >বাংলাদেশ </label>
                   <label class="radio-inline"><input type="radio" name="dis_con" data-toggle="collapse" data-target=".collapseOne.in" value="99"> বিশ্ব</label>
                </div>

                <div class="form-group collapseOne  collapse">
                  <label>বিভাগ:</label>
                  <select class="form-control selectedStyle" name="bd_div">
                    <option value="0" style="display: none" selected hidden>বিভাগ সিলেক্ট করুন</option>
                    <option value="1366"> ঢাকা বিভাগ </option>
                    <option value="1960"> খুলনা বিভাগ </option>
                    <option value="2015"> চট্টগ্রাম বিভাগ </option>
                    <option value="3100"> সিলেট বিভাগ  </option>
                    <option value="1993"> বরিশাল বিভাগ </option>
                    <option value="2200"> ময়মনসিংহ বিভাগ </option>
                    <option value="5585"> রংপুর বিভাগ </option>
                    <option value="6000"> রাজশাহী বিভাগ </option>
                 </select>
                </div>
                <div class="form-group">
                 <input type="text" class="form-control" name="bn_cn" placeholder="Bangla District Or Country!">
                </div>
            <div class="box-footer">
              <button type="submit" name="addbanglacountry" class="pull-right btn btn-success">Add</button>
            </div>

          </div>
           </form>
          </div>
        </section>
        <section class="col-lg-8">
          <?php include 'inc/edit_paper.php'; ?>
        </section>
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
       
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"; ?>
