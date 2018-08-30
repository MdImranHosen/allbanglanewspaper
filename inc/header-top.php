<!-- <div id="preloader">
  <div id="status">&nbsp;</div>
</div> -->
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container-fluid">
<header id="header">
  <div class="row">
  	<div class="col-lg-12 col-md-12 col-sm-12" style="z-index: 1;">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
          </div>
          <div class="header_top_right">   
           <p><?php echo date("l jS \of F Y") ?></p>
          </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12" style="z-index: 1;">
      <div class="header_bottom">
        <div class="logo_area"><a href="index.php" class="logo">
          <h3>
            <?php
               $getSiteetc = $site_etc->getSiteEtcByIdShow();
               if ($getSiteetc) {
                 $result = $getSiteetc->fetch_assoc();
                  $site_name = $result['site_name'];
                  $site_nameword = str_word_count($site_name);

                  if ($site_nameword == 1) {
                    echo '<span style="color:#D088CA">'.$site_name.'</span>';
                  }elseif($site_nameword == 2){
                    if (strpos($site_name, ".") !== false) {
                      echo '<span style="color:#D088CA">'.$site_name.'</span>';
                    }else{
                      $stieNameWords = explode(' ', $site_name);
                    echo '<span style="color:#D088CA">'.$stieNameWords[0].'</span><span style="color:#000000">'.$stieNameWords[1].'</span>';
                    }
                    

                  }elseif($site_nameword == 3){
                    if (strpos($site_name, ".") !== false) {
                      echo '<span style="color:#D088CA">'.$site_name.'</span>';
                    }else{
                     $stieNameWords = explode(' ', $site_name);
                    echo '<span style="color:#D088CA">'.$stieNameWords[0].'</span><span style="color:#000000">'.$stieNameWords[1].'</span><span style="color:#D088CA">'.$stieNameWords[2].'</span>'; 
                    }
                    
                  }elseif($site_nameword == 4){
                    if (strpos($site_name, ".") !== false) {
                      echo '<span style="color:#D088CA">'.$site_name.'</span>';
                    }else{
                    $stieNameWords = explode(' ', $site_name);
                    echo '<span style="color:#D088CA">'.$stieNameWords[0].'</span><span style="color:#000000">'.$stieNameWords[1].'</span><span style="color:#D088CA">'.$stieNameWords[2].'</span><span style="color:#000000">'.$stieNameWords[3].'</span>';
                    }
                    
                  }else{ echo "Your Site Name";}
                  
                } ?>
          </h3>
        </a></div>
        <div class="add_banner">
           <a href="https://politicalgraphicsusa.com" target="_blank">
           <!--<img src="pdlbanner/B-4.png" alt="">-->
          <img src="https://politicalgraphicsusa.com/wordpress/wp-content/uploads/2013/07/flannellyad.jpg">
        </a> 
      </div>
      </div>
    </div>
  </div>
</header>
<!--Header End -->

