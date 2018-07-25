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
          <!-- <img src="images/logo.jpg" alt=""> -->
          <h3>
            <?php
               $getSiteetc = $site_etc->getSiteEtcByIdShow();
               if ($getSiteetc) {
                 while ($result = $getSiteetc->fetch_assoc()) {
                  $site_name = $result['site_name'];
                  $stieName = explode(' ', $site_name)
              ?>
            <span style="color:green;"><?php echo $stieName[0]; ?> </span> <span style="color: red;"> <?php echo $stieName[1]; ?> </span> <span style="color: green;"> <?php echo $stieName[2]; ?></span>
          <?php } } ?>
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

