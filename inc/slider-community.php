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