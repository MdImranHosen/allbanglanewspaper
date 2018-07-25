<?php 
include "inc/header.php";

# Category Wayis news list Catch action Code....
 if (!isset($_GET['paperlist']) || $_GET['paperlist'] == NULL) {
     header('Location:index.php');
 }elseif($_GET['paperlist'] == 0){
  header('Location:index.php');
 }elseif(!preg_replace('/\D/', '', $_GET['paperlist'])){
  header('Location:index.php');
 }else{
    $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['paperlist']);
    $id = preg_replace('/\D/', '', $_GET['paperlist']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
 }

?>

<?php include "inc/header-top.php" ?>
<?php /*include "inc/news_mq_s.php"*/ ?>
<?php include "inc/menu.php" ?>
 <section id="contentSection">
    <div class="row">
      <div class="col-lg-12">
        <div class="pull-left"><h3 style="padding-left: 20px;"><span style="color: red;font-weight: bold;"><?php
         $getBnCat = $bn_ns->getBnNsCatName($id);
         if ($getBnCat) {
           while ($cresult = $getBnCat->fetch_assoc()) {
         ?>
            <?php echo $cresult['bn_cn']; ?>
         <?php } }else{ echo "Empty"; } ?></span> <img src="images/icon/ns_world">
        <span style="color: green;font-weight: bold;"> 
        বাংলা নিউজ পেপার  </span></h3></div>
        <div style="padding-right: 20px;" class="pull-right" id="myclock"></div>
        
           <!-- <?php #include 'inc/digital-clock.php'; ?> -->
        
      </div>
      <div class="col-lg-8 col-md-7" style="z-index: 1;">
        <div class="left_content">
          <div class="single_sidebar overridestyle">
            <ul class="nav nav-tabs banglanewspapertabs" role="tablist">
              <li role="presentation" class="active"><a href="#daily_newspaper" aria-controls="home" role="tab" data-toggle="tab">দৈনিক</a></li>
              <li role="presentation"><a href="#weekend_newspaper" aria-controls="profile" role="tab" data-toggle="tab">সাপ্তাহিক</a></li>
              <li role="presentation"><a href="#other_newspaper" aria-controls="messages" role="tab" data-toggle="tab">অন্যান্য</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active bn_newspaper" id="daily_newspaper">
                <ul>
                  <?php
                       $getResult = $bn_ns->getNewsCategorywayisShow($id);
                       if ($getResult) {
                         while ($result = $getResult->fetch_assoc()) {
                    ?>
                  <li>
                    <a href="<?php echo $result['ns_url']; ?>" target="_blank">
                      <img class="newspaper_image" src="<?php echo $result['ns_img']; ?>" title="<?php echo $result['ns_name']; ?>" alt="<?php echo $result['ns_name']; ?>">
                      <p><?php echo $result['ns_name']; ?></p>
                    </a>
                  </li>
                  <?php } }else{ ?>
                   <li>
                    <a> Empty (0) </a>
                   </li>
                  <?php } ?>
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane bn_newspaper" id="weekend_newspaper">
                 <ul>

                  <?php
                       $getResult = $bn_ns->getNewsCategorywayisweekiShow($id);
                       if ($getResult) {
                         while ($result = $getResult->fetch_assoc()) {
                    ?>
                  <li>
                    <a href="<?php echo $result['ns_url']; ?>" target="_blank">
                      <img class="newspaper_image" src="<?php echo $result['ns_img']; ?>" title="<?php echo $result['ns_name']; ?>" alt="<?php echo $result['ns_name']; ?>">
                      <p><?php echo $result['ns_name']; ?></p>
                    </a>
                  </li>
                  <?php } }else{ ?>
                   <li>
                    <a> Empty (0) </a>
                   </li>
                  <?php } ?>
                  
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane bn_newspaper" id="other_newspaper">
                 <ul>

                  <?php
                       $getResult = $bn_ns->getNewsCategoryAnotherShow($id);
                       if ($getResult) {
                         while ($result = $getResult->fetch_assoc()) {
                    ?>
                  <li>
                    <a href="<?php echo $result['ns_url']; ?>" target="_blank">
                      <img class="newspaper_image" src="<?php echo $result['ns_img']; ?>" title="<?php echo $result['ns_name']; ?>" alt="<?php echo $result['ns_name']; ?>">
                      <p><?php echo $result['ns_name']; ?></p>
                    </a>
                  </li>
                  <?php } }else{ ?>
                   <li>
                    <a> Empty (0) </a>
                   </li>
                  <?php } ?>

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