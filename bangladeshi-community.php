<?php include "inc/header.php" ?>
<?php include "inc/header-top.php" ?>
<?php include "inc/news_mq_s.php" ?>
<?php include "inc/menu.php" ?>

<?php include "inc/slider-community.php" ?>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8" style="z-index: 1;">
        <div class="left_content">
        <!--  Start -->
          <div class="row">
           <?php
           #record per page show limit query start..
            $getperPage = $comm->getCommunitySettingResult();
            $perPage = $getperPage->fetch_assoc();
            $recordPerPage = $perPage['record_per_page'];
            #end
            $record_per_page = $recordPerPage;
            $getPagination = $comm->getPaginationResult();
            $total_rows = mysqli_num_rows($getPagination);
            $total_pages = ceil($total_rows/$record_per_page);
             $page = '';
             if (isset($_GET['page']) && !empty($_GET['page'])) {
               $page = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['page']);
               $page = mysqli_real_escape_string($db->link, $page);
               $page = preg_replace('/\D/', '', $page);
               if ($page > $total_pages) {
                   $page = 1;
                 }elseif ((int)$page != true) {
                   $page = 1;
                 }
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
                      <?php if ($resultShow['com_url'] != NULL) { ?>
                      <a href="<?php echo $resultShow['com_url']; ?>" class="btn btn-theme"><i class="fas fa-globe"></i> Web</a>
                      <?php } if ($resultShow['fb_url'] != NULL) { ?>
                      <a href="<?php echo $resultShow['fb_url']; ?>" class="btn btn-theme"><i class="fab fa-facebook-f"></i> FB</a>
                      <?php } ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <?php } } ?>
        </div>
        <?php 
          $start_loop = $page;
          $difference = $total_pages - $page;

            if ($total_pages > 1) {
              if ($difference <= 5) {
                $start_loop = $total_pages - 5;
              }
              $end_loop = $start_loop + 4;
            }
          ?>
          <div class="row">
          <div class="col-lg-6 col-lg-offset-3">
            <nav aria-label="Page navigation example">
            <ul class="pagination">
          <?php
           if($page > 1)
          {
           echo "<li class='page-item'><a class='page-link'href='bangladeshi-community.php?page=1'>First</a></li>";
           echo "<li class='page-item'><a class='page-link' href='bangladeshi-community.php?page=".($page - 1)."'><<</a></li>";
          }
          if ($total_pages > 1) {
          $ac = 'active';
          for($i = max(1, $start_loop); $i <= min($end_loop, $total_pages); $i++)
          { 
            if ($page==$i) {
              $ac = 'active';
            }else{
              $ac = '';
            }
           echo "<li class='page-item ".$ac."'><a class='page-link' href='bangladeshi-community.php?page=".$i."'>".$i."</a></li>";
          }
          if($page <= $end_loop)
          {
           echo "<li class='page-item'><a class='page-link' href='bangladeshi-community.php?page=".($page + 1)."'>>></a></li>";
           echo "<li class='page-item'><a class='page-link' href='bangladeshi-community.php?page=".$total_pages."'>Last</a></li>";
          }
         }
         ?>
        </ul>
        </nav>
      </div>
      </div>
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
                <?php 
                   $getVideo = $comm->getVideoResult();
                   if ($getVideo) {
                     $vresult = $getVideo->fetch_assoc();
                  
                   if (!empty($vresult['com_yt_url']) || $vresult['com_yt_url'] != NULL) {
                  ?>
                 <iframe width="<?php echo $vresult['video_width']; ?>" height="<?php echo $vresult['video_height']; ?>" src="<?php echo $vresult['com_yt_url']; ?>" frameborder="0" 
              <?php if ($vresult['autoplay'] == '1') { ?> allow="autoplay; encrypted-media" <?php } ?>
              <?php if ($vresult['allowfs'] == '1') { ?> allowfullscreen <?php } ?>
              
              ></iframe>
               <?php }  } ?>
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
              <option>Sports fdg</option>
              <option>Technology</option>
              <option>Treads dfgdfg</option>
            </select>
          </div>
        </aside>
      </div>
    </div>
  </section>

<?php include 'inc/footer.php'; ?>