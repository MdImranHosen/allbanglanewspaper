<?php 
include 'lib/Session.php'; 
Session::init();

include 'classes/Show_news.php';
include "classes/Populer_newsPaper.php";
include "classes/Bangla_news.php";
include "classes/Meta_title.php";
include "classes/Socail.php";
include "classes/Site_etc.php";
include "classes/About_address.php";
include "classes/Community.php";

 $db = new Database();
 $fm = new Format();
 $show = new Show_news();
 $populer_news = new Populer_newsPaper();
 $bn_ns = new Bangla_news();
 $socail = new Socail();
 $site_etc = new Site_etc();
 $about_address = new About_address();
 $comm = new Community();

 //Cache Remove Code Start....
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: pre-check=0, post-check=0, max-age=0"); 
header("Pragma: no-cache");
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>
<!DOCTYPE html>
<html lang="en" class="no-js" ng-app>
<head>
<?php 
include "script/title.php";
include "script/meta.php";
include "unique_visitor.php";
?>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/font.css">
<link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="css/digital-clock.css">
<!-- <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> -->
<!-- Home page Style -->
<link rel="stylesheet" type="text/css" href="css/social.css">
<link rel="stylesheet" type="text/css" href="css/menu_style.css">
<link rel="stylesheet" type="text/css" href="css/page_text_style.css">

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700|Droid+Serif:400,700|Doid+Sans+Mono' rel='stylesheet' type='text/css'><link href='https://fonts.googleapis.com/css?family=PT+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'><link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-124254584-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-124254584-1');
</script>
</head>
<body>