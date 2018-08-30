<?php
include "inc/header.php";

 if (!isset($_GET['news-details']) && isset($_GET['news-details']) == NULL) {
   header("Location:index.php");
 }else{
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['news-details']);
    $id = (int)$id;
 }

?>
<?php include "inc/header-top.php" ?>
<?php include "inc/news_mq_s.php" ?>
<?php include "inc/menu.php" ?>

  <!--End Bootstrap Dropdown Menu-->
  <?php 
      $getNews = $show->getNewsUniqucId($id);
      if ($getNews) {
        while ($getResult = $getNews->fetch_assoc()) {
          $firstcatId = $getResult['catId'];
  ?>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12">
        <div class="left_content">
          <div class="single_page">
            <h1><?php echo $getResult['newsTitle']; ?></h1>
            <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Wpfreeware</a> <span><i class="fa fa-calendar"></i>6:49 AM</span> <a href="#"><i class="fa fa-tags"></i>Technology</a> </div>
            <div class="single_page_content"> <img class="img-center" src="admin/<?php echo $getResult['newsImage']; ?>" alt="">
              <span class="body_font_style margirn_style_text"><?php echo $getResult['details_news']; ?></span></div>
              
            
          <div class="social_link">
            <ul class="sociallink_nav">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
          </div>
        </div>
      
      <nav class="nav-slit"> 
        <a class="prev" href="news_details.php?news-details=<?php echo $getResult['id']; ?>"> <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
            <div>
                <h3><span class="news_title_font_style">আগের সংবাদ</span></h3>
                <img src="admin/<?php echo $getResult['newsImage']; ?>" alt=""/> 
            </div>
        </a><a class="next" href="news_details.php?news-details=<?php echo $getResult['id']; ?>"> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
          <div>
                <h3><span class="news_title_font_style">পরের সংবাদ</span></h3>
                <img src="admin/<?php echo $getResult['newsImage']; ?>" alt=""/>
          </div>
        </a>
      </nav>
    <div class="clearfix"></div>
       <div class="comment_box_style">
      <!--Comment System For this Site Start -->
          <div id="disqus_thread"></div>
            <script>

            /**
            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
            /*
            var disqus_config = function () {
            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            */
            (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://all-bangla-news.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
            })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            

      <!--Comment System For this Site End-->
      
         </div> 
      </div>
      <?php 
         $getFirstCat = $show->getCategoryFistResultDetails($firstcatId);
         if ($getFirstCat) {
           while ($getFistResult = $getFirstCat->fetch_assoc()) {
             
        ?>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span><?php echo $getFistResult['category']; ?></h2>
            <ul class="spost_nav">
              <?php 
                $getFirstNewsDetails = $show->getFirstNewsResultDetails($firstcatId);
                if ($getFirstNewsDetails) {
                  while ($firstTitleResultDetails = $getFirstNewsDetails->fetch_assoc()) {
            ?>
              <li>
                <div class="media wow fadeInDown"> <a href="news_details.php?news-details=<?php echo $firstTitleResultDetails['id']; ?>" class="media-left"> <img alt="" src="admin/<?php echo $firstTitleResultDetails['newsImage']; ?>"> </a>
                  <div class="media-body news_title_font_style"> <a href="news_details.php?news-details=<?php echo $firstTitleResultDetails['id']; ?>"><?php echo $firstTitleResultDetails['newsTitle']; ?></a> </div>
                </div>
              </li>
             <?php } } ?>
            </ul>
          </div>
        </aside>
      </div>
    <?php } } ?>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
         <div class="related_post">
              <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">
               <?php
                 $getMqNews = $show->getMqNewsList();
                 if ($getMqNews) {
                   while ($getMqNewsResult = $getMqNews->fetch_assoc()) {
                ?>
                <li>
                  <div class="media"> <a class="media-left" href="news_details.php?news-details=<?php echo $getMqNewsResult['id']; ?>"> <img src="admin/<?php echo $getMqNewsResult['newsImage']; ?>" alt=""> </a>
                    <div class="media-body news_title_font_style"> <a href="news_details.php?news-details=<?php echo $getMqNewsResult['id']; ?>"><?php echo $getMqNewsResult['newsTitle']; ?></a> </div>
                  </div>
                </li>
              <?php } } ?>
              </ul>
            </div>
      </div>
    </div>
  </section>
<?php } } ?> 
<?php include 'inc/footer.php'; ?>