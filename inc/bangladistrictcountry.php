<style type="text/css">
.tab_bar_block ul {
  display: table;
  width: 100%;
  margin: 0 0 10px 0;
 }

.tab_bar_block ul > li{
  width: 48%;
  background: #000;
  color: #fff;
}
.tab_bar_block ul > li.active {
  background: #D083CF;
  opacity: 0.9;
}
.tab_bar_block ul > li.active > a:hover{cursor: default;}
.tab_bar_block ul > li > a{
  position: relative;
  display: block;
  line-height: 32px;
  font-size: 22px;
  color: #fff;
  width: 100%;
  text-align: center;
  cursor: pointer;
  border-radius: 5px;
  font-weight: normal;
}
.total-zila-in-bangladesh ul > li {
  background: #fff;
  float: left;
  border-radius: 3px;
}
.tab_bar_block >.list-inline > li > a{font-size: 22px;line-height: 28px;font-weight: bold;padding-top: 6px;padding-bottom: 6px;}
.total-zila-in-bangladesh ul > li > a {border-radius: 3px;letter-spacing: 1px;color: #000;}
@media (max-width: 420px ){
 .tab_bar_block ul > li{width: 96%;margin-bottom: 2px;} 

.total-zila-in-bangladesh ul > li {width: 96%;}
}
</style>
<div class="tab_bar_block">
  <ul class="list-inline">
    <li class="active"><a data-toggle="tab" href="#home">বাংলাদেশ</a></li>
    <li><a data-toggle="tab" href="#menu1">বিশ্ব</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="total-zila-in-bangladesh">
        <ul>
          <?php 
             $result = $bn_ns->getBangladeshiDistrict();
             if ($result) {
                while ($rows = $result->fetch_assoc()) {
           ?>
          <li><a href="newspaper.php?paperlist=<?php echo $rows['catId']; ?>"><?php echo $rows['bn_cn']; ?></a></li>
          <?php } } ?>
         </ul>
      </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <div class="total-zila-in-bangladesh">
        <ul>
          <?php 
             $result = $bn_ns->getBanglaForeign();
             if ($result) {
                while ($rows = $result->fetch_assoc()) {
           ?>
          <li><a href="newspaper.php?paperlist=<?php echo $rows['catId']; ?>"><?php echo $rows['bn_cn']; ?></a></li>
          <?php } } ?>
         </ul>
      </div>
    </div>
  </div>
</div>