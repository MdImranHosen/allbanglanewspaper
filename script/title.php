<?php
  $meta_title = new Meta_title();
  define("TITLE", "All Bangla Newspaper");
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
  	<title><?php echo $result['bn_cn']; ?> - <?php echo TITLE; ?></title>
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
  <title><?php echo $rows['tv_n']; ?></title>
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
   <title><?php echo $reresult['radio_n'] ?></title>
  <?php	} } }else{
?>
<title><?php $fm->title(); ?></title>
<?php } ?>