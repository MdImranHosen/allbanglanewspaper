<?php 
include "inc/header.php"; 
if (!Session::get('level') == '0') {
  header("Location:index.php");
} 

# Category Wayis news list Catch action Code....
 if (!isset($_GET['paperlist']) || $_GET['paperlist'] == NULL) {
     header('Location:addNewspaper.php');
 }elseif($_GET['paperlist'] == 0){
  header('Location:addNewspaper.php');
 }elseif(!preg_replace('/\D/', '', $_GET['paperlist'])){
  header('Location:addNewspaper.php');
 }else{
    $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['paperlist']);
    $id = preg_replace('/\D/', '', $_GET['paperlist']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
 }
 # Delete News Id Catch action Code...
  if (isset($_GET['newspaperIdDelete']) && $_GET['newspaperIdDelete']) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['newspaperIdDelete']);
    $id = preg_replace('/\D/', '', $_GET['newspaperIdDelete']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
    $ms = $bn_ns->getNewspaperDeleteId($id);
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
       <?php
         $getBnCat = $bn_ns->getBnNsCatName($id);
         if ($getBnCat) {
           while ($cresult = $getBnCat->fetch_assoc()) {
         ?>
            <strong><?php echo $cresult['bn_cn']; ?></strong>
         <?php } }else{ echo "Empty"; } ?>
      </h1>
      <!-- <div id="google_translate_element"></div> -->
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">All Newspaper List</li>
      <br><br>
      <button type="button" class="btn btn-success pull-right" onclick="NewsPaperAdd();">
                <i class="fa fa-plus-square"></i>
                 খবরের কাগজ
               </button>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <section class="col-lg-7">
          <div id="deleteMassagetimeout">
          <?php
           if (isset($getMsg)) {
             echo $getMsg;

             echo "<script>
               setTimeout(function () {
                   window.location.href= 'paperlist.php'; 

                },2000);
            </script>";
           }
          ?>
          </div>
          <div class="box box-success">
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs bangla_district_world">
              <li class="active"><a href="#tab_1" data-toggle="tab">দৈনিক</a></li>
              <li><a href="#tab_2" data-toggle="tab">সাপ্তাহিক</a></li>
              <li><a href="#tab_3" data-toggle="tab">অন্যান্য</a></li>
              <li><a href="#tab_4" data-toggle="tab">জনপ্রিয়</a></li>
              <li><a href="#tab_5" data-toggle="tab">ই-পেপার</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="5%">NO</th>
                    <th>Newspaper Name</th>
                    <th>Newspaper Logo</th>
                    <th width="5%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                     $result = $bn_ns->getNewsCategorywayisShow($id);
                     $i = 0;
                     if ($result) {
                        while ($rows = $result->fetch_assoc()) {
                          $i++;
                  ?>
               <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $rows['ns_name']; ?></td>
                  <td><img class="paperlogo" src="../<?php echo $rows['ns_img']; ?>"></td>
                  <td class="menu_defarent">
                    <span><a href="edit_newspaper.php?edit_newspaper=<?php echo $rows['id']; ?>"><i class="glyphicon glyphicon-edit"></i></a></span>
                    <span><a class="btn_delete" onclick="return confirm('Are you sure to Delete!')" href="?newspaperIdDelete=<?php echo $rows['id']; ?>"><i class="glyphicon glyphicon-trash"></i></a></span>
                  </td>
                </tr>
                 <?php } }else{ ?>
                 <tr>
                  <td>00.0</td>
                  <td>Empty</td>
                  <td>(0)</td>
                  <td></td>
                 </tr>  
                <?php } ?>
                </tbody>
              </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="5%">NO</th>
                    <th>Newspaper Name</th>
                    <th>Newspaper Logo</th>
                    <th width="5%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                     $result = $bn_ns->getNewsCategorywayisweekiShow($id);
                     $i = 0;
                     if ($result) {
                        while ($rows = $result->fetch_assoc()) {
                          $i++;
                  ?>
               <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $rows['ns_name']; ?></td>
                  <td><img class="paperlogo" src="../<?php echo $rows['ns_img']; ?>"></td>
                  <td class="menu_defarent">
                    <span><a href="edit_newspaper.php?edit_newspaper=<?php echo $rows['id']; ?>"><i class="glyphicon glyphicon-edit"></i></a></span>
                    <span><a class="btn_delete" onclick="return confirm('Are you sure to Delete!')" href="?newspaperIdDelete=<?php echo $rows['id']; ?>"><i class="glyphicon glyphicon-trash"></i></a></span>
                  </td>
                </tr>
                 <?php } }else{ ?>
                 <tr>
                  <td>00.0</td>
                  <td>Empty</td>
                  <td>(0)</td>
                  <td></td>
                 </tr>  
                <?php } ?>
                </tbody>
              </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="5%">NO</th>
                    <th>Newspaper Name</th>
                    <th>Newspaper Logo</th>
                    <th width="5%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                     $result = $bn_ns->getNewsCategoryAnotherShow($id);
                     $i = 0;
                     if ($result) {
                        while ($rows = $result->fetch_assoc()) {
                          $i++;
                  ?>
               <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $rows['ns_name']; ?></td>
                  <td><img class="paperlogo" src="../<?php echo $rows['ns_img']; ?>"></td>
                  <td class="menu_defarent">
                    <span><a href="edit_newspaper.php?edit_newspaper=<?php echo $rows['id']; ?>"><i class="glyphicon glyphicon-edit"></i></a></span>
                    <span><a class="btn_delete" onclick="return confirm('Are you sure to Delete!')" href="?newspaperIdDelete=<?php echo $rows['id']; ?>"><i class="glyphicon glyphicon-trash"></i></a></span>
                  </td>
                </tr>
                 <?php } }else{ ?>
                 <tr>
                  <td>00.0</td>
                  <td>Empty</td>
                  <td>(0)</td>
                  <td></td>
                 </tr>  
                <?php } ?>
                </tbody>
              </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_4">
                <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="5%">NO</th>
                    <th>Newspaper Name</th>
                    <th>Newspaper Logo</th>
                    <th width="5%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                     $result = $bn_ns->getNewsCategoryPopulerShow($id);
                     $i = 0;
                     if ($result) {
                        while ($rows = $result->fetch_assoc()) {
                          $i++;
                  ?>
               <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $rows['ns_name']; ?></td>
                  <td><img class="paperlogo" src="../<?php echo $rows['ns_img']; ?>"></td>
                  <td class="menu_defarent">
                    <span><a href="edit_newspaper.php?edit_newspaper=<?php echo $rows['id']; ?>"><i class="glyphicon glyphicon-edit"></i></a></span>
                    <span><a  onclick="return confirm('Are you sure to Delete!')" href="?newspaperIdDelete=<?php echo $rows['id']; ?>"><i class="glyphicon glyphicon-trash"></i></a></span>
                  </td>
                </tr>
                 <?php } }else{ ?>
                 <tr>
                  <td>00.0</td>
                  <td>Empty</td>
                  <td>(0)</td>
                  <td></td>
                 </tr>  
                <?php } ?>
                </tbody>
              </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_5">
                <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="5%">NO</th>
                    <th>Newspaper Name</th>
                    <th>Newspaper Logo</th>
                    <th width="5%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                     $result = $bn_ns->getNewsCategoryEpaperShow($id);
                     $i = 0;
                     if ($result) {
                        while ($rows = $result->fetch_assoc()) {
                          $i++;
                  ?>
               <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $rows['ns_name']; ?></td>
                  <td><img class="paperlogo" src="../<?php echo $rows['ns_img']; ?>"></td>
                  <td class="menu_defarent">
                    <span><a href="edit_newspaper.php?edit_newspaper=<?php echo $rows['id']; ?>"><i class="glyphicon glyphicon-edit"></i></a></span>
                    <span><a class="btn_delete" onclick="return confirm('Are you sure to Delete!')" href="?newspaperIdDelete=<?php echo $rows['id']; ?>"><i class="glyphicon glyphicon-trash"></i></a></span>
                  </td>
                </tr>
                 <?php } }else{ ?>
                 <tr>
                  <td>00.0</td>
                  <td>Empty</td>
                  <td>(0)</td>
                  <td></td>
                 </tr>  
                <?php } ?>
                </tbody>
              </table>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
            </div>
            <!-- /.box-body -->
             
          </div>
        </section>
        <section class="col-lg-5">
          <?php include 'inc/bangladesh-world.php'; ?>
        </section>
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
       
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"; ?>
