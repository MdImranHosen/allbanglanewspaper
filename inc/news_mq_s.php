  <!--Least News and sosal midia Start-->
 <section id="newsSection">
    <div class="row">
      <!-- <div class="col-lg-12 col-md-12"> -->
        <div class="latest_newsarea">
        <div class="col-lg-10 col-sm-12" style="z-index: 1;">
         <span>জনপ্রিয় সংবাদপত্র</span>
          <ul id="ticker01" class="news_sticker">
            <?php
                 $getMqNews = $populer_news->getPopulerNewsPaper();
                 if ($getMqNews) {
                   while ($getMqNewsResult = $getMqNews->fetch_assoc()) {
            ?>
            <li><a href="<?php echo $getMqNewsResult['news_url']; ?>" target="_blank"><i class="fa fa-star" style="color: #D083CF;"></i>
              <?php echo $getMqNewsResult['name']; ?></a></li>
           <?php } } ?>
          </ul>
          </div>
          <div class="col-lg-2" style="z-index: 1;">
          <div class="social_area">
            <ul class="social_nav">
              <li class="facebook"><a href="#"></a></li>
              <li class="twitter"><a href="#"></a></li>
              <li class="googleplus"><a href="#"></a></li>
              <li class="youtube"><a href="#"></a></li>
              <li class="mail"><a href="#"></a></li>
            </ul>
          </div>
         </div>
        </div>
        <!-- Start socal Media Menu Small-->
        <div class="col-lg-12" style="z-index: 1;">
          <div class="social_area_sm">
            <ul class="social_nav">
              <li class="facebook"><a href="#"></a></li>
              <li class="twitter"><a href="#"></a></li>
              <li class="googleplus"><a href="#"></a></li>
              <li class="youtube"><a href="#"></a></li>
              <li class="mail"><a href="#"></a></li>
            </ul>
          </div> 
        </div>
        <!--End Socal Media Menu Small-->


      <!-- </div> -->
    </div>
  </section>
  <!--Least News and sosal midia End-->