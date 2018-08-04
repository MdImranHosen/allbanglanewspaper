<?php 
include "inc/header.php";
 if (!Session::get('level') == '0') {
  header("Location:index.php");
}
include "../classes/Community.php";
$comy = new Community();
 # Category Add insert Query pass..
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comy_video'])) {
          
    $community_video  = $comy->communityVideoUpdate($_POST);
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
        Community Video
        <small>Bangladeshi Community</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Community Video</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-8 col-lg-offset-2">
          <!-- Custom tabs (Charts with tabs)-->
        <?php 
         $getVideo = $comy->getVideoResult();
         if ($getVideo) {
           $vresult = $getVideo->fetch_assoc();
        ?>
          <div class="box">
           
            <div class="box-header">
              <i class="fa fa-video-camera"></i>

              <h3 class="box-title"><?php echo $vresult['com_v_title']; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <?php 
               if (!empty($vresult['com_yt_url']) || $vresult['com_yt_url'] != NULL) {
             ?>
             <iframe width="<?php echo $vresult['video_width']; ?>" height="<?php echo $vresult['video_height']; ?>" src="<?php echo $vresult['com_yt_url']; ?>" frameborder="0" 
              <?php if ($vresult['autoplay'] == '1') { ?> allow="autoplay; encrypted-media" <?php } ?>
              <?php if ($vresult['allowfs'] == '1') { ?> allowfullscreen <?php } ?>
              
              ></iframe>
             <?php } ?>
            </div>
            <!-- /.box-body -->
            
          </div>
           <!-- /.nav-tabs-custom -->
           <?php
             #Reistration from massage show..
               if (isset($community_video)) {
                 echo $community_video;
                 echo "<script>
                   setTimeout(function () {
                       window.location.href= 'community-video.php'; 

                    },2000);
                 </script>";
               }
           ?>
          <!-- quick email widget -->
                    
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-wrench"></i>

              <h3 class="box-title">Community Video</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Hidden Of Input From"><i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <form id="signupFormComy" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div class="box-body">
               <input type="hidden" name="com_vId" value="<?php echo $vresult['id']; ?>">
                <div class="form-group community_script">
                  <label>Video Title</label>
                 <input type="text" class="form-control" name="community_ty_title" value="<?php echo $vresult['com_v_title']; ?>">
                </div>
                <div class="form-group community_script">
                  <label>Youtube Video URL ( Just copy youtube video url than past in )</label>
                 <input type="text" class="form-control" name="community_video_url" value="<?php echo $vresult['com_yt_url']; ?>">
                </div>
                <div class="form-group community_script">
                 <label>Video Height</label>
                 <input type="text" class="form-control" name="community_video_height" value="<?php echo $vresult['video_height']; ?>">
                </div>
                <div class="form-group community_script">
                 <label>Video Width</label>
                 <input type="text" class="form-control" name="community_video_width" value="<?php echo $vresult['video_width']; ?>">
                </div>
               <div class="form-group">
                  <input type="hidden" name="allowfs" value="0">
                  <input type="checkbox" name="allowfs" <?php if ($vresult['allowfs'] == '1') { ?> checked="checked" <?php } ?> class="flat-red" id="allowfs" value="1">
                  <label class="form-check-label" for="allowfs">Allowfullscreen</label>
              </div>
              <div class="form-group">
                  <input type="hidden" name="autoplay" value="0">
                  <input type="checkbox" name="autoplay" <?php if ($vresult['autoplay'] == '1') { ?> checked="checked" <?php } ?> class="flat-red" id="autoplay" value="1">
                  <label class="form-check-label" for="autoplay">Autoplay</label>
              </div>

            <div class="box-footer">
              <button type="submit" name="comy_video" class="center-block btn btn-success">Update</button>
            </div>
          </div>
           </form>
          </div>
          <?php  } ?>
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

      $( "#signupFormComy" ).validate( {
        rules: {
            community_ty_title: {
            required: true,
            minlength: 10,
            maxlength: 130 
          },
          community_video_url: {
            required: true,
            minlength: 10,
            maxlength: 200,
            url:true 
          },
          community_video_height: {
            required: true,
            minlength: 2,
            maxlength: 3,
            number: true
          },
          community_video_width: {
            required: true,
            minlength: 2,
            maxlength: 8
          }
        },
        messages: {
            community_ty_title: {
            required: "Please enter Video Title",
            minlength: "Video Title Minlength 10 Characters",
            maxlength: "Video Title Maxlength 130 Characters"
          },
          community_video_url: {
            required: "Please enter Youtube Video Share URL",
            minlength: "Video URL at least 10 characters",
            maxlength: "Video URL Maxlength 200 Characters"
          },
          community_video_height: {
            minlength: "Video Height Minlength 2 Characters",
            maxlength: "Video Height Maxlength 3 Characters"
          },
          community_video_width: {
            minlength: "Video Width Minlength 2 Characters",
            maxlength: "Video Width Maxlength 8 Characters"
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