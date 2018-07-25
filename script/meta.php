<?php
$meta_title = new Meta_title();
define("DESCRIPTIONS", "Bangla All Newspaper");
define("KEYWORDS","bangla newspaper list, bangla radio list, bangla radio live, bangla tv, bangla television");
define("BANGLARADIODES", "bangla radio live, bangla radio list");
define("BANGLARADIO", "bangla radio, bangla radio list, bangla fm, radio live, online radio, online bangla fm");
define("BANGLATVDES", "bangla television list, bangla tv list in the world");
define("BANGLATV", "bangla tv, bangla television, online tv, online bangla tv, live bangla tv, bangla tv list, bangla tv website list");
define("PAPERLOCATION", "bangla newspaper, online bangla newspaper list");
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
  if (isset($_GET['paperlist'])) {
   $paperId = preg_replace('/\D/', '', $_GET['paperlist']);
   $paperId = mysqli_real_escape_string($db->link, $paperId);
   $paperId = htmlentities($paperId);

   if (!isset($paperId) || $paperId == NULL) {
       header('Location:404.php');
  }elseif($paperId==0){
    header('Location:404.php');
  }else{
   $paperId = (int)$paperId;
  }
  $getCatName = $meta_title->getCategoryNameById($paperId);
  if ($getCatName) {
  	while ($result = $getCatName->fetch_assoc()) {
  	?>
  	<meta name="description" content="<?php echo $result['bn_cn']; ?> - <?php echo PAPERLOCATION; ?>">
   <meta name="keywords" content="<?php echo $result['bn_cn']; ?> <?php echo KEYWORDS; ?>">
   <meta name="author" content="Tech Group">
  <?php	} } }elseif(isset($_GET['tvsite'])){
   $tvbyId = preg_replace('/\D/', '', $_GET['tvsite']);
   $tvbyId = mysqli_real_escape_string($db->link, $tvbyId);
   $tvbyId = htmlentities($tvbyId);
   
   if (!isset($tvbyId) || $tvbyId == NULL) {
       header('Location:404.php');
  }elseif($tvbyId==0){
    header('Location:404.php');
  }else{
   $tvbyId = (int)$tvbyId;
  }
  $getTvName = $meta_title->getTvNameById($tvbyId);
  if ($getTvName) {
  	while ($rows = $getTvName->fetch_assoc()) {
  ?>
  <meta name="description" content="<?php echo $rows['tv_n']; ?> - <?php echo BANGLATVDES; ?>">
   <meta name="keywords" content="<?php echo $rows['tv_n']; ?> <?php echo BANGLATV; ?>">
   <meta name="author" content="Tech Group">
  <?php } } }elseif(isset($_GET['liveRadio'])){
   $radioId = preg_replace('/\D/', '', $_GET['liveRadio']);
   $radioId = mysqli_real_escape_string($db->link, $radioId);
   $radioId = htmlentities($radioId);

  if (!isset($radioId) || $radioId == NULL) {
       header('Location:404.php');
  }elseif($radioId==0){
    header('Location:404.php');
  }else{
   $radioId = (int)$radioId;
  }
  $getRadioId = $meta_title->getRadioById($radioId);
  if ($getRadioId) {
  	while ($reresult = $getRadioId->fetch_assoc()) {
  ?>
    <meta name="description" content="<?php echo $reresult['radio_n']; ?> - <?php echo BANGLARADIODES; ?>">
   <meta name="keywords" content="<?php echo $reresult['radio_n']; ?> <?php echo BANGLARADIO; ?>">
   <meta name="author" content="Tech Group">
  <?php	} } }else{
?>
<meta name="description" content="<?php echo DESCRIPTIONS; ?>">
<meta name="keywords" content="<?php echo KEYWORDS; ?>">
<meta name="author" content="pdlnews" >
<?php } ?>
<?php
   $getSiteetc = $site_etc->getSiteEtcByIdShow();
   if ($getSiteetc) {
     while ($result = $getSiteetc->fetch_assoc()) {
  ?> 
  <link rel="icon" href="<?php echo $result['browser_icon']; ?>">
  <?php } } ?>