<?php include "inc/header.php" ?>
<?php
include "classes/Tvchannels.php";
$tvc = new Tvchannels();
?>
<?php include "inc/header-top.php" ?>
<?php /*include "inc/news_mq_s.php"*/ ?>
<?php include "inc/menu.php" ?>

 <section id="contentSection">
    <div class="row">
      <div class="col-lg-12">
        <div class="pull-left banglatvupimg">
            <img class="img-responsive" src="images/icon/tv.png">
        </div>
        <?php include 'inc/digital-clock.php'; ?>
        <div class="clearfix"></div>
      </div>
      <div class="col-lg-8 col-md-7" style="z-index: 1;">
        <div class="left_content">
          <div class="single_sidebar overridestyle">
            <ul class="nav nav-tabs banglatvtabs" role="tablist">
              <li role="presentation" class="active"><a href="#bangladeshitv" aria-controls="home" role="tab" data-toggle="tab">বাংলাদেশী টিভি</a></li>
              <li role="presentation"><a href="#indianbanglatv" aria-controls="profile" role="tab" data-toggle="tab">ভারতীয় বাংলা টিভি</a></li>
              <li role="presentation"><a href="#othertv" aria-controls="messages" role="tab" data-toggle="tab">অন্যান্য বিদেশী  বাংলা টিভি</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active bn_newspaper" id="bangladeshitv">
                <ul>
                  <?php
                       $getResult = $tvc->getBangladeshiTv();
                       if ($getResult) {
                         while ($result = $getResult->fetch_assoc()) {
                    ?>
                  <li>
                    <a href="tv-site.php?tvsite=<?php echo $result['tvId']; ?>" target="_blank">
                      <img class="newspaper_image" src="<?php echo $result['tv_img']; ?>" title="<?php echo $result['tv_n']; ?>" alt="<?php echo $result['tv_n']; ?>">
                      <p><?php echo $result['tv_n']; ?></p>
                    </a>
                  </li>
                  <?php } } ?>
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane most_populer_newss" id="indianbanglatv">
                 <ul>
                  <?php
                       $getResult = $tvc->getIndianBanglaTv();
                       if ($getResult) {
                         while ($result = $getResult->fetch_assoc()) {
                    ?>
                  <li class="cat-item">
                    <a href="tv-site.php?tvsite=<?php echo $result['tvId']; ?>" target="_blank">
                      <img src="<?php echo $result['tv_img']; ?>" title="<?php echo $result['tv_n']; ?>" alt="<?php echo $result['tv_n']; ?>">
                      <p><?php echo $result['tv_n']; ?></p>
                    </a>
                  </li>
                  <?php } } ?>
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane most_populer_newss" id="othertv">
                 <ul>
                  <?php
                       $getResult = $tvc->getAnotherBanglaTv();
                       if ($getResult) {
                         while ($result = $getResult->fetch_assoc()) {
                    ?>
                  <li class="cat-item">
                    <a href="tv-site.php?tvsite=<?php echo $result['tvId']; ?>" target="_blank">
                      <img src="<?php echo $result['tv_img']; ?>" title="<?php echo $result['tv_n']; ?>" alt="<?php echo $result['tv_n']; ?>">
                      <p><?php echo $result['tv_n']; ?></p>
                    </a>
                  </li>
                  <?php } } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-5" style="z-index: 1;">
        <aside class="right_content">
          <?php include 'inc/bangladistrictcountry.php'; ?>
        </aside>
      </div>
    </div>
  </section>

<?php include 'inc/footer.php'; ?>