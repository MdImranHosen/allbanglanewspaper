<?php include "inc/header.php" ?>
<?php include "inc/header-top.php" ?>
<?php include "inc/news_mq_s.php" ?>
 

<?php include "inc/menu.php" ?>

 <section id="contentSection">
    <?php 
         $getTermsCo = $show->getTremsAndCondations();
         if ($getTermsCo) {
           while ($result = $getTermsCo->fetch_assoc()) {
    ?>
    <div class="row">
      <div class="col-lg-12 col-sm-12">
          <h3 class="termsandconditaions_title_style"><?php echo $result['title']; ?></h3>

      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-sm-12" style="z-index: 1;">
          <article class="terms_condations_details">
            <?php echo $result['details']; ?>
          </article>
      
      <button type="button" class="btn pull-right backbuttomstyle" onclick="history.go(-1);"><img src="admin/upload/back/back.png" width="20" height="20"> Back</button>
      </div>
    </div>
    <?php } } ?>
  </section>

<?php include 'inc/footer.php'; ?>