<?php 
include "inc/header.php";
 if (!Session::get('level') == '0') {
  header("Location:index.php");
}
  #Unique Visitor Settings Query..
if (isset($_POST['setting_visitor'])) {
   $visitor_setting = $vis_co->visitorSettingUpdate($_POST);
}

  # Unique Visitor List Delete Action Get....
 if (isset($_GET['actionDel']) && $_GET['actionDel']) {
    $visitorId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['actionDel']);
    $visitorId = mysqli_real_escape_string($db->link, $visitorId);
    $visitorId = preg_replace('/\D/', '', $visitorId);
    $visitorId = (int)$visitorId;
    $getMsg = $vis_co->getVisitorDelete($visitorId);
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
        This Sites
        <small>Total Page view</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Page Views</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <?php include 'inc/visitor.php'; ?>
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <!-- /.Left col -->
         <section class="col-lg-12 connectedSortable">
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-cog"></i>
              <h3 class="box-title">Page View Setting</h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Hidden Of Input From"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-sortable">
                  <thead>
                    <tr>
                      <th>Per Page Show</th>
                      <th>Order By </th>
                      <th>ASC or DESC</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                     $visitor_settings = $vis_co->getVisiterIdSetting();
                     if ($visitor_settings) {
                       while ($visitor_settings_r = $visitor_settings->fetch_assoc()) {
                  ?>
                  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                    <tr>
                      <td>
                        <select name="record_per_page_show">
                          <option value="3" <?php if ($visitor_settings_r['record_per_page'] == '3') { ?> selected <?php } ?> > LIMIT 3 </option>
                          <option value="6" <?php if ($visitor_settings_r['record_per_page'] == '6') { ?> selected <?php } ?> > LIMIT 6 </option>
                          <option value="9" <?php if ($visitor_settings_r['record_per_page'] == '9') { ?> selected <?php } ?> > LIMIT 9 </option>
                          <option value="12" <?php if ($visitor_settings_r['record_per_page'] == '12') { ?> selected <?php } ?> > LIMIT 12 </option>
                          <option value="15" <?php if ($visitor_settings_r['record_per_page'] == '15') { ?> selected <?php } ?> > LIMIT 15 </option>
                          <option value="18" <?php if ($visitor_settings_r['record_per_page'] == '18') { ?> selected <?php } ?> > LIMIT 18 </option>
                          <option value="21" <?php if ($visitor_settings_r['record_per_page'] == '21') { ?> selected <?php } ?> > LIMIT 21 </option>
                          <option value="24" <?php if ($visitor_settings_r['record_per_page'] == '24') { ?> selected <?php } ?> > LIMIT 24 </option>
                          <option value="27" <?php if ($visitor_settings_r['record_per_page'] == '27') { ?> selected <?php } ?> > LIMIT 27 </option>
                          <option value="30" <?php if ($visitor_settings_r['record_per_page'] == '30') { ?> selected <?php } ?> > LIMIT 30 </option>
                        </select>
                      </td>
                      <td>
                        <select name="order_by_result">
                          <option value="ip" <?php if ($visitor_settings_r['order_by'] == 'ip') { ?> selected <?php } ?> >IP Address</option>
                          <option value="datet" <?php if ($visitor_settings_r['order_by'] == 'datet') { ?> selected <?php } ?> >Visitor Date</option>
                          <option value="unique_vid" <?php if ($visitor_settings_r['order_by'] == 'unique_vid') { ?> selected <?php } ?> >Unique Visitor ID</option>
                        </select>
                      </td>
                      <td>
                        <select name="asc_desc_order">
                          <option value="ASC" <?php if ($visitor_settings_r['asc_desc'] == 'ASC') { ?> selected <?php } ?> >ASC</option>
                          <option value="DESC" <?php if ($visitor_settings_r['asc_desc'] == 'DESC') { ?> selected <?php } ?> >DESC</option>
                        </select>
                      </td>
                      <td>
                        <input type="hidden" name="visitor_setting_Id" value="<?php echo $visitor_settings_r['visitor_setting_Id']; ?>">
                        <input class="btn btn-danger" type="submit" name="setting_visitor" value="Update" >
                      </td>
                    </tr>
                  </form>
                <?php } } ?>
                  </tbody>
                </table>
            </div>
          </div>
        </section>
        <section class="col-lg-12 connectedSortable">
          <?php
             if (isset($getMsg)) {
               echo $getMsg;
               echo "<script>
                   setTimeout(function () {
                       window.location.href= 'totalpageviewlist.php'; 

                    },2000);
                 </script>";
             }
          ?>
          <div class="box">
            <div class="box-header">
              <i class="fa fa-list-ul"></i>

              <h3 class="box-title">Total Unique Visitors</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>IP Address</th>
                  <th>Visit Page</th>
                  <th>First Visit</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                 #record per page show limit query start..
                  $getperPage = $vis_co->getVisiterIdSetting();
                  $perPage = $getperPage->fetch_assoc();
                  $recordPerPage = $perPage['record_per_page'];
                  #end
                  $record_per_page = $recordPerPage;
                  $getPagination = $vis_co->getPaginationVisitorsResult();
              
                  $total_rows = mysqli_num_rows($getPagination);
                
                 $total_pages = ceil($total_rows/$record_per_page);
                   $page = '';
                   if (isset($_GET['page']) && !empty($_GET['page'])) {
                     $page = $_GET['page'];
                     if ($page > $total_pages) {
                       $page = 1;
                     }elseif ((int)$page != true) {
                       $page = 1;
                     }
                   }else{
                    $page = 1;
                   }
                  $start_from = ($page-1)*$record_per_page;
                  $getResult = $vis_co->getUniqueVisitorPerPage($start_from,$record_per_page);
                  if ($getResult) {
                    while ($result = $getResult->fetch_assoc()) {
                 ?>
                <tr>
                  <td><?php echo $result['ip']; ?></td>
                  <td>
                    <?php
                     $uniqueId  = $result['unique_vid'];
                     $checkData = $vis_co->checkDataPageview($uniqueId);
                     if ($checkData) {
                       $checkDataId = mysqli_num_rows($checkData);
                       if (!empty($checkDataId)) {
                    ?>
                    <span><a href="pageview.php?pageviewId=<?php echo $result['unique_vid']; ?>"><i class="fa fa-eye"></i> Total page</a></span>

                   <?php  } } ?>
                    <?php
                    $pageviewnumber = $result['unique_vid'];
                    $visitpagecount = $vis_co->getVisitorIpbyPagevisit($pageviewnumber);
                    if ($visitpagecount) {
                      $visitpageip = mysqli_num_rows($visitpagecount);
                      echo ' :- '.$visitpageip;
                    }else{ echo "0"; }
                   ?>
                   </td>
                  <td><?php echo $result['datet']; ?></td>
                  <td class="menu_defarent">
                    <?php
                     $uniqueId  = $result['unique_vid'];
                     $checkData = $vis_co->checkDataPageview($uniqueId);
                     if ($checkData) {
                       $checkDataId = mysqli_num_rows($checkData);
                       if (!empty($checkDataId)) {
                    ?>
                    <span><a href="pageview.php?pageviewId=<?php echo $result['unique_vid']; ?>"><i class="fa fa-eye"></i></a></span>

                   <?php  } } ?>
                    <span><a onclick="return confirm('Are you Sure to Delete!')" href="?actionDel=<?php echo $result['unique_vid']; ?>"><i class="glyphicon glyphicon-trash"></i></a></span>

                  </td>
                </tr>
              <?php } } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <?php 
               
                $start_loop = $page;
                $difference = $total_pages - $page;
               
               if ($total_pages > 1) {
                
                if ($difference <= 5) {
                  $start_loop = $total_pages - 5;
                }
                 $end_loop = $start_loop + 4; 

                }

                ?>
                  <nav aria-label="Page navigation example">
                  <ul class="pagination pull-right">
                <?php
                 if($page > 1){
                 echo "<li class='page-item'><a class='page-link'href='totalpageviewlist.php?page=1'>First</a></li>";
                 echo "<li class='page-item'><a class='page-link' href='totalpageviewlist.php?page=".($page - 1)."'><<</a></li>";
                }
                if ($total_pages > 1) {

                $ac = 'active';
                for($i = max(1, $start_loop); $i <= min($end_loop, $total_pages); $i++)
                /*for($i=$start_loop; $i<=$end_loop; $i++)*/
                { 
                  if ($page==$i) {
                    $ac = 'active';
                  }else{
                    $ac = '';
                  }
                 echo "<li class='page-item ".$ac."'><a class='page-link' href='totalpageviewlist.php?page=".$i."'>".$i."</a></li>";
                }

                if($page <= $end_loop){
                 echo "<li class='page-item'><a class='page-link' href='totalpageviewlist.php?page=".($page + 1)."'>>></a></li>";
                 echo "<li class='page-item'><a class='page-link' href='totalpageviewlist.php?page=".$total_pages."'>Last</a></li>";
                }
                }
               ?>
              </ul>
              </nav>
          <!-- end -->
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