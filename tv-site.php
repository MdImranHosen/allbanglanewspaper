<?php include "inc/header.php" ?>
<?php
include "classes/Tvchannels.php";
$tvc = new Tvchannels();
if (!isset($_GET['tvsite']) && isset($_GET['tvsite']) == NULL) {
  header('Location:index.php');
}else{
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['tvsite']);
    $id = preg_replace('/\D/', '', $_GET['tvsite']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
 }
?>
<?php include "inc/header-top.php" ?>
<?php include "inc/news_mq_s.php" ?>
<?php include "inc/menu.php" ?>

 <section id="contentSection">
    <div class="row">
     <?php
       $getLiveResult = $tvc->getTvIdbySite($id);
       if ($getLiveResult) {
         while ($result = $getLiveResult->fetch_assoc()) {
      ?>
      <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
        <h3 style="padding-left: 20px;">
         <strong>
          <span style="color: green;">বাংলা </span> 
            <i class="fas fa-tv" style="color: red;"></i>
          <span style="color: green;"> টিভি</span> <span style="color: red;" class="fa fa-arrow-right"></span> <span style="color: green;"><?php echo $result['tv_n']; ?></span>
          </strong>
        </h3>
      </div>
      <div class="col-lg-8 col-lg-offset-2">
        <!-- <iframe src="http://www.ntvbd.com/" width="100%" height="500"></iframe> -->
      <iframe src="<?php echo $result['tvc_url']; ?>" width="100%" height="500"></iframe>
      </div>
     <?php } } ?>
    </div>
  </section>

<?php include 'inc/footer.php'; ?>