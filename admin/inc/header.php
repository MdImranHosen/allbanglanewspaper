<?php

 include "../lib/Session.php";
 Session::checkSession();

  include "../lib/Database.php";
  include "../helpers/Format.php";
  include "../classes/Bangla_news.php";
  include "../classes/Site_etc.php";
  include "../classes/Contact.php";
  include "../classes/About_address.php";

  $db  = new Database();
  $fm  = new Format();
  $bn_ns = new Bangla_news();
  $site_etc = new Site_etc();
  $con_us = new Contact();
  

   /* Logout Options in All Bangla News Paper */ 
    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        Session::destroy();
    }
    /* Cache control or Cache Remove */
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
  ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php
   $getSiteetc = $site_etc->getSiteEtcByIdShow();
   if ($getSiteetc) {
     while ($result = $getSiteetc->fetch_assoc()) {
  ?> 
  <link rel="icon" href="../<?php echo $result['browser_icon']; ?>">
  <?php } } ?>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap Select with serch option -->
  <link rel="stylesheet" type="text/css" href="bower_components/bootstrap-select/dist/css/bootstrap-select.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Image cropper  -->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    .menu_defarent{text-align: center;}
    .menu_defarent span{padding-right: 8px;}
    .menu_defarent span a{}
    .selectedStyle{cursor: pointer;border-radius: 3px;}
    .fileImage{border: 1px solid #ddd;}
    .tvchannels_style{width: 120px;height: auto;}
    .bangla_district_world li > a{font-size: 22px;line-height: 28px;font-weight: bold;}
    .labelstyle{font-size: 18px;line-height: 25px;font-style: normal;font-weight: normal;}
    .control-froms[disabled]{cursor: not-allowed;background-color: #eee;
    opacity: 1;}
    .control-froms {
    display: block;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
  }
  .paperlogo{width: 120px;height: 50px;}
  .scolor{color: red;}
  .form-control{font-size: 16px;font-weight: normal;}
  </style>
</head>