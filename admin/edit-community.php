<?php 
include "inc/header.php";
 if (!Session::get('level') == '0') {
  header("Location:index.php");
}
include "../classes/Community.php";
$comy = new Community();

 if (!isset($_GET['edit_community']) || $_GET['edit_community'] == NULL) {
      header('Location:bangladeshi-community.php');
  }elseif($_GET['edit_community'] == 0){
  header('Location:bangladeshi-community.php');
  }elseif(!preg_replace('/\D/', '', $_GET['edit_community'])){
  header('Location:bangladeshi-community.php');
  }else{
    $edit_Id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['edit_community']);
    $edit_Id = preg_replace('/\D/', '', $_GET['edit_community']);
    $edit_Id = mysqli_real_escape_string($db->link, $edit_Id);
    $edit_Id = (int)$edit_Id;

 }
 # Category Add insert Query pass..
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
          
    $community_msg  = $comy->communityUpdate($_POST);
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
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home </a></li>
        <li class="active">Edit-Community </li>
        <button type="button" class="btn btn-success pull-right" onclick="addCommunity();">
            <i class="fa fa-plus-square"></i> Community </button>
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
                }
           ?>
          <!-- quick email widget -->
                    
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-edit"></i>

              <h3 class="box-title">Community</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <?php
               $resultShow = $comy->getCommunityEditResult($edit_Id);
               if ($resultShow) {
                 while ($showResult = $resultShow->fetch_assoc()) {
            ?>
            <form id="signupForm" action="" method="post">
            <div class="box-body">
                <input type="hidden" name="editId" value="<?php echo $showResult['comyId']; ?>">
                <div class="form-group community_script">
                 <input type="text" class="form-control" name="community_name" value="<?php echo $showResult['com_name']; ?>" />
                </div>
                <div class="form-group community_script">
                 <input type="text" class="form-control" name="community_location" value="<?php echo $showResult['com_location']; ?>" />
                </div>
                <div class="form-group community_script">
                 <input type="text" class="form-control" name="community_url" value="<?php echo $showResult['com_url']; ?>" />
                </div>
                <div class="form-group community_script">
                 <input type="text" class="form-control" name="community_fburl" value="<?php echo $showResult['fb_url']; ?>" />
                </div>
                <div class="form-group">
                 <label class="radio-inline"><input type="radio" name="community_popular" value="1" <?php if ($showResult['com_popular'] == '1') { ?> checked="checked" <?php } ?> />সাধারণ </label>
                 <label class="radio-inline"><input type="radio" name="community_popular" value="2" <?php if($showResult['com_popular'] == '2'){ ?> checked="checked" <?php } ?> />জনপ্রিয় </label>
                </div>
                <div class="form-group">
                 <label class="radio-inline"><input type="radio" name="community_level" value="1" <?php if($showResult['com_level'] == '1'){ ?> checked="checked" <?php } ?> />Richest Country</label>
                 <label class="radio-inline"><input type="radio" name="community_level" value="2" <?php if($showResult['com_level'] == '2'){ ?> checked="checked" <?php } ?> />Other </label>
                </div>
            <div class="box-footer">
              <button type="submit" name="update" class="pull-right btn btn-success">Update</button>
            </div>
          </div>
           </form>
          <?php } } ?>
          </div>
          
        </section>
        <!-- /.Left col -->
        <section class="col-lg-7 connectedSortable">
          <?php
             if (isset($getMsg)) {
               echo $getMsg;
             }
          ?>
          <div class="box">
            <div class="box-header">
              <i class="fa fa-list-ul"></i>

              <h3 class="box-title">Community List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Location</th>
                  <th>Website</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              <?php
                 $getData = $comy->getCommunityData();
                 if ($getData) {
                   while ($result = $getData->fetch_assoc()) {
                ?>
                <tr>
                  <td><?php echo $result['com_name']; ?></td>
                  <td><?php echo $result['com_location']; ?></td>
                  <td>
                    <?php
                        if ($result['com_url'] != NULL) {
                     ?>
                     <a target="_blank" href="<?php echo $result['com_url']; ?>"><i class="fa fa-globe"></i>Web </a> 
                     <?php  } 
                        if ($result['fb_url'] != NULL) {
                          echo '|';
                     ?>
                     <a target="_blank" href="<?php echo $result['fb_url']; ?>"><i class="fa fa-facebook"></i>FB</a> 
                    <?php } ?>
                  </td>
                  <td class="menu_defarent">
                    <span><a href="edit-community.php?edit_community=<?php echo $result['comyId']; ?>"><i class="glyphicon glyphicon-edit"></i></a></span>
                    <span><a onclick="return confirm('Are you Sure to Delete!')" href="bangladeshi-community.php?actionDel=<?php echo $result['comyId']; ?>"><i class="glyphicon glyphicon-trash"></i></a></span>

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