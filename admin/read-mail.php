<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php

  # Contact us Message View Action Get....
 if (isset($_GET['viewContactmsg']) && $_GET['viewContactmsg']) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['viewContactmsg']);
    $id = (int)$id;
    $msg = $con_us->getUserMessageViewokId($id);
 }

  if (isset($_GET['deleteContactUse']) && $_GET['deleteContactUse']) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['deleteContactUse']);
    $id = (int)$id;
    $getMsg = $con_us->getUserMessageDelete($id);
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
    <?php
     if (isset($getMsg)) {
      echo $getMsg;
      echo '<script>
             window.location.href="mailbox.php";
         </script>';
     }
    ?>
    <section class="content-header">
      <h1>
       Read Mail
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#" onclick="history.go(-1);"><img src="upload/back.png" width="12px" height="12px"></a></li>
        <li class="active"> User Message View </li>
      </ol>
    </section>
      <?php
         $getMsgId = $con_us->getUserMessageViewId($id);
         if ($getMsgId) {
           while ($result = $getMsgId->fetch_assoc()) {
      ?>
             
            
    <!-- Main content -->
       <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="compose.php" class="btn btn-primary btn-block margin-bottom">Compose</a>

          <?php include 'inc/inbox.php' ?>
          <!-- /. box -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Read Mail</h3>

              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3><?php echo $result['user_subject']; ?></h3>
                <h5>From: <?php echo $result['user_email']; ?>
                  <span class="mailbox-read-time pull-right">
                    <?php echo $fm->FormatDate($result['date']); ?>
                  </span></h5>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                    <a onclick="return confirm('Are you Sure to Delete!')" href="?deleteContactUse=<?php echo $result['user_id']; ?>"><i class="fa fa-trash-o"></i></a>
                   </button>
                  <button type="button"  class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                    <a href="reply-mail.php?replyMessage=<?php echo $result['user_id']; ?>"><i class="fa fa-reply"></i></a>
                    </button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                    <i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                  <i class="fa fa-print"></i></button>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p><?php echo $result['user_name']; ?></p>

                <p><?php echo $result['user_message']; ?></p>

                <p>Thanks,<br><?php echo $result['user_name']; ?></p>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="pull-right">
                <!-- <button type="button" class="btn btn-default"> -->
                  <a class="btn btn-default" href="reply-mail.php?replyMessage=<?php echo $result['user_id']; ?>" title="Reply Message." data-toggle="tooltip" data-container="body" ><i class="fa fa-reply"></i>Reply</a>
                 <!-- </button> -->
                <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
              </div>
              <!-- <button type="button" class="btn btn-default"> -->
                <a class="btn btn-default" onclick="return confirm('Are you Sure to Delete!')" href="?deleteContactUse=<?php echo $result['user_id']; ?>" title="Are you Sure to Delete!" data-toggle="tooltip" data-container="body"><i class="fa fa-trash-o"></i> Delete</a>
               <!-- </button> -->
              <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <?php } } ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"; ?>