<?php include "inc/header.php" ?>
<?php
include "classes/Radio.php";
$radio = new Radio();
?>
<?php include "inc/header-top.php"; ?>
<?php /*include "inc/news_mq_s.php"*/ ?>
<?php include "inc/menu.php"; ?>

 <section id="contentSection">
    <div class="row">
      <div class="col-lg-12">
        <div class="pull-left"><h3 style="padding-left: 20px;"><span style="color: red;font-weight: bold;">বাংলা</span> <img src="images/icon/radio2.png"><span style="color: red;font-weight: bold;">রেডিও</span></h3></div>
         <div style="padding-right: 20px;" class="pull-right" id="myclock"></div>
        
           <!-- <?php #include 'inc/digital-clock.php'; ?> -->
        
      </div>
      <div class="col-lg-8  col-md-7" style="z-index: 1;">
        <!-- <iframe src="http://www.pdlnews.com" width="500" height="400" ></iframe> -->
     <!-- <audio id="stream" controls="" preload="none" autoplay="" style="width: 300px;">
       <source src="http://192.235.87.105:13748/;" type="audio/mpeg">
      </audio> --> 
     <!--  http://69.46.21.178:8201/ -->
     <!-- Lemon24 http://office.mcc.com.bd:8000/; -->
      <!-- colors http://45.64.135.88:8000/;   -->
      <!-- ABC Radio http://stream.zenolive.com/6a28tbx6vewtv -->
      <!-- Radio Forti http://121.200.62.53:1021/ -->
      <!-- Bangladesh Bater http://192.235.87.105:13748/; -->

        <div class="left_content">
          <div class="single_sidebar overridestyle">
            <ul class="nav nav-tabs banglatvtabs" role="tablist">
              <li role="presentation" class="active"><a href="#bangladeshiradio" aria-controls="home" role="tab" data-toggle="tab">বাংলাদেশী রেডিও</a></li>
              <li role="presentation"><a href="#indianbanglaradio" aria-controls="profile" role="tab" data-toggle="tab">ভারতীয় বাংলা রেডিও</a></li>
              <li role="presentation"><a href="#otherforeignradio" aria-controls="messages" role="tab" data-toggle="tab">অন্যান্য বিদেশী রেডিও</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active bangla_radio" id="bangladeshiradio">
                <ul>
                  <?php
                       $getResult = $radio->getBangladeshiRadio();
                       if ($getResult) {
                         while ($result = $getResult->fetch_assoc()) {
                    ?>
                  <li>
                    <a href="radio-live.php?liveRadio=<?php echo $result['id']; ?>" target="_blank">
                      <img src="<?php echo $result['radio_img']; ?>" title="<?php echo $result['radio_n']; ?>" alt="<?php echo $result['radio_n']; ?>">
                      <p><?php echo $result['radio_n']; ?></p>
                    </a>
                  </li>
                  <?php } } ?>
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane bangla_radio" id="indianbanglaradio">
                 <ul>
                  <?php
                       $getResult = $radio->getIndianBanglaRadio();
                       if ($getResult) {
                         while ($result = $getResult->fetch_assoc()) {
                    ?>
                  <li class="cat-item">
                    <a href="radio-live.php?liveRadio=<?php echo $result['id']; ?>" target="_blank">
                      <img src="<?php echo $result['radio_img']; ?>" title="<?php echo $result['radio_n']; ?>" alt="<?php echo $result['radio_n']; ?>">
                      <p><?php echo $result['radio_n']; ?></p>
                    </a>
                  </li>
                  <?php } } ?>
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane bangla_radio" id="otherforeignradio">
                 <ul>
                  <?php
                       $getResult = $radio->getAnotherBanglaRadio();
                       if ($getResult) {
                         while ($result = $getResult->fetch_assoc()) {
                    ?>
                  <li class="cat-item">
                    <a href="radio-live.php?liveRadio=<?php echo $result['id']; ?>" target="_blank">
                      <img src="<?php echo $result['radio_img']; ?>" title="<?php echo $result['radio_n']; ?>" alt="<?php echo $result['radio_n']; ?>">
                      <p><?php echo $result['radio_n']; ?></p>
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