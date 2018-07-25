<?php include "inc/header.php" ?>
<?php include "inc/header-top.php" ?>
<?php /*include "inc/news_mq_s.php"*/ ?>
<?php include "inc/menu.php" ?>
 <section id="contentSection">
    <div class="row">
    <?php
       $getResult = $populer_news->getPopulerNewsPaper();
       if ($getResult) {
         while ($result = $getResult->fetch_assoc()) {
    ?>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
      <div class="thumbnail">
        <a href="<?php echo $result['news_url']; ?>" target="_blank">
          <img src="admin/<?php echo $result['image']; ?>" title="<?php echo $result['title']; ?>" alt="<?php echo $result['name']; ?>" style="width:100%;height: 40px;">
        </a>
      </div>
    </div>
   <?php } } ?>
  </div>
  </section>
<?php include 'inc/footer.php'; ?>