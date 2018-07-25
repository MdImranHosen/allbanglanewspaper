<?php
$page = $_SERVER['PHP_SELF'];
$sec  = "40";
?>
<?php
  include "../classes/AdminLogin.php";
?>
<?php
$al = new AdminLogin();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $admin_email  = $_POST['email'];
    $admin_pass   = md5($_POST['password']);
    $captcha_code = $_POST['captcha_code'];
    
    $login_mas   = $al->admin_loginchak($admin_email, $admin_pass, $captcha_code);

}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="refresh" content="<?php echo $sec;?>;URL='<?php echo $page; ?>'" > 
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="dist/img/icon.png">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">

    .ligin_bottom_bt{display: none;}
    .espacebottom{margin-bottom: 5px;}
    .signin_title{display: none;}
    .captcha_input_style{width: 150px;padding: 5px;border: 1px solid #ccc;margin-left: 5px;}
    @media(max-width:360px ){
      .ligin_bottom_bt{display: block;}
      .ligin_bottom_bta{display: none;}
      .signin_title_up{display: none;}
      .signin_title{display: block;}
    }
  </style>
  <script type='text/javascript'>
  function refreshCaptcha(){
    var img = document.images['captchaimg'];
    img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
  }
  </script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a target="_blank" href="../index.php"><b>Admin</b>Panel</a>
  </div>
  <!-- /.login-logo -->
    <div class="login-box-body">
    <p class="login-box-msg">
     <?php  if (isset($login_mas)) { echo $login_mas; ?>
       <script type="text/javascript">
        setTimeout(function(){
          window.location.href='login.php';
        },2000)
       </script>
     <?php } else{ ?>
      <h4 align="center" class="btn btn-lg btn-success btn-block btn-flat signin_title_up">Sign in to start your session</h4>
      <h5 align="center" class="btn btn-md btn-success btn-block btn-flat signin_title">Sign in to start your session</h5>
      <?php } ?>
    </p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback"> 
            <img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'>
            <a href='javascript: refreshCaptcha();'> <span class="glyphicon glyphicon-refresh"></span></a>
            <input id="captcha_code" class="captcha_input_style" name="captcha_code" type="text">
      </div>
      <div class="row ligin_bottom_bta">
        <div class="col-xs-6">
          <a href="#" class="btn btn-default btn-block">Forgot Password</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" name="submit" onclick="return validate();" class="btn btn-success btn-block">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
      <div class="row ligin_bottom_bt">
        <div class="col-xs-12">
           <button type="submit" name="submit" onclick="return validate();" class="btn btn-success btn-block espacebottom">Sign In</button>
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
          <a href="#" class="btn btn-default btn-block">Forgot Password</a>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <hr>

    <p style="padding-top: 20px;padding-bottom: 0px;margin-bottom: 0px;" align="center">Copyright &copy; <?php echo date("Y"); ?> <a target="_blank" href="../index.php">Tech Group</a></p>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
