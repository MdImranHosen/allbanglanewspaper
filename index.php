<?php include "inc/header.php" ?>
<?php include "inc/header-top.php" ?>
<?php /*include "inc/news_mq_s.php"*/ ?>
<?php include "inc/menu.php" ?>
 <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-7" style="z-index: 1;">
        <div class="left_content">
          <div class="single_sidebar overridestyle">
            <ul class="nav nav-tabs banglanewspapertabs" role="tablist">
              <li role="presentation" class="active"><a href="#most_populer_newss" aria-controls="home" role="tab" data-toggle="tab">জনপ্রিয় সংবাদপত্র</a></li>
              <li role="presentation"><a href="#allbanglanewspaper" aria-controls="profile" role="tab" data-toggle="tab">সমস্ত বাংলা সংবাদপত্র</a></li>
              <li role="presentation"><a href="#e-paper" aria-controls="messages" role="tab" data-toggle="tab">ই-পেপার</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active bn_newspaper" id="most_populer_newss">
                <ul>
                  <?php
                       $getResult = $populer_news->getPopulerNewsPaper();
                       if ($getResult) {
                         while ($result = $getResult->fetch_assoc()) {
                    ?>
                  <li>
                    <a href="<?php echo $result['news_url']; ?>" target="_blank">
                      <img class="newspaper_image" src="<?php echo $result['image']; ?>" title="<?php echo $result['title']; ?>" alt="<?php echo $result['name']; ?>">
                      <p><?php echo $result['name']; ?></p>
                    </a>
                  </li>
                  <?php } }else{ ?>
                   <li>
                    <a> Empty (0) </a>
                   </li>
                  <?php } ?>
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane bn_newspaper" id="allbanglanewspaper">
                 <ul>
                  <?php
                       $getResult = $bn_ns->getAllbanglanewspaper();
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
              <div role="tabpanel" class="tab-pane bn_newspaper" id="e-paper">
                 <ul>
                  <?php
                       $getResult = $bn_ns->getEpaperList();
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
                   <li> <a>Empty (0) </a></li>
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