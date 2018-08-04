<?php 
include "inc/header.php";
 if (!Session::get('level') == '0') {
  header("Location:index.php");
}
include "../classes/Community.php";
$comy = new Community();
 # Community Add insert Query pass..
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
          
    $community_msg  = $comy->communityAdd($_POST);
 }

 #Community Settings Query..
if (isset($_POST['setting_comm'])) {
   $community_setting = $comy->communitySettingUpdate($_POST);
}
  # Community List Delete Action Get....
 if (isset($_GET['actionDel']) && $_GET['actionDel']) {
    $commId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['actionDel']);
    $commId = mysqli_real_escape_string($db->link, $commId);
    $commId = preg_replace('/\D/', '', $commId);
    $commId = (int)$commId;
    $getMsg = $comy->getCommunityDelete($commId);
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
        Community
        <small>Bangladeshi Community</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Community</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-5 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <!-- /.nav-tabs-custom -->
           <?php
             #Reistration from massage show..
               if (isset($community_msg)) {
                 echo $community_msg;
                 echo "<script>
                   setTimeout(function () {
                       window.location.href= 'bangladeshi-community.php'; 

                    },2000);
                 </script>";
               }
           ?>
          <!-- quick email widget -->
                    
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-plus-square"></i>

              <h3 class="box-title">Community</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Hidden Of Input From"><i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <form id="signupForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div class="box-body">
                <div class="form-group community_script">
                 <input type="text" class="form-control" name="community_name" placeholder="Add Community Name! " id="community_name">
                </div>
                <div class="form-group community_script">
                 <input type="text" class="form-control" name="community_location" placeholder="Add Community Location! ">
                </div>
                <div class="form-group community_script">
                 <input type="text" class="form-control" name="community_url" placeholder="Add Community website URL!">
                </div>
                <div class="form-group community_script">
                 <input type="text" class="form-control" name="community_fburl" placeholder="Add Community facebook URL!">
                </div>
                <div class="form-group">
                 <label class="radio-inline"><input type="radio" name="community_popular" value="1" checked="">সাধারণ </label>
                 <label class="radio-inline"><input type="radio" name="community_popular" value="2">জনপ্রিয় </label>
                </div>
                <div class="form-group">
                 <label class="radio-inline"><input type="radio" name="community_level" value="1" >Richest Country</label>
                 <label class="radio-inline"><input type="radio" name="community_level" value="2" checked="">Other </label>
                </div>
            <div class="box-footer">
              <button type="submit" name="submit" class="pull-right btn btn-success" id="addcommunity">Add</button>
            </div>
          </div>
           </form>
          </div>
          
        </section>
        <!-- /.Left col -->
         <section class="col-lg-7 connectedSortable">
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-cog"></i>
              <h3 class="box-title">Community Setting</h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Hidden Of Input From"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-sortable">
                  <thead>
                    <tr>
                      <th>Per Page Community Show</th>
                      <th>Order By</th>
                      <th>ASC or DESC</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                     $comm_settings = $comy->getCommunitySettingResult();
                     if ($comm_settings) {
                       while ($comm_settings_r = $comm_settings->fetch_assoc()) {
                  ?>
                  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                    <tr>
                      <td>
                        <select name="record_per_page_show">
                          <option value="3" <?php if ($comm_settings_r['record_per_page'] == '3') { ?> selected <?php } ?> > LIMIT 3 </option>
                          <option value="6" <?php if ($comm_settings_r['record_per_page'] == '6') { ?> selected <?php } ?> > LIMIT 6 </option>
                          <option value="9" <?php if ($comm_settings_r['record_per_page'] == '9') { ?> selected <?php } ?> > LIMIT 9 </option>
                          <option value="12" <?php if ($comm_settings_r['record_per_page'] == '12') { ?> selected <?php } ?> > LIMIT 12 </option>
                          <option value="15" <?php if ($comm_settings_r['record_per_page'] == '15') { ?> selected <?php } ?> > LIMIT 15 </option>
                          <option value="18" <?php if ($comm_settings_r['record_per_page'] == '18') { ?> selected <?php } ?> > LIMIT 18 </option>
                          <option value="21" <?php if ($comm_settings_r['record_per_page'] == '21') { ?> selected <?php } ?> > LIMIT 21 </option>
                          <option value="24" <?php if ($comm_settings_r['record_per_page'] == '24') { ?> selected <?php } ?> > LIMIT 24 </option>
                          <option value="27" <?php if ($comm_settings_r['record_per_page'] == '27') { ?> selected <?php } ?> > LIMIT 27 </option>
                          <option value="30" <?php if ($comm_settings_r['record_per_page'] == '30') { ?> selected <?php } ?> > LIMIT 30 </option>
                        </select>
                      </td>
                      <td>
                        <select name="order_by_result">
                          <option value="com_name" <?php if ($comm_settings_r['order_by'] == 'com_name') { ?> selected <?php } ?> >Community Name</option>
                          <option value="com_location" <?php if ($comm_settings_r['order_by'] == 'com_location') { ?> selected <?php } ?> >Community Location</option>
                          <option value="comyId" <?php if ($comm_settings_r['order_by'] == 'comyId') { ?> selected <?php } ?> >Community ID</option>
                        </select>
                      </td>
                      <td>
                        <select name="asc_desc_order">
                          <option value="ASC" <?php if ($comm_settings_r['asc_desc'] == 'ASC') { ?> selected <?php } ?> >ASC</option>
                          <option value="DESC" <?php if ($comm_settings_r['asc_desc'] == 'DESC') { ?> selected <?php } ?> >DESC</option>
                        </select>
                      </td>
                      <td>
                        <input type="hidden" name="com_setting_Id" value="<?php echo $comm_settings_r['com_setting_Id']; ?>">
                        <input class="btn btn-danger" type="submit" name="setting_comm" value="Update" >
                      </td>
                    </tr>
                  </form>
                <?php } } ?>
                  </tbody>
                </table>
            </div>
          </div>
        </section>
        <section class="col-lg-7 connectedSortable">
          <?php
             if (isset($getMsg)) {
               echo $getMsg;
               echo "<script>
                   setTimeout(function () {
                       window.location.href= 'bangladeshi-community.php'; 

                    },2000);
                 </script>";
             }
          ?>
          <div class="box">
            <div class="box-header">
              <i class="fa fa-list-ul"></i>

              <h3 class="box-title">Community List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="50%">Name</th>
                  <th width="15%">Location</th>
                  <th width="20%">Website</th>
                  <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                 #record per page show limit query start..
                  $getperPage = $comy->getCommunitySettingResult();
                  $perPage = $getperPage->fetch_assoc();
                  $recordPerPage = $perPage['record_per_page'];
                  #end
                  $record_per_page = $recordPerPage;
                  $getPagination = $comy->getPaginationResult();
              
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
                  $getResult = $comy->getCommunityPerPage($start_from,$record_per_page);
                  if ($getResult) {
                    while ($result = $getResult->fetch_assoc()) {
                 ?>
                <tr>
                  <td><?php echo $result['com_name']; ?></td>
                  <td><?php echo $result['com_location']; ?></td>
                  <td class="webfb_defarent">
                    <?php
                        if ($result['com_url'] != NULL) {
                     ?>
                     <a target="_blank" href="<?php echo $result['com_url']; ?>"><i class="fa fa-globe"></i>Web </a> 
                     <?php  } 
                        if ($result['fb_url'] != NULL) {
                     ?>
                     <a target="_blank" href="<?php echo $result['fb_url']; ?>"><i class="fa fa-facebook"></i>FB</a> 
                   <?php } ?>
                  </td>
                  <td class="menu_defarent">
                    <span><a href="edit-community.php?edit_community=<?php echo $result['comyId']; ?>"><i class="glyphicon glyphicon-edit"></i></a></span>
                    <span><a onclick="return confirm('Are you Sure to Delete!')" href="?actionDel=<?php echo $result['comyId']; ?>"><i class="glyphicon glyphicon-trash"></i></a></span>

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
                 echo "<li class='page-item'><a class='page-link'href='bangladeshi-community.php?page=1'>First</a></li>";
                 echo "<li class='page-item'><a class='page-link' href='bangladeshi-community.php?page=".($page - 1)."'><<</a></li>";
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
                 echo "<li class='page-item ".$ac."'><a class='page-link' href='bangladeshi-community.php?page=".$i."'>".$i."</a></li>";
                }

                if($page <= $end_loop){
                 echo "<li class='page-item'><a class='page-link' href='bangladeshi-community.php?page=".($page + 1)."'>>></a></li>";
                 echo "<li class='page-item'><a class='page-link' href='bangladeshi-community.php?page=".$total_pages."'>Last</a></li>";
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
  <script type="text/javascript">


    $( document ).ready( function () {

      $( "#signupForm" ).validate( {
        rules: {
            community_name: {
            required: true,
            minlength: 5,
            maxlength: 120 
          },
          community_location: {
            required: true,
            minlength: 2,
            maxlength: 50 
          },
          community_url: {
            required: false,
            minlength: 5,
            maxlength: 100,
            url: true
          },
          community_fburl: {
            required: false,
            minlength: 5,
            maxlength: 100,
            url: true
          }
        },
        messages: {
            community_name: {
            required: "Please enter Community Name",
            minlength: "Community Name Minlength 5 Characters",
            maxlength: "Community Name Maxlength 120 Characters"
          },
          community_location: {
            required: "Please enter Community Location",
            minlength: "Community Location Minlength 2 Characters",
            maxlength: "Community Location Maxlength 50 Characters"
          },
          community_url: {
            minlength: "Community Website URL must consist of at least 5 characters",
            maxlength: "Community Website URL Maxlength 100 Characters"
          },
          community_fburl: {
            minlength: "Community Facebook URL must consist of at least 5 characters",
            maxlength: "Community Facebook URL Maxlength 100 Characters"
          }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );

          // Add `has-feedback` class to the parent div.form-group
          // in order to add icons to inputs
          element.parents( ".community_script" ).addClass( "has-feedback" );

          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          }

          // Add the span element, if doesn't exists, and apply the icon classes to it.
          if ( !element.next( "span" )[ 0 ] ) {
            $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
          }
        },
        success: function ( label, element ) {
          // Add the span element, if doesn't exists, and apply the icon classes to it.
          if ( !$( element ).next( "span" )[ 0 ] ) {
            $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
          }
        },
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".community_script" ).addClass( "has-error" ).removeClass( "has-success" );
          $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".community_script" ).addClass( "has-success" ).removeClass( "has-error" );
          $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
        }
      } );
    } );
  </script>