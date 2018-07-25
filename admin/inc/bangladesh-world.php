<div class="box box-success">
  <!-- /.box-header -->
  <div class="box-body">
    <!-- Custom Tabs -->
<div class="nav-tabs-custom">
  <ul class="nav nav-tabs bangla_district_world">
    <li class="active"><a href="#bangladesh" data-toggle="tab">বাংলাদেশ</a></li>
    <li><a href="#world" data-toggle="tab">বিশ্ব</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="bangladesh">
   <style type="text/css">
     .banglaworld > tbody{width: 100%;}
     .banglaworld > tbody > tr{width: 30%;float: left;}
     .banglaworld > tbody > td{float: left;}
   </style>
    <table class="table table-bordered table-striped banglaworld">
      <tbody>
        <?php 
           $result = $bn_ns->getBangladeshiDistrict();
           if ($result) {
              while ($rows = $result->fetch_assoc()) {
        ?>
        <tr>
         <td><a style="font-size: 18px;" href="paperlist.php?paperlist=<?php echo $rows['catId']; ?>"><?php echo $rows['bn_cn']; ?></a></td>
        </tr>
       <?php } }else{ ?>
       <tr>
        <td>Empty</td>
       </tr>  
      <?php } ?>
      </tbody>
    </table>
    </div>
    <!-- /.tab-pane -->
    <div class="tab-pane" id="world">
      <table class="table table-bordered table-striped banglaworld">
      <tbody>
        <?php 
           $result = $bn_ns->getBanglaForeign();
           if ($result) {
              while ($rows = $result->fetch_assoc()) {
        ?>
     <tr>
        <td><a style="font-size: 18px;" href="paperlist.php?paperlist=<?php echo $rows['catId']; ?>"><?php echo $rows['bn_cn']; ?></a></td>
      </tr>
       <?php } }else{ ?>
      <tr>
        <td>Empty</td>
      </tr>  
      <?php } ?>
      </tbody>
    </table>
    </div>
    <!-- /.tab-pane -->
  </div>
  <!-- /.tab-content -->
</div>
<!-- nav-tabs-custom -->
  </div>
  <!-- /.box-body -->
   
</div>