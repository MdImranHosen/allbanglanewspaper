<!--Start Bootstrap Dropdown menu -->
<section id="navArea">
<nav class="navbar navbar-inverse" role="navigation" style="z-index: 4;">
<div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
  </button>

</div> 

<div class="collapse navbar-collapse" id="navbar-collapse-1">
<ul class="nav navbar-nav">
  <li class="active"><a href="index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
  <!-- all bangladesh news papers link-->
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">সমগ্র বাংলাদেশ <b class="caret"></b></a>
    <ul class="dropdown-menu">
      <!--Division Main Menu Start -->
       <?php include 'division_menu.php'; ?>
      <!--Division Main menu End -->
      </ul>
    </li>
    <!-- Wrold Bangla news Main Menu Start.. -->
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">আন্তর্জাতিক বাংলা  <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <!-- Wrold Menu Start -->
         <?php 
             $getWorld = $bn_ns->getWroldCountry();
             if ($getWorld) {
               while ($worldresult = $getWorld->fetch_assoc()) {
            ?>
            <li><a href="newspaper.php?paperlist=<?php echo $worldresult['catId']; ?>"><?php echo $worldresult['bn_cn']; ?></a></li>
        <?php } } ?>
        <!-- Wrold Menu End -->
      </ul>
    </li>
    <!-- Wrold Bangla news Main Menu End.. -->
    <li><a href="bangladeshi-community.php">বাংলা কমিউনিটি </a></li>
    <li><a href="#">তথ্য প্রযুক্তি </a></li>
    <li><a href="radio.php">বাংলা রেডিও </a></li>
    <li><a href="tv.php">বাংলা টিভি</a></li>
    
    <!-- <li><a href="banglapopularnewspaper.php">বাংলা জনপ্রিয় নিউজ পেপার</a></li> -->
    <li><a href="#">চাকরি </a></li>
</ul>
</div>
</nav>
</section>