<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php
include "../classes/Populer_list.php";
$po_list = new Populer_list();

 if (!isset($_GET['edit_populer_newsPaper']) || $_GET['edit_populer_newsPaper'] == NULL) {
      header("Location:populer_list.php");
 } else{
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['edit_populer_newsPaper']);
    $id = (int)$id;
 }

 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {

    $getPopulerNewsUpdateMsg = $po_list->getAddPopulerNewsUpdate($_POST, $_FILES, $id);
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
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <?php
          if (isset($getPopulerNewsUpdateMsg)) {
            echo $getPopulerNewsUpdateMsg;
            echo "<script>
               setTimeout(function () {
                   window.location.href= 'populer_list'; 

                },2000);
            </script>";
          }
       ?>
      <div class="row">
        <section class="col-lg-8 connectedSortable">
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-pencil-square-o"></i>
              <h3 class="box-title">Edit Populer News Paper Data!</h3>
              <!-- tools box -->
              <button type="button" class="btn btn-success pull-right" onclick="sdgfg();">
                <i class="fa fa-eye"></i>
                 View LIst
               </button>
              <!-- /. tools -->
            </div>
            <?php 
              $updateResult = $po_list->getPopulerNewsUpdateResult($id);
              if ($updateResult) {
                while ($result = $updateResult->fetch_assoc()) {
            ?>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="box-body">

               <div class="form-group">
                 <input type="text" class="form-control" name="editnewsname" value="<?php echo $result['name']; ?>">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control" name="edittitle" value="<?php echo $result['title']; ?>">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control" name="editnews_url" value="<?php echo $result['news_url']; ?>">
                </div>
                <div class="form-group">
                  <img src="<?php echo $result['image'];?>" alt="Logo">
                  <input type="file" name="editImage" id="file-7" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
                  <label for="file-7"><span></span> <strong><svg  width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Change logo&hellip;</strong></label>
              </div>
            <div class="box-footer">
              <button type="submit" name="update" class="pull-right btn btn-success">
                <i class="fa fa-refresh"></i> Update</button>
            </div>

          </div>
           </form>
           <?php } } ?>
          </div>
        </section>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script src="js/custom-file-input.js"></script>
<?php include "inc/footer.php"; ?>
