<?php 
include "inc/header.php"; 
if (!Session::get('level') == '0') {
  header("Location:index.php");
}

 # Edit News Id Catch action Code...
  if (isset($_GET['edit_newspaper']) && $_GET['edit_newspaper']) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['edit_newspaper']);
    $id = preg_replace('/\D/', '', $_GET['edit_newspaper']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
 } 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editbanglacountry'])) {
 $msg  = $bn_ns->bnNewspaperUpdate($_POST, $_FILES, $id);
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
        <li class="active">Bangla</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <?php
           $getResultShow = $bn_ns->getResultShowById($id);
           if ($getResultShow) {
             while ($showResult = $getResultShow->fetch_assoc()) {
          ?>
         <section class="col-lg-6">
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-plus"></i>
              <h3 class="box-title text-success">বাংলা নিউজ পেপার </h3>
              <?php
                  if (isset($msg)) {
                    echo $msg;
                    /*echo "<script>
                       setTimeout(function () {
                           window.location.href= 'addNewspaper.php'; 
                        },2000);
                     </script>";*/
                  }
               ?>
            </div>
          
          <form action="" method="post" enctype="multipart/form-data">
            <div class="box-body">
               <div class="form-group">
                <label for="newsname" class="labelstyle">খবরের কাগজের নামঃ- </label>
                 <input type="text" class="form-control" id="newsname" name="newsname" value="<?php echo $showResult['ns_name']; ?>">
                </div>
                <div class="form-group" style="border: 1px solid #2891B1; padding: 3px;">
                  <fieldset>
                <legend style="text-align: center;">খবরের কাগজের উৎস স্থান বাংলাদেশের জেলা অথবা বিশ্বের দেশ নির্বাচন করুন ।</legend>
                  <input name="bn_wdns" onclick="document.getElementById('custom').disabled = false; document.getElementById('charstype').disabled = true;" type="radio"
                    checked="checked" >বাংলাদেশ
                  <select id="custom" name="bnns_wdid" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title="জেলা নির্বাচন করুন ...">
                  <?php
                    $getBnwd = $bn_ns->getBangladeshiDistrict();
                    if ($getBnwd) {
                      while ($getResult = $getBnwd->fetch_assoc()) {
                  ?>
                    <option <?php if($getResult['catId'] == $showResult['catId']){ ?> selected="selected" <?php } ?> value="<?php echo $getResult['catId']; ?>" ><?php echo $getResult['bn_cn']; ?></option>
                   <?php } } ?>   
                  </select>

                  <input name="bn_wdns" onclick="document.getElementById('custom').disabled = true; document.getElementById('charstype').disabled = false;" type="radio" value="customurl">বিশ্ব
                  <select name="bnns_wdid" id="charstype" disabled="disabled" class="form-control">
                  <option value="" style="display: none" selected hidden>দেশ নির্বাচন করুন</option>
                  <?php
                    $getBnwd = $bn_ns->getBanglaForeign();
                    if ($getBnwd) {
                      while ($getResult = $getBnwd->fetch_assoc()) {
                    ?>
                    <option <?php if ($showResult['catId'] == $getResult['catId']) { ?>
                      selected="selected"
                   <?php } ?> value="<?php echo $getResult['catId']; ?>"><?php echo $getResult['bn_cn']; ?></option>
                   <?php } } ?>
                  </select>
                  </fieldset>
                </div>
               
                <div class="form-group">
                 <label class="radio-inline"><input type="radio" name="dyson" value="1" <?php
                 if ($showResult['dwa'] == '1') { ?> checked="checked" <?php } ?> />দৈনিক </label>
                 <label class="radio-inline"><input type="radio" name="dyson" value="2" <?php
                 if ($showResult['dwa'] == '2') { ?> checked="checked" <?php } ?> />সাপ্তাহিক </label>
                 <label class="radio-inline"><input type="radio" name="dyson" value="3" <?php if ($showResult['dwa'] == '3') { ?> checked="checked" <?php } ?> />অন্যান্য </label>
                </div>
                <img src="../<?php echo $showResult['ns_img']; ?>" width="140" height="60">
                <br><br>
                <div class="form-group">
                 <input type="file" name="nsimg" id="file-7" accept="image/x-png,image/gif,image/jpeg" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
                  <label for="file-7"><span></span> <strong><svg  width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> খবরের কাগজের আইকন নির্বাচন করুন  &hellip;</strong></label>
                </div>
                <div class="form-group">
                 <label for="news_url" class="labelstyle">খবরের কাগজের ওয়েবসাইট ইউআরএল(url)</label>
                 <input type="text" class="form-control" id="news_url" name="news_url" value="<?php echo $showResult['ns_url']; ?>">
                </div> 
                <div class="form-group">
                 <label class="radio-inline"></label>
                 <label class="radio-inline"><input type="radio" name="ponsp" value="22" <?php if ($showResult['gpe'] == '22') { ?> checked="checked" <?php } ?> />সাধারণ </label>
                 <label class="radio-inline"><input type="radio" name="ponsp" value="44" <?php if ($showResult['gpe'] == '44') { ?> checked="checked" <?php } ?> />জনপ্রিয় </label>
                 <label class="radio-inline"><input type="radio" name="ponsp" value="33" <?php if ($showResult['gpe'] == '33') { ?> checked="checked" <?php } ?> />ই-পেপার </label>
                </div>
            <div class="box-footer">
              <button type="submit" name="editbanglacountry" class="pull-right btn btn-success">Add</button>
            </div>
          </div>
           </form>
          </div>
        </section>
      <?php } } ?>
        <section class="col-lg-6">
          <?php include 'inc/bangladesh-world.php'; ?>
        </section>
       <!-- right col (We are only adding the ID to make the widgets sortable)-->
       
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"; ?>
