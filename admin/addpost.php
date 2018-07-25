<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php
include "../classes/Post.php";
include "../classes/Category.php";
$post = new Post();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    
    $getNewsPostMsg = $post->getNewsPostInsert($_POST, $_FILES);
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
      <ol class="breadcrumb">
        <li><a href="post_list.php" title="All News List."><i class="fa fa-list"></i>All News List</a></li>
        <li class="active"></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <?php
           if (isset($getNewsPostMsg)) {
             echo $getNewsPostMsg;
             echo "<script>
               setTimeout(function() {
                   window.location.href= 'addpost.php'; 

                },2000);
            </script>";
           }
        ?>
        <section class="col-md-12 connectedSortable">
          <div class="box box-info">
          <div class="box-header">
              <h3 class="box-title breadcrumb"><i class="fa fa-plus"></i> Add New Post</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Hidden Of Input From"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info" title="View News List" onclick="post_list();">
                <i class="fa fa-eye"></i> View LIst </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
          <div class="box-body pad">
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
             <div class="form-group">
              <input type="text" class="form-control" name="newsTitle" id="formGroupExampleInput" aria-describedby="emailHelp" placeholder="Enter News Title...">
            </div>
            <div class="form-group">
              <label>Title Color: </label>
              <input type="color" style="padding: 2px;width: 100px;height: 30px;" name="titleColor">
            </div>
            <div class="form-group">
                  <select class="form-control selectedStyle" name="catId">
                    <option value="" style="display: none" selected hidden>Select Category</option>
                    <?php
                       $cat = new Category();
                       $catResult = $cat->getCategoryData();
                       if ($catResult) {
                        while ($result = $catResult->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $result['catId'] ?>"><?php echo $result['category']; ?></option>
                    <?php } } ?>
                 </select>
            </div>
            <!-- Date -->
            <!--<div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="c_date" value="<?php # echo date('m/d/Y'); ?>" class="form-control pull-right" id="datepicker">
                </div>
              </div>-->
            <input type="hidden" name="c_date" value="<?php echo date('m/d/Y'); ?>">
            <div class="form-group">
              <input type="file" name="newsImage" id="file-7" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
                  <label for="file-7"><span></span> <strong><svg  width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose image &hellip;</strong></label>
           </div>
          <!-- /.form group -->
           <div class="form-group">
                 <textarea id="editor1" name="details_news" rows="10" cols="80"></textarea>
           </div>
           <div class="form-group">
              <input type="hidden" name="optradio" value="0">
              <label class="radio-inline"><input type="radio" name="optradio" value="1">সাধারণ সংবাদ</label>
              <label class="radio-inline"><input type="radio" name="optradio" value="2">গুরুত্বপূর্ণ সংবাদ</label>
            </div>
            <div class="form-group">
              <input type="file" name="extraImage" id="file-8" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
                  <label for="file-8"><span></span> <strong><svg  width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Extra Image &hellip;</strong></label>
           </div>
           <div class="form-group">
              <input type="tel" class="form-control" multiple="multiple" name="s_tag" id="formGroupExampleInput" aria-describedby="emailHelp" placeholder="Enter News Tag...">
            </div>
            <button type="reset" class="btn btn-primary">Cancle</button>
            <button type="submit" name="submit" title="Publish news." class="btn btn-primary">Submit</button>
          </form>
         </div>

        </section>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
<script src="js/custom-file-input.js"></script>
<?php include "inc/footer.php"; ?>
