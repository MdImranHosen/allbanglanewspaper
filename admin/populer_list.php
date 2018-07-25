<?php include "inc/header.php"; ?>
<?php if (!Session::get('level') == '0') {
  header("Location:index.php");
} ?>
<?php
include "../classes/Populer_list.php";
$po_list = new Populer_list();
?>
<?php 
# Delete Populer news list Catch action Code....
 if (isset($_GET['populerNewsDelete']) && $_GET['populerNewsDelete']) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['populerNewsDelete']);
    $id = (int)$id;
    $getDeleteMsg = $po_list->getDeletePopulerNews($id);
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
      <!-- Main row -->
      <div class="row">
        <section class="col-lg-12 connectedSortable">
          <div id="deleteMassagetimeout">
          <?php
           if (isset($getDeleteMsg)) {
             echo $getDeleteMsg;

             echo "<script>
               setTimeout(function () {
                   window.location.href= 'populer_list.php'; 

                },2000);
            </script>";
           }
          ?>
          </div>
          <div class="box">
            <div class="box-header">
             
               <i class="fa fa-list-ul"></i>
               <h3 class="box-title">Populer News Paper List</h3>
               
               <button type="button" class="btn btn-success pull-right" onclick="PopulerNewsPaper();">
                <i class="fa fa-plus-square"></i>
                 খবরের কাগজ
               </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th width="15%">নাম</th>
                  <th>Title</th>
                  <th>কাগজ ইউআরএল</th>
                  <th>লোগো</th>
                  <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $result = $po_list->getPopulerNewsPaper();
                     $i = 0;
                     if ($result) {
                        while ($rows = $result->fetch_assoc()) {
                          $i++;
                  ?>
               <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $rows['name']; ?></td>
                  <td><?php echo $rows['title']; ?></td>
                  <td><?php echo $rows['news_url']; ?></td>
                  <td><img src="<?php echo $rows['image']; ?>" width='220px' height='40px'></td>
                  <td class="menu_defarent">
                    <span><a href="editPopulerNewsPaper.php?edit_populer_newsPaper=<?php echo $rows['id']; ?>"><i class="glyphicon glyphicon-edit"></i></a></span>
                    <span><a class="btn_delete" onclick="return confirm('Are you sure to Delete!')" href="?populerNewsDelete=<?php echo $rows['id']; ?>"><i class="glyphicon glyphicon-trash"></i></a></span>
                  </td>
                </tr>
                 <?php } } ?>
                </tbody>
              </table>
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
