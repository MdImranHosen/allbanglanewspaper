<?php include "inc/header.php" ?>
<?php
   include "classes/Community.php";
   $comm = new Community();
   

?>
<?php include "inc/header-top.php" ?>
<?php /*include "inc/news_mq_s.php"*/ ?>
<?php include "inc/menu.php" ?>

   <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8" style="z-index: 1;">
        <div class="slick_slider">
          <div class="single_iteam"> <a href="#"> <img src="images/slider_img4.jpg" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="#">Fusce eu nulla semper porttitor felis sit amet</a></h2>
              <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra urna. Morbi dui...</p>
            </div>
          </div>
          <div class="single_iteam"> <a href="#"> <img src="images/slider_img2.jpg" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="#">Fusce eu nulla semper porttitor felis sit amet</a></h2>
              <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra urna. Morbi dui...</p>
            </div>
          </div>
          <div class="single_iteam"> <a href="#"> <img src="images/slider_img3.jpg" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="#">Fusce eu nulla semper porttitor felis sit amet</a></h2>
              <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra urna. Morbi dui...</p>
            </div>
          </div>
          <div class="single_iteam"> <a href="#"> <img src="images/slider_img1.jpg" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="#">Fusce eu nulla semper porttitor felis sit amet</a></h2>
              <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra urna. Morbi dui...</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4" style="z-index: 1;">
        <div class="latest_post">
          <h2><span>Latest Community</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
             <?php 
               $drupShow = $comm->getCommunityReichest();
               if ($drupShow) {
                 while ($drupShowResult = $drupShow->fetch_assoc()) {
              ?>
              <li>
                <div class="media">
                  <a href="<?php
                    if($drupShowResult['com_url'] != NULL){ echo $drupShowResult['com_url']; }elseif($drupShowResult['fb_url'] != NULL){ echo $drupShowResult['fb_url']; }else{ echo '#'; }

                   ?>" target="_blank" class="btn btn-primary media-left">Website</a>
                  <div class="media-body" style="padding-left: 8px;"> <a href="<?php
                    if($drupShowResult['fb_url'] != NULL){ echo $drupShowResult['fb_url']; }elseif($drupShowResult['com_url'] != NULL){ echo $drupShowResult['com_url']; }else{ echo '#'; }

                   ?>" target="_blank" class="catg_title"> <?php echo $drupShowResult['com_name']; ?></a> </div>
                </div>
              </li>
             <?php } } ?>
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8" style="z-index: 1;">
        <div class="left_content">
        <!--  Start -->
          <div class="row">
           <?php
            $record_per_page = 2;
             $page = '';
             if (isset($_GET['page'])) {
               $page = $_GET['page'];
             }else{
              $page = 1;
             }
            $start_from = ($page-1)*$record_per_page;
            $getResult = $comm->getCommunityPerPage($start_from,$record_per_page);
            if ($getResult) {
              while ($resultShow = $getResult->fetch_assoc()) {
           ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 bangla_communityd">
              <table class="table table-border table-hover text-center" style="border:1px solid #ddd;">
                <thead>
                <tr><th class="text-center"><?php echo $resultShow['com_name']; ?></th></tr>
                </thead>
                <tbody>
                  <tr><td><i class="fa fa-map-marker" style="color: red;" ></i> <?php echo $resultShow['com_location']; ?></td></tr>
                  <tr>
                    <td>
                      <a href="#" class="btn btn-theme"><i class="fas fa-globe"></i> Web</a>
                      <a href="#" class="btn btn-theme"><i class="fab fa-facebook-f"></i> FB</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <?php } } ?>
        </div>
        <?php 
        $getPagination = $comm->getPaginationResult();
        if ($getPagination) {
          $total_rows = mysqli_num_rows($getPagination);
          if ($total_rows > 0) {

            $total_pages = ceil($total_rows/$record_per_page);
            $start_loop = $page;
            $difference = $total_pages - $page;
            if ($difference <= 5) {
              $start_loop = $total_pages - 5;
            }
            $end_loop = $start_loop + 4;

            if ($total_pages < $page) {
              echo '<script>window.location.href="bangladeshi-community.php"</script>';
            }
        ?>
        <div class="row">
          <div class="col-lg-6 col-lg-offset-3">
            <nav aria-label="Page navigation example">
            <ul class="pagination">
              <?php
               if ($page > 1) {
              ?>
              <li class="page-item <?php if($page = 1){ ?> disabled <?php } ?>">
                <a class="page-link" href="bangladeshi-community.php?page=<?php echo $page - 1; ?>" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <?php } ?>
              <!-- <li class="page-item active"><a class="page-link" href="#">1</a></li> -->
              <?php
                for ($i=$start_loop; $i<=$end_loop; $i++) { 
              
        echo "<li class=\"page-item\"><a class=\"page-link\" href=\"bangladeshi-community.php?page=$i\">$i</a></li>";
               } ?>
              
             <?php 
              if ($page <= $end_loop) {
             ?>
              <li class="page-item <?php if($page = $end_loop){ ?> disabled <?php } ?>">
                <a class="page-link" href="bangladeshi-community.php?page=<?php echo $page + 1; ?>" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
              <?php } ?>
            </ul>
          </nav>
          </div>
        </div>
        <?php } } ?>
         <!-- end -->
          <div class="single_post_content">
            <h2><span>Photography</span></h2>
            <ul class="photograph_nav  wow fadeInDown">
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 1"> <img src="images/photograph_img2.jpg" alt=""/></a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img3.jpg" title="Photography Ttile 2"> <img src="images/photograph_img3.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img4.jpg" title="Photography Ttile 3"> <img src="images/photograph_img4.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img4.jpg" title="Photography Ttile 4"> <img src="images/photograph_img4.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 5"> <img src="images/photograph_img2.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img3.jpg" title="Photography Ttile 6"> <img src="images/photograph_img3.jpg" alt=""/> </a> </figure>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4" style="z-index: 1;">
        <aside class="right_content">
          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
              <li role="presentation"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Popular</a></li>
              <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="video">
                <div class="vide_area">
                  <iframe width="100%" height="250" src="https://www.youtube.com/embed/Zl_IgOiHnx4" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="category">
                <ul class="spost_nav spost_nav_overide">
                <?php 
                 $popularShow = $comm->getCommunityPopular();
                 if ($popularShow) {
                   while ($popularResult = $popularShow->fetch_assoc()) {
                ?>
                  <li>
                    <div class="media wow fadeInDown">
                     <a href="<?php
                    if($popularResult['com_url'] != NULL){ echo $popularResult['com_url']; }elseif($popularResult['fb_url'] != NULL){ echo $popularResult['fb_url']; }else{ echo '#'; } ?>"
                     target="_blank" class="btn btn-theme media-left">Website</a>
                      <div class="media-body" style="text-indent: 20px;"> <a href="<?php
                    if($popularResult['fb_url'] != NULL){ echo $popularResult['fb_url']; }elseif($popularResult['com_url'] != NULL){ echo $popularResult['com_url']; }else{ echo '#'; }

                   ?>" class="catg_title"> <?php echo $popularResult['com_name']; ?></a> </div>
                    </div>
                  </li>
                <?php } } ?>
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane" id="comments">
              <!--Comment System For this Site Start -->
              <div id="disqus_thread"></div>
                <script>
                
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
          </div>
          
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Category Archive</span></h2>
            <select class="catgArchive">
              <option>Select Category</option>
              <option>Life styles</option>
              <option>Sports</option>
              <option>Technology</option>
              <option>Treads</option>
            </select>
          </div>
        </aside>
      </div>
    </div>
  </section>

<?php include 'inc/footer.php'; ?>