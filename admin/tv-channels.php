<?php 
include "inc/header.php"; 
 if (!Session::get('level') == '0') {
  header("Location:index.php");
}
include "../classes/Tvchannels.php";
$tvc = new Tvchannels();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addtv'])) {
  $getBanglaTvMsg = $tvc->getAddBanglaTv($_POST, $_FILES);
}

# Delete Populer news list Catch action Code....
 if (isset($_GET['tvBanglaDelete']) && $_GET['tvBanglaDelete']) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['tvBanglaDelete']);
    $id = preg_replace('/\D/', '', $_GET['tvBanglaDelete']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
    $getDeleteMsg = $tvc->getDeleteTvId($id);
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
       <span style="color: green;">বাংলা </span> <i class="fa fa-television" style="color: red;"></i> <span style="color: green;"> টিভি</span>
      </h1>
     <!--  <div id="google_translate_element"></div> -->


      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Bangla TV </li>
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
              <h3 class="box-title text-success">Add Bangla TV</h3>
              <?php
                  if (isset($getBanglaTvMsg)) {
                    echo $getBanglaTvMsg;
                    echo "<script>
                       setTimeout(function () {
                           window.location.href= 'tv-channels.php'; 
                        },2000);
                     </script>";
                  }
               ?>
            </div>
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
            <div class="box-body">

               <div class="form-group">
                 <input type="text" class="form-control" id="tvname" name="tvname" placeholder=" TV Channels Name! ">
                </div>
                <div class="form-group">
                  <select class="form-control selectedStyle" name="tvcat">
                    <option value="" style="display: none" selected hidden>Select TV Category</option>
                    <option value="1">বাংলাদেশি টিভি</option>
                    <option value="2">ভারতীয় বাংলা টিভি </option>
                    <option value="3">অন্যান্য বিদেশি বাংলা টিভি</option>
                 </select>
               </div>
               <div class="form-group">
                 <input type="text" class="form-control" id="tv_city" name="tv_city" placeholder="City and Country Name!">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control" id="tv_url" name="tv_url" placeholder="Website URL!">
                </div>
                <div class="form-group">
                 <input type="file" name="tviconimg" id="file-7" accept="image/x-png,image/gif,image/jpeg" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
                  <label for="file-7"><span></span> <strong><svg  width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose TV logo &hellip;</strong></label>
                </div>
                <input type="hidden" name="date_time" value="<?php echo date('l jS \of F Y h:i:s A'); ?>">
            <div class="box-footer">
              <button type="submit" name="addtv" class="pull-right btn btn-success">Add TV</button>
            </div>

          </div>
           </form>
          </div>
        </section>
        <section class="col-lg-8">
          <div id="deleteMassagetimeout">
          <?php
           if (isset($getDeleteMsg)) {
             echo $getDeleteMsg;

             echo "<script>
               setTimeout(function () {
                   window.location.href= 'tv-channels.php'; 

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
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">বাংলাদেশি টিভি</a></li>
              <li><a href="#tab_2" data-toggle="tab">ভারতীয় বাংলা টিভি</a></li>
              <li><a href="#tab_3" data-toggle="tab">অন্যান্য বাংলা টিভি</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th width="15%">TV Name</th>
                  <th>Website url</th>
                  <th>Logo</th>
                  <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $result = $tvc->getBangladeshiTv();
                     $i = 0;
                     if ($result) {
                        while ($rows = $result->fetch_assoc()) {
                          $i++;
                  ?>
               <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $rows['tv_n']; ?></td>
                  <td><?php echo $rows['tvc_url']; ?></td>
                  <td><a target="_blank" href="<?php echo $rows['tvc_url']; ?>"><img src="../<?php echo $rows['tv_img']; ?>" class="tvchannels_style"></a></td>
                  <td class="menu_defarent">
                    <span><a href="editTv.php?edit_bangla_tv=<?php echo $rows['tvId']; ?>"><i class="glyphicon glyphicon-edit"></i></a></span>
                    <span><a class="btn_delete" onclick="return confirm('Are you sure to Delete!')" href="?tvBanglaDelete=<?php echo $rows['tvId']; ?>"><i class="glyphicon glyphicon-trash"></i></a></span>
                  </td>
                </tr>
                 <?php } } ?>
                </tbody>
              </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th width="15%">TV Name</th>
                  <th>Website url</th>
                  <th>Logo</th>
                  <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $result = $tvc->getIndianBanglaTv();
                     $i = 0;
                     if ($result) {
                        while ($rows = $result->fetch_assoc()) {
                          $i++;
                  ?>
               <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $rows['tv_n']; ?></td>
                  <td><?php echo $rows['tvc_url']; ?></td>
                  <td><a target="_blank" href="<?php echo $rows['tvc_url']; ?>"><img src="../<?php echo $rows['tv_img']; ?>" class="tvchannels_style"></a></td>
                  <td class="menu_defarent">
                    <span><a href="editTv.php?edit_bangla_tv=<?php echo $rows['tvId']; ?>"><i class="glyphicon glyphicon-edit"></i></a></span>
                    <span><a class="btn_delete" onclick="return confirm('Are you sure to Delete!')" href="?tvBanglaDelete=<?php echo $rows['tvId']; ?>"><i class="glyphicon glyphicon-trash"></i></a></span>
                  </td>
                </tr>
                 <?php } } ?>
                </tbody>
              </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th width="15%">TV Name</th>
                  <th>Website url</th>
                  <th>Logo</th>
                  <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $result = $tvc->getAnotherBanglaTv();
                     $i = 0;
                     if ($result) {
                        while ($rows = $result->fetch_assoc()) {
                          $i++;
                  ?>
               <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $rows['tv_n']; ?></td>
                  <td><?php echo $rows['tvc_url']; ?></td>
                  <td><a target="_blank" href="<?php echo $rows['tvc_url']; ?>"><img src="../<?php echo $rows['tv_img']; ?>" class="tvchannels_style"></a></td>
                  <td class="menu_defarent">
                    <span><a href="editTv.php?edit_bangla_tv=<?php echo $rows['tvId']; ?>"><i class="glyphicon glyphicon-edit"></i></a></span>
                    <span><a class="btn_delete" onclick="return confirm('Are you sure to Delete!')" href="?tvBanglaDelete=<?php echo $rows['tvId']; ?>"><i class="glyphicon glyphicon-trash"></i></a></span>
                  </td>
                </tr>
                 <?php } } ?>
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
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
       
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"; ?>
