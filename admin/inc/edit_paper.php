 <div id="deleteMassagetimeout">
  <?php
   if (isset($getMsg)) {
     echo $getMsg;
   }
  ?>
  </div>
  <div class="box box-success">
    <!-- /.box-header -->
    <div class="box-body">
      <!-- Custom Tabs -->
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs bangla_district_world">
      <li class="active"><a href="#tab_1" data-toggle="tab">বাংলাদেশ</a></li>
      <li><a href="#tab_2" data-toggle="tab">বিশ্ব</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="tab_1">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="5%">NO</th>
            <th>District Or Country Name</th>
            <th width="15%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
             $result = $bn_ns->getBangladeshiDistrict();
             $i = 0;
             if ($result) {
                while ($rows = $result->fetch_assoc()) {
                  $i++;
          ?>
       <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $rows['bn_cn']; ?></td>
          <td class="menu_defarent">
            <span><a href="edit_paper_cat.php?edit_paper_cat=<?php echo $rows['catId']; ?>"><i class="glyphicon glyphicon-edit"></i></a></span>
            <span><a class="btn_delete" onclick="return confirm('Are you sure to Delete!')" href="?banglaCountryDelete=<?php echo $rows['catId']; ?>"><i class="glyphicon glyphicon-trash"></i></a></span>
          </td>
        </tr>
         <?php } }else{ ?>
         <tr>
          <td>00.0</td>
          <td>Empty</td>
          <td>(0)</td>
         </tr>  
        <?php } ?>
        </tbody>
      </table>
      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="tab_2">
        <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th width="5%">NO</th>
          <th>District Or Country Name</th>
          <th width="15%">Action</th>
        </tr>
        </thead>
        <tbody>
          <?php 
             $result = $bn_ns->getBanglaForeign();
             $i = 0;
             if ($result) {
                while ($rows = $result->fetch_assoc()) {
                  $i++;
          ?>
       <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $rows['bn_cn']; ?></td>
          <td class="menu_defarent">
            <span><a href="edit_paper_cat.php?edit_paper_cat=<?php echo $rows['catId']; ?>"><i class="glyphicon glyphicon-edit"></i></a></span>
            <span><a class="btn_delete" onclick="return confirm('Are you sure to Delete!')" href="?banglaCountryDelete=<?php echo $rows['catId']; ?>"><i class="glyphicon glyphicon-trash"></i></a></span>
          </td>
        </tr>
         <?php } }else{ ?>
        <tr>
          <td>00.0</td>
          <td>Empty</td>
          <td>(0)</td>
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