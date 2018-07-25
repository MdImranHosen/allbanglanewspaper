<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} 

  # Contact us Message View Action Get....
 if (isset($_GET['replyMessage']) && $_GET['replyMessage']) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['replyMessage']);
    $id = (int)$id;
 }

 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

   $getMessageSend = $con_us->getMessageSendid($_POST);
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
         
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mailbox
         <small><?php 
              $getInbox = $con_us->getInboxMessageSer();
              if ($getInbox) {
                $count = mysqli_num_rows($getInbox);
                echo $count;
              }else{ echo "0"; }  
            ?> new messages</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#" onclick="history.go(-1);"><img src="upload/back.png" width="12px" height="12px"></a></li>
        <li class="active">Mailbox</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="mailbox.php" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>

         <?php include 'inc/inbox.php' ?>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <form action="" method="post">
            <?php
              $getMsgId = $con_us->getUserMessageViewId($id);
                if ($getMsgId) {
               while ($result = $getMsgId->fetch_assoc()) {
             ?>
            <div class="box-header with-border">
              <h3 class="box-title">Compose New Message</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <input class="form-control" name="emailto" readonly="" value="<?php echo $result['user_email']; ?>">
              </div>
              <div class="form-group">
                <input class="form-control" name="emailfrom" value="pdnewsbd65@gmail.com" >
              </div>
              <div class="form-group">
                <input class="form-control" name="subject" placeholder="Subject:" required="">
              </div>
              <div class="form-group">
                    <textarea id="compose-textarea" name="user_message" class="form-control" style="height: 150px">

                    </textarea>
              </div>
              <div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Attachment
                  <input type="file" name="attachment">
                </div>
                <p class="help-block">Max. 32MB</p>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
                <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
              </div>
              <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
            </div>
             <?php } } ?>
            </form>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"; ?>
