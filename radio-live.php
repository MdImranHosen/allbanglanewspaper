<?php include "inc/header.php" ?>
<?php
include "classes/Radio.php";
$radio = new Radio();
if (!isset($_GET['liveRadio']) && isset($_GET['liveRadio']) == NULL) {
  header('Location:index.php');
}else{
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['liveRadio']);
    $id = preg_replace('/\D/', '', $_GET['liveRadio']);
    $id = mysqli_real_escape_string($db->link, $id);
    $id = (int)$id;
 }
?>
<?php include "inc/header-top.php" ?>
<?php include "inc/news_mq_s.php" ?>
<?php include "inc/menu.php" ?>

 <section id="contentSection">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
        <h3 style="padding-left: 20px;"><span style="color: red;font-weight: bold;">বাংলা</span> <img src="images/icon/radio2.png"><span style="color: red;font-weight: bold;">রেডিও</span></h3>
      </div>
      <?php
       $getLiveResult = $radio->getLiveRadio($id);
       if ($getLiveResult) {
         while ($result = $getLiveResult->fetch_assoc()) {
      ?>
      <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 live-radio-s" style="z-index: 1;">
        <table class="table table-hover table-border">
          <thead>
            <tr>
              <th>Type </th>
              <th>Details</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Radio Name: </td>
              <td><?php echo $result['radio_n']; ?></td>
            </tr>
            <tr>
              <td>Website: </td>
              <td><a title="<?php echo $result['radio_n']; ?>" href="<?php echo $result['radio_url']; ?>" target="_blank"> <?php echo $result['radio_url']; ?></a></td>
            </tr>
            <tr>
              <td>City: </td>
              <td> <?php echo $result['city_country']; ?></td>
            </tr>
            <tr align="center">
              <td colspan="2">
                <audio id="stream" controls="" preload="none" autoplay="" class="radio-live-audio">
                <source src="<?php echo $result['stream_url']; ?>" type="audio/mpeg"></audio>
              </td>
            </tr>
            <tr align="center">
              <td colspan="2"><img class="liveRadioLogo" title="<?php echo $result['radio_n']; ?>" src="<?php echo $result['radio_img']; ?>"></td>
            </tr>
          </tbody>
        </table>
      </div>
     <?php } } ?>
    </div>
  </section>

<?php include 'inc/footer.php'; ?>