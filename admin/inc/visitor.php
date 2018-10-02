 <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
              <?php 
              $getInbox = $con_us->getInboxMessageSer();
              if ($getInbox) {
                $count = mysqli_num_rows($getInbox);
                echo $count;
              }else{ echo "0"; }
            ?>
              </h3>

              <p>E-mail</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope-o"></i>
            </div>
            <a href="mailbox.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
                <?php 
                  $date = date("Y-m-d");
                  $todayv = $vis_co->todayVisitorNumber($date);
                  if ($todayv) {
                    $todayvisitor = mysqli_num_rows($todayv);
                    echo $todayvisitor;
                  }else{ echo "0"; }
                ?>
              </h3>

              <p>Today Unique Visitor</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="totalpageviewlist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php 
             $visitorNum = $vis_co->showVisitorNumber();
             if ($visitorNum) {
               $numbercount = mysqli_num_rows($visitorNum);
               echo $numbercount;
             }else{ echo "0"; }
              ?></h3>

              <p>Total Unique Visitor</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="totalpageviewlist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
               <?php 
                 $tpview = $vis_co->totalPageView();
                 if ($tpview) {
                   $pageView = mysqli_num_rows($tpview);
                   echo $pageView;
                 }else{ echo "0"; }
               ?> 
              </h3>

              <p>Total Page View</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="totalpageviewlist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->