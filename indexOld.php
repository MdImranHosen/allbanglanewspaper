<?php include "inc/header.php" ?>
<?php include "inc/header-top.php" ?>
<?php include "inc/news_mq_s.php" ?>
<?php include "inc/menu.php" ?>

 <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
         <?php 
               $getFirstCat = $show->getCategoryFistResult();
               if ($getFirstCat) {
                 while ($getFistResult = $getFirstCat->fetch_assoc()) {
                   $firstcatId = $getFistResult['catId'];
              ?>
          <div class="single_post_content">
            <h2><span><?php echo $getFistResult['category']; ?></span></h2>
            <?php 
                $getFirstNews = $show->getFirstNewsResult($firstcatId);
                if ($getFirstNews) {
                  while ($firstTitleResult = $getFirstNews->fetch_assoc()) {
            ?>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                <li>
                  <figure class="bsbig_fig"> <a href="news_details.php?news-details=<?php echo $firstTitleResult['id']; ?>" class="featured_img"> <img alt="" src="admin/<?php echo $firstTitleResult['newsImage']; ?>"> <span class="overlay"></span> </a>
                    <figcaption> <a href="news_details.php?news-details=<?php echo $firstTitleResult['id']; ?>"><?php echo $firstTitleResult['newsTitle']; ?></a> </figcaption>
                    <a href="news_details.php?news-details=<?php echo $firstTitleResult['id']; ?>"><span class="body_font_style"><?php echo $fm->textShorten($firstTitleResult['details_news']); ?></span></a>
                  </figure>
                </li>
              </ul>
            </div>
            <?php } } ?>
            <div class="single_post_content_right">
              <ul class="spost_nav">
               <?php 
                $getFirstallNews = $show->getFirstNewsallResult($firstcatId);
                if ($getFirstallNews) {
                  while ($firstTitleallResult = $getFirstallNews->fetch_assoc()) {
                ?>
                <li>
                  <div class="media wow fadeInDown"><a href="news_details.php?news-details=<?php echo $firstTitleallResult['id']; ?>" class="media-left">
                    <img alt="" src="admin/<?php echo $firstTitleallResult['newsImage']; ?>"> </a>
                    <div class="media-body news_title_font_style"><a href="news_details.php?news-details=<?php echo $firstTitleallResult['id']; ?>"><?php echo $firstTitleallResult['newsTitle']; ?></a> </div>
                  </div>
                </li>
                <?php } } ?>
              </ul>
            </div>
          </div>
          <?php } } ?>
          <div class="fashion_technology_area">
          <?php 
               $getSecondCat = $show->getCategorySecondResult();
               if ($getSecondCat) {
                 while ($getSecondResult = $getSecondCat->fetch_assoc()) {
                  $secondId = $getSecondResult['catId'];
              ?>
            <div class="fashion">
              <div class="single_post_content">
              <h2><span><?php echo $getSecondResult['category']; ?></span></h2>
             <?php 
                $getSecondNews = $show->getSecondNewsResult($secondId);
                if ($getSecondNews) {
                  while ($secondTitleResult = $getSecondNews->fetch_assoc()) {
               ?>
                <ul class="business_catgnav wow fadeInDown">
                  <li>
                    <figure class="bsbig_fig"> <a href="news_details.php?news-details=<?php echo $secondTitleResult['id']; ?>" class="featured_img"> <img alt="" src="admin/<?php echo $secondTitleResult['newsImage']; ?>"> <span class="overlay"></span> </a>
                      <figcaption> <a href="news_details.php?news-details=<?php echo $secondTitleResult['id']; ?>"><?php echo $secondTitleResult['newsTitle']; ?></a> </figcaption>
                      <span class="body_font_style"><?php echo $fm->textShorten($secondTitleResult['details_news']); ?></span>
                    </figure>
                  </li>
                </ul>
                <?php } } ?>
                <ul class="spost_nav">

                  <?php 
                  $getSecondallNews = $show->getSecondNewsallResult($secondId);
                  if ($getSecondallNews) {
                    while ($secondTitleallResult = $getSecondallNews->fetch_assoc()) {
                 ?>
                  <li>
                    <div class="media wow fadeInDown"> <a href="news_details.php?news-details=<?php echo $secondTitleallResult['id']; ?>" class="media-left"> <img alt="" src="admin/<?php echo $secondTitleallResult['newsImage']; ?>"> </a>
                      <div class="media-body news_title_font_style"><a href="news_details.php?news-details=<?php echo $secondTitleallResult['id']; ?>"><?php echo $secondTitleallResult['newsTitle']; ?></a></div>
                    </div>
                  </li>
                 <?php } } ?>
                  
                </ul>
              </div>
            </div>
          <?php } } ?>
          <?php 
               $getThirdCat = $show->getCategoryThirdResult();
               if ($getThirdCat) {
                 while ($getThirdResult = $getThirdCat->fetch_assoc()) {
                  $thirdId = $getThirdResult['catId'];
              ?>
            <div class="technology">
              <div class="single_post_content">
              
              <h2><span><?php echo $getThirdResult['category']; ?></span></h2>
              <?php 
                $getThirdNews = $show->getThirdNewsResult($thirdId);
                if ($getThirdNews) {
                  while ($thiredTitleResult = $getThirdNews->fetch_assoc()) {
               ?>
                <ul class="business_catgnav">
                  <li>
                    <figure class="bsbig_fig wow fadeInDown"> <a href="news_details.php?news-details=<?php echo $thiredTitleResult['id']; ?>" class="featured_img"> <img alt="" src="admin/<?php echo $thiredTitleResult['newsImage']; ?>"> <span class="overlay"></span> </a>
                      <figcaption> <a href="news_details.php?news-details=<?php echo $thiredTitleResult['id']; ?>"><?php echo $thiredTitleResult['newsTitle']; ?></a> </figcaption>
                      <a href="news_details.php?news-details=<?php echo $thiredTitleResult['id']; ?>"><span class="body_font_style"><?php echo $fm->textShorten($thiredTitleResult['details_news']); ?></span></a>
                    </figure>
                  </li>
                </ul>
                <?php } } ?>
                <ul class="spost_nav">
                 <?php 
                  $getThirdallNews = $show->getThirdNewsallResult($thirdId);
                  if ($getThirdallNews) {
                    while ($thiredTitleallResult = $getThirdallNews->fetch_assoc()) {
                 ?>
                  <li>
                    <div class="media wow fadeInDown"><a href="news_details.php?news-details=<?php echo $thiredTitleallResult['id']; ?>" class="media-left"> <img alt="" src="admin/<?php echo $thiredTitleallResult['newsImage']; ?>"> </a>
                      <div class="media-body news_title_font_style"> <a href="news_details.php?news-details=<?php echo $thiredTitleallResult['id']; ?>"><?php echo $thiredTitleallResult['newsTitle']; ?></a></div>
                    </div>
                  </li>
                 <?php } } ?>
                </ul>
              </div>
            </div>
           <?php } } ?>
          </div>
          <?php 
               $getFourCat = $show->getCategoryFourResult();
               if ($getFourCat) {
                 while ($getFourResult = $getFourCat->fetch_assoc()) {
                  $fourId = $getFourResult['catId'];
              ?>
          <div class="single_post_content">
            
              <h2><span><?php echo $getFourResult['category']; ?></span></h2>
             <?php
                 $getFourNewsRes = $show->getFourNewsResult($fourId);
                 if ($getFourNewsRes) {
                   while ($getFallResult = $getFourNewsRes->fetch_assoc()) {
             ?>
            <div class="single_post_content_left">
              <ul class="business_catgnav">
                <li>
                  <figure class="bsbig_fig  wow fadeInDown"><a class="featured_img" href="news_details.php?news-details=<?php echo $getFallResult['id']; ?>"><img src="admin/<?php echo $getFallResult['newsImage']; ?>" alt=""><span class="overlay"></span></a>
                    <figcaption> <a href="news_details.php?news-details=<?php echo $getFallResult['id']; ?>"><?php echo $getFallResult['newsTitle']; ?></a> </figcaption>
                    <a href="news_details.php?news-details=<?php echo $getFallResult['id']; ?>"><span class="body_font_style"><?php echo $fm->textShorten($getFallResult['details_news']); ?></span></a>
                  </figure>
                </li>
              </ul>
            </div>
           <?php } } ?>
            <div class="single_post_content_right">
              <ul class="spost_nav">
               <?php
                 $getFourNewsallRes = $show->getFourNewsallResult($fourId);
                 if ($getFourNewsallRes) {
                   while ($getFourallResult = $getFourNewsallRes->fetch_assoc()) {
                ?>
                <li>
                  <div class="media wow fadeInDown"> <a href="news_details.php?news-details=<?php echo $getFourallResult['id']; ?>" class="media-left"> <img alt="" src="admin/<?php echo $getFourallResult['newsImage']; ?>"> </a>
                    <div class="media-body news_title_font_style"> <a href="news_details.php?news-details=<?php echo $getFourallResult['id']; ?>"><?php echo $getFourallResult['newsTitle']; ?></a> </div>
                  </div>
                </li>
                <?php } } ?>
              </ul>
            </div>
          </div>
          <?php } } ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <?php 
               $getFiveCat = $show->getCategoryFiveResult();
               if ($getFiveCat) {
                 while ($getFiveResult = $getFiveCat->fetch_assoc()) {
                  $fiveId = $getFiveResult['catId'];
              ?>
          <div class="single_sidebar">
              <h2><span><?php echo $getFiveResult['category']; ?></span></h2>
            <ul class="spost_nav">
             <?php
              $getFiveNews = $show->getFiveNewsallResult($fiveId);
              if ($getFiveNews) {
                while ($getFiveNewsResult = $getFiveNews->fetch_assoc()) {
             ?>
              <li>
                <div class="media wow fadeInDown"> <a href="news_details.php?news-details=<?php echo $getFiveNewsResult['id']; ?>" class="media-left"> <img alt="" src="admin/<?php echo $getFiveNewsResult['newsImage'] ?>"> </a>
                  <div class="media-body news_title_font_style"> <a href="news_details.php?news-details=<?php echo $getFiveNewsResult['id']; ?>"><?php echo $getFiveNewsResult['newsTitle']; ?></a> </div>
                </div>
              </li>
              <?php } } ?>
            </ul>
          </div>
        <?php } } ?>
        <!-- Six Category News List Start-->

        <?php 
               $getSixCat = $show->getCategorySixResult();
               if ($getSixCat) {
                 while ($getSixResult = $getSixCat->fetch_assoc()) {
                  $sixId = $getSixResult['catId'];
              ?>
          <div class="single_sidebar">
              <h2><span><?php echo $getSixResult['category']; ?></span></h2>
            <ul class="spost_nav">
             <?php
              $getSixNews = $show->getSixNewsallResult($sixId);
              if ($getSixNews) {
                while ($getSixNewsResult = $getSixNews->fetch_assoc()) {
             ?>
              <li>
                <div class="media wow fadeInDown"> <a href="news_details.php?news-details=<?php echo $getSixNewsResult['id']; ?>" class="media-left"> <img alt="" src="admin/<?php echo $getSixNewsResult['newsImage'] ?>"> </a>
                  <div class="media-body news_title_font_style"> <a href="news_details.php?news-details=<?php echo $getSixNewsResult['id']; ?>"><?php echo $getSixNewsResult['newsTitle']; ?></a> </div>
                </div>
              </li>
              <?php } } ?>
            </ul>
          </div>
        <?php } } ?>
          
        <!-- Six Category News List Start-->
        <!-- Seven Category News List Start-->

        <?php 
               $getSevenCat = $show->getCategorySevenResult();
               if ($getSevenCat) {
                 while ($getSevenResult = $getSevenCat->fetch_assoc()) {
                  $sevenId = $getSevenResult['catId'];
              ?>
          <div class="single_sidebar">
              <h2><span><?php echo $getSevenResult['category']; ?></span></h2>
            <ul class="spost_nav">
             <?php
              $getSevenNews = $show->getSevenNewsallResult($sevenId);
              if ($getSevenNews) {
                while ($getSevenNewsResult = $getSevenNews->fetch_assoc()) {
             ?>
              <li>
                <div class="media wow fadeInDown"> <a href="news_details.php?news-details=<?php echo $getSevenNewsResult['id']; ?>" class="media-left"> <img alt="" src="admin/<?php echo $getSevenNewsResult['newsImage'] ?>"> </a>
                  <div class="media-body news_title_font_style"> <a href="news_details.php?news-details=<?php echo $getSevenNewsResult['id']; ?>"><?php echo $getSevenNewsResult['newsTitle']; ?></a> </div>
                </div>
              </li>
              <?php } } ?>
            </ul>
          </div>
        <?php } } ?>
          
        <!-- Seven Category News List Start-->

        <!-- Six Category News List Start-->

        <?php 
               $getSixCat = $show->getCategorySixResult();
               if ($getSixCat) {
                 while ($getSixResult = $getSixCat->fetch_assoc()) {
                  $sixId = $getSixResult['catId'];
              ?>
          <div class="single_sidebar">
              <h2><span><?php echo $getSixResult['category']; ?></span></h2>
            <ul class="spost_nav">
             <?php
              $getSixNews = $show->getSixNewsallResult($sixId);
              if ($getSixNews) {
                while ($getSixNewsResult = $getSixNews->fetch_assoc()) {
             ?>
              <li>
                <div class="media wow fadeInDown"> <a href="news_details.php?news-details=<?php echo $getSixNewsResult['id']; ?>" class="media-left"> <img alt="" src="admin/<?php echo $getSixNewsResult['newsImage'] ?>"> </a>
                  <div class="media-body news_title_font_style"> <a href="news_details.php?news-details=<?php echo $getSixNewsResult['id']; ?>"><?php echo $getSixNewsResult['newsTitle']; ?></a> </div>
                </div>
              </li>
              <?php } } ?>
            </ul>
          </div>
        <?php } } ?>
          
        <!-- Six Category News List Start-->

        <!-- <div class="single_sidebar wow fadeInDown">
            <h2><span>Category Archive</span></h2>
            <select class="catgArchive">
              <option>Select Category</option>
              <option>Life styles</option>
              <option>Sports</option>
              <option>Technology</option>
              <option>Treads</option>
            </select>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Links</span></h2>
            <ul>
              <li><a href="http://techgroup.co/" target="_blank">Tech Group</a></li>
              <li><a href="#">Rss Feed</a></li>
              <li><a href="#">Login</a></li>
              <li><a href="#">Life &amp; Style</a></li>
            </ul>
          </div> -->

        </aside>
      </div>
    </div>
  </section>

<?php include 'inc/footer.php'; ?>