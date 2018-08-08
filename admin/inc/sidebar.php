  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo Session::get('name'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-clipboard"></i>
            <span>All Post</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addpost.php"><i class="fa fa-plus-square"></i>Add Post</a></li>
            <li><a href="post_list.php"><i class="fa fa-th-list"></i>Post List</a></li>
            <li><a href="category.php"><i class="glyphicon glyphicon-th-list"></i>Category</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="menu_list.php">
            <i class="fa fa-bars" aria-hidden="true"></i>
            <span>All Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="menu_list.php"><i class="fa fa-plus-square"></i>Add Menu</a></li>
            <li><a href="menu.php"><i class="fa fa-th-list"></i>Menu List</a></li>
          </ul>
        </li>
        <li>
          <a href="populer_list.php">
            <i class="fa fa-bars" aria-hidden="true"></i>
            <span>বাংলা জনপ্রিয় খবরের কাগজ</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-clipboard"></i>
            <span>All Newspaper</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addNewspaper.php"><i class="fa fa-plus-square"></i>Add Newspaper</a></li>
            <?php
              $getFirstId = $bn_ns->getFirstIdByPaperlist();
              if ($getFirstId) {
                while ($getfResult = $getFirstId->fetch_assoc()) {
            ?>
            <li><a href="paperlist.php?paperlist=<?php echo $getfResult['catId']; ?>"><i class="fa fa-th-list"></i>Newspaper List</a></li>
            <?php } } ?>
            <li><a href="bangla-district.php"><i class="fa fa-th"></i>
            <span>Bangla District and Country</span></a></li>
          </ul>
        </li>
        <li>
          <a href="radio-list.php">
            <!-- <img src="../images/icon/radio.png"> -->
            <i class="fa fa-music"></i>
            <span>বাংলা রেডিও</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="tv-channels.php">
            <i class="fa fa-television"></i>
            <span>বাংলা টিভি</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Bangla Community</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        <ul class="treeview-menu">
          <li>
            <a href="bangladeshi-community.php"><i class="fa fa-plus-square"></i>Community Manage</a>
          </li>
          <li>
            <a href="community-video.php"><i class="fa fa-video-camera"></i>Community Video</a>
          </li><li>
            <a href="community-slider.php"><i class="fa fa-sliders"></i>Community Slider</a>
          </li>
        </ul>
        </li>
        <li>
          <a href="user_list.php">
            <i class="fa fa-bars" aria-hidden="true"></i>
            <span>User List</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
         <li>
          <a href="user-terms-and-conditions-add.php">
            <i class="fa fa-cog" aria-hidden="true"></i>
            <span>User Terms and Conditions</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
    <!-- Down Menu is not working --> 
        <li>
          <a href="socail.php">
            <i class="fa fa-laptop"></i> <span>Socail Media</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"><i class="fa fa-share-square"></i></small>
            </span>
          </a>
        </li>
        <li>
          <a href="about-address.php">
            <i class="fa fa-th"></i> <span>About & Address</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"><i class="fa fa-share-square"></i></small>
            </span>
          </a>
        </li>
        <li>
          <a href="site_etc.php">
            <i class="fa fa-edit"></i> <span>Site ETC</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"><i class="fa fa-share-square"></i></small>
            </span>
          </a>
        </li>
        <?php if (Session::get('level') == '0') { ?>
        <li>
          <a href="registration.php">
            <i class="glyphicon glyphicon-user"></i> <span>User </span>
          </a>
        </li>
        <?php } ?>
        <li>
          <a href="mailbox.php">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green"><?php 
              $getInbox = $con_us->getInboxMessageSer();
              if ($getInbox) {
                $count = mysqli_num_rows($getInbox);
                echo $count;
              }else{ echo "0"; }
            ?></small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.php"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.php"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.php"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.php"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.php"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.php"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.php"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.php"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.php"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.php"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.php"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/calendar.php">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.php"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.php"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.php"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.php"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.php"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.php"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.php"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.php"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.php"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>