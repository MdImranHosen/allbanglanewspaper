             <!--Dhaka Dev Main Menu Start.. -->
                      <li class="dropdown dropdown-submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ঢাকা বিভাগ </a>
                        <ul class="dropdown-menu">
                          <!-- Dhaka Dev Sub menu start-->
                          <?php 
                           $getDhakar = $bn_ns->getDhakaDivisionZila();
                           if ($getDhakar) {
                             while ($dresult = $getDhakar->fetch_assoc()) {
                          ?>
                          <li><a href="newspaper.php?paperlist=<?php echo $dresult['catId']; ?>"><?php echo $dresult['bn_cn']; ?></a></li>
                          <?php } }else{ echo "Empty!"; } ?>
                          <!-- Dhaka Dev Sub menu end-->
                        </ul>
                      </li>
                    <!--Dhaka Dev Main Menu End.. -->

                    <!--khulna Dev Main Menu Start.. -->
                    <li class="dropdown dropdown-submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">খুলনা বিভাগ </a>
                        <ul class="dropdown-menu">
                    <!-- khulna Dev Sub menu start-->
                          <?php 
                           $getKhulna = $bn_ns->getKhulnaDivisionZila();
                           if ($getKhulna) {
                             while ($kresult = $getKhulna->fetch_assoc()) {
                          ?>
                          <li><a href="newspaper.php?paperlist=<?php echo $kresult['catId']; ?>"><?php echo $kresult['bn_cn']; ?></a></li>
                          <?php } }else{ echo "Empty!"; } ?>
                         
                          
                          <!-- khulna Dev Sub menu end-->
                        </ul>
                      </li>
                    <!--khulna Dev Main Menu End.. -->

                    <!--Chittagong Dev Main Menu Start.. -->
                    <li class="dropdown dropdown-submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">চট্টগ্রাম বিভাগ </a>
                        <ul class="dropdown-menu">
                    <!-- Chittagong Dev Sub menu start-->
                       <?php 
                           $getChittagong = $bn_ns->getChittagongDivisionZila();
                           if ($getChittagong) {
                             while ($chiresult = $getChittagong->fetch_assoc()) {
                          ?>
                          <li><a href="newspaper.php?paperlist=<?php echo $chiresult['catId']; ?>"><?php echo $chiresult['bn_cn']; ?></a></li>
                          <?php } } ?>
                          <!-- Chittagong Dev Sub menu end-->
                        </ul>
                      </li>
                    <!--Chittagong Dev Main Menu End.. -->
                    <!--Rajshahi Dev Main Menu Start.. -->
                    <li class="dropdown dropdown-submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">রাজশাহী বিভাগ </a>
                        <ul class="dropdown-menu">
                    <!-- Rajshahi Dev Sub menu start-->
                          <?php 
                           $getRajshahi = $bn_ns->getRajshahiDivisionZila();
                           if ($getRajshahi) {
                             while ($rajresult = $getRajshahi->fetch_assoc()) {
                          ?>
                          <li><a href="newspaper.php?paperlist=<?php echo $rajresult['catId']; ?>"><?php echo $rajresult['bn_cn']; ?></a></li>
                          <?php } } ?>
                          <!-- Rajshahi Dev Sub menu end-->
                        </ul>
                      </li>
                    <!--Rajshahi Dev Main Menu End.. -->
                    <!--Barisal Division Main Menu Start.. -->
                    <li class="dropdown dropdown-submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">বরিশাল বিভাগ </a>
                        <ul class="dropdown-menu">
                    <!-- Barisal Division Sub menu start-->
                          <?php 
                           $getBarisal = $bn_ns->getBarisalDivisionZila();
                           if ($getBarisal) {
                             while ($bariresult = $getBarisal->fetch_assoc()) {
                          ?>
                          <li><a href="newspaper.php?paperlist=<?php echo $bariresult['catId']; ?>"><?php echo $bariresult['bn_cn']; ?></a></li>
                          <?php } } ?>
                          <!-- Barisal Division Sub menu end-->
                        </ul>
                      </li>
                    <!--Barisal Division Main Menu End.. -->

                    <!--Rangpur Division Main Menu Start.. -->
                    <li class="dropdown dropdown-submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">রংপুর বিভাগ </a>
                        <ul class="dropdown-menu">
                    <!-- Rangpur Division Sub menu start-->
                          <?php 
                           $getRangpur = $bn_ns->getRangpurDivisionZila();
                           if ($getRangpur) {
                             while ($rangresult = $getRangpur->fetch_assoc()) {
                          ?>
                          <li><a href="newspaper.php?paperlist=<?php echo $rangresult['catId']; ?>"><?php echo $rangresult['bn_cn']; ?></a></li>
                          <?php } } ?>
                          <!-- Rangpur Division Sub menu end-->
                        </ul>
                      </li>
                    <!--Rangpur Division Main Menu End.. -->

                    <!--Sylhet Division Main Menu Start.. -->
                    <li class="dropdown dropdown-submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">সিলেট বিভাগ </a>
                        <ul class="dropdown-menu">
                    <!-- Sylhet Division Sub menu start-->
                         <?php 
                           $getSylhet = $bn_ns->getSylhetDivisionZila();
                           if ($getSylhet) {
                             while ($sylresult = $getSylhet->fetch_assoc()) {
                          ?>
                          <li><a href="newspaper.php?paperlist=<?php echo $sylresult['catId']; ?>"><?php echo $sylresult['bn_cn']; ?></a></li>
                          <?php } } ?>
                          <!-- Sylhet Division Sub menu end-->
                        </ul>
                      </li>
                    <!--Sylhet Division Main Menu End.. -->

                    <!--Mymensingh division Main Menu Start.. -->
                    <li class="dropdown dropdown-submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ময়মনসিংহ বিভাগ </a>
                        <ul class="dropdown-menu">
                    <!-- Mymensingh division Sub menu start-->
                          <?php 
                           $getMymensingh = $bn_ns->getMymensinghDivisionZila();
                           if ($getMymensingh) {
                             while ($mymresult = $getMymensingh->fetch_assoc()) {
                          ?>
                          <li><a href="newspaper.php?paperlist=<?php echo $mymresult['catId']; ?>"><?php echo $mymresult['bn_cn']; ?></a></li>
                          <?php } } ?>
                          <!-- Mymensingh division Sub menu end-->
                        </ul>
                      </li>
                    <!--Mymensingh division Main Menu End.. -->