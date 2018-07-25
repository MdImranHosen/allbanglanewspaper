<!DOCTYPE html>
<html>
<head>
<title>NewsFeed | Pages | Single Page</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Start style link Menu -->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700|Droid+Serif:400,700|Doid+Sans+Mono' rel='stylesheet' type='text/css'><link href='https://fonts.googleapis.com/css?family=PT+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'><link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
  
<link rel="stylesheet" type="text/css" href="../css/menu_style.css">
<!-- End style link Menu -->
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="../assets/css/font.css">
<link rel="stylesheet" type="text/css" href="../assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="../assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="../assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="../assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">

<link rel="stylesheet" type="text/css" href="../css/comment_style.css" />
<!--[if lt IE 9]>
<script src="../assets/js/html5shiv.min.js"></script>
<script src="../assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>

<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container-fluid">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="../index.php" class="logo"><img src="../images/logo.jpg" alt=""></a></div>
          <div class="add_banner"><a href="#"><img src="../images/addbanner_728x90_V1.jpg" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>

<?php include "inc/news_mq_s.php" ?>

  <!--Start Bootstrap Dropdown menu -->

 <?php include "../inc/menu.php" ?>

  <!--End Bootstrap Dropdown Menu-->
  
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
          <!--  <ol class="breadcrumb">
              <li><a href="../index.php">Home</a></li>
              <li><a href="#">Technology</a></li>
              <li class="active">Mobile</li>
            </ol> -->
            <h1>Morbi dapibus, enim quis luctus interdum</h1>
            <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Wpfreeware</a> <span><i class="fa fa-calendar"></i>6:49 AM</span> <a href="#"><i class="fa fa-tags"></i>Technology</a> </div>
            <div class="single_page_content"> <img class="img-center" src="../images/single_post_img.jpg" alt="">
              <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra urna. Morbi dui lectus, pharetra nec elementum eget, vulputate ut nisi. Aliquam accumsan, nulla sed feugiat vehicula, lacus justo semper libero, quis porttitor turpis odio sit amet ligula. Duis dapibus fermentum orci, nec malesuada libero vehicula ut. Integer sodales, urna eget interdum eleifend, nulla nibh laoreet nisl, quis dignissim mauris dolor eget mi. Donec at mauris enim. Duis nisi tellus, adipiscing a convallis quis, tristique vitae risus. Nullam molestie gravida lobortis. Proin ut nibh quis felis auctor ornare. Cras ultricies, nibh at mollis faucibus, justo eros porttitor mi, quis auctor lectus arcu sit amet nunc. Vivamus gravida vehicula arcu, vitae vulputate augue lacinia faucibus.</p>
              <!--Facebook Fllow Botton-->
              <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11';
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>

              <div class="fb-like" data-href="http://localhost/newsfeed/pages/single_page.php" data-width="200" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
            <!--Facebook Fllow Botton End-->
               

       <div>
          <form>
            <div class="form-group">
              <label for="comment">Comment:</label>
              <textarea class="form-control" rows="3" id="comment"></textarea>
            </div>
            <div class="form-group row">
            <div class="col-lg-6 col-xs-12">
              <label for="ex4">Name:</label>
              <input class="form-control" id="ex4" type="text" placeholder="Enter Your Name.">
            </div>
            <div class="col-lg-6 col-xs-12">
              <label for="ex4">Email:</label>
              <input class="form-control" id="ex4" type="text" placeholder="Enter Your Email.">
            </div>
          </div>
       <!--   <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>-->
        <button type="submit" class="btn btn-green pull-right">POST</button>
      </form>

      <br>

<!--Start Facebook comment System for webpage-->
       <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
         
         <div class="fb-comments" data-href="http://localhost/newsfeed/pages/single_page.php" data-numposts="5" data-width="100%"></div>

    
       <!--End Facebook comment system for webpage-->
      <!-- Left-aligned media object -->
  <div class="media">
    <div class="media-left">
      <img src="../images/img_avatar1.png" class="media-object" style="width:60px">
    </div>
    <div class="media-body">
      <h4 class="media-heading">Left-aligned</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
  </div>
  <hr>
  
  <div class="media">
    <div class="media-left">
      <img src="../images/img_avatar1.png" class="media-object" style="width:60px">
    </div>
    <div class="media-body">
      <h4 class="media-heading">Right-aligned</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
  </div>
    </div>
         <!--     <blockquote> Donec volutpat nibh sit amet libero ornare non laoreet arcu luctus. Donec id arcu quis mauris euismod placerat sit amet ut metus. Sed imperdiet fringilla sem eget euismod. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque adipiscing, neque ut pulvinar tincidunt, est sem euismod odio, eu ullamcorper turpis nisl sit amet velit. Nullam vitae nibh odio, non scelerisque nibh. Vestibulum ut est augue, in varius purus. </blockquote>
              <ul>
                <li>Nullam vitae nibh odio, non scelerisque nibh</li>
                <li>Nullam vitae nibh odio, non scelerisque nibh</li>
                <li>Nullam vitae nibh odio, non scelerisque nibh</li>
                <li>Nullam vitae nibh odio, non scelerisque nibh</li>
                <li>Nullam vitae nibh odio, non scelerisque nibh</li>
                <li>Nullam vitae nibh odio, non scelerisque nibh</li>
              </ul>
              <h2>This is h2 title</h2>
              <h3>This is h3 title</h3>
              <h4>This is h4 title</h4>
              <h5>This is h5 title</h5>
              <h6>This is h6 Title</h6>
              <button class="btn default-btn">Default</button>
              <button class="btn btn-red">Red Button</button>
              <button class="btn btn-yellow">Yellow Button</button>
              <button class="btn btn-green">Green Button</button>
              <button class="btn btn-black">Black Button</button>
              <button class="btn btn-orange">Orange Button</button>
              <button class="btn btn-blue">Blue Button</button>
              <button class="btn btn-lime">Lime Button</button>
              <button class="btn btn-theme">Theme Button</button> -->

              

   <!-- Comment start-->
      <!--  <div>

           <ul class="comment-section">

      <li class="comment user-comment">

                <div class="info">
                    <a href="#">Anie Silverston</a>
                    <span>4 hours ago</span>
                </div>

                <a class="avatar" href="#">
                    <img src="../images/avatar_user_1.jpg" width="35" alt="Profile Avatar" title="Anie Silverston" />
                </a>

                <p>Suspendisse gravida sem?</p>

      </li>

      <li class="comment author-comment">

                <div class="info">
                    <a href="#">Jack Smith</a>
                    <span>3 hours ago</span>
                </div>

                <a class="avatar" href="#">
                    <img src="../images/avatar_author.jpg" width="35" alt="Profile Avatar" title="Jack Smith" />
                </a>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse gravida sem sit amet molestie portitor.</p>

      </li>

      <li class="comment user-comment">

                <div class="info">
                    <a href="#">Bradley Jones</a>
                    <span>1 hour ago</span>
                </div>

                <a class="avatar" href="#">
                    <img src="../images/avatar_user_2.jpg" width="35" alt="Profile Avatar" title="Bradley Jones" />
                </a>

                <p>Suspendisse gravida sem sit amet molestie portitor?</p>

      </li>

            <li class="comment author-comment">

                <div class="info">
                    <a href="#">Jack Smith</a>
                    <span>1 hour ago</span>
                </div>

                <a class="avatar" href="#">
                    <img src="../images/avatar_author.jpg" width="35" alt="Profile Avatar" title="Jack Smith" />
                </a>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisee gravida sem sit amet molestie porttitor.</p>

            </li>

            <li class="write-new">

                <form action="#" method="post">

                    <textarea placeholder="Write your comment here" name="comment"></textarea>
                   
                    <div>
                        <img src="../images/avatar_user_2.jpg" width="35" alt="Profile of Bradley Jones" title="Bradley Jones" />
                        <button type="submit">Submit</button>
                    </div>

                </form>

            </li>

          </ul>
        </div> -->
           <!-- Comment End-->

              
            </div>



            <div class="social_link">
              <ul class="sociallink_nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
            <div class="related_post">
              <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">
                <li>
                  <div class="media"> <a class="media-left" href="single_page.php"> <img src="../images/post_img1.jpg" alt=""> </a>
                    <div class="media-body"> <a class="catg_title" href="single_page.php"> Aliquam malesuada diam eget turpis varius</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media"> <a class="media-left" href="single_page.php"> <img src="../images/post_img2.jpg" alt=""> </a>
                    <div class="media-body"> <a class="catg_title" href="single_page.php"> Aliquam malesuada diam eget turpis varius</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media"> <a class="media-left" href="single_page.php"> <img src="../images/post_img1.jpg" alt=""> </a>
                    <div class="media-body"> <a class="catg_title" href="single_page.php"> Aliquam malesuada diam eget turpis varius</a> </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <nav class="nav-slit"> <a class="prev" href="#"> <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
        <div>
          <h3>City Lights</h3>
          <img src="../images/post_img1.jpg" alt=""/> </div>
        </a> <a class="next" href="#"> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
        <div>
          <h3>Street Hills</h3>
          <img src="../images/post_img1.jpg" alt=""/> </div>
        </a> </nav>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
            <ul class="spost_nav">
              <li>
                <div class="media wow fadeInDown"> <a href="single_page.php" class="media-left"> <img alt="" src="../images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="single_page.php" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="single_page.php" class="media-left"> <img alt="" src="../images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="single_page.php" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="single_page.php" class="media-left"> <img alt="" src="../images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="single_page.php" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="single_page.php" class="media-left"> <img alt="" src="../images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="single_page.php" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
              <li role="presentation"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
              <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>
            </ul>

            <div role="tabpanel" class="tab-pane active" id="video">
              <div class="vide_area">
                <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
              </div>
            </div>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane" id="category">
                <ul>
                  <li class="cat-item"><a href="#">Sports</a></li>
                  <li class="cat-item"><a href="#">Fashion</a></li>
                  <li class="cat-item"><a href="#">Business</a></li>
                  <li class="cat-item"><a href="#">Technology</a></li>
                  <li class="cat-item"><a href="#">Games</a></li>
                  <li class="cat-item"><a href="#">Life &amp; Style</a></li>
                  <li class="cat-item"><a href="#">Photography</a></li>
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane" id="comments">
                <ul class="spost_nav">
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.php" class="media-left"> <img alt="" src="../images/post_img1.jpg"> </a>
                      <div class="media-body"> <a href="single_page.php" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.php" class="media-left"> <img alt="" src="../images/post_img2.jpg"> </a>
                      <div class="media-body"> <a href="single_page.php" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.php" class="media-left"> <img alt="" src="../images/post_img1.jpg"> </a>
                      <div class="media-body"> <a href="single_page.php" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.php" class="media-left"> <img alt="" src="../images/post_img2.jpg"> </a>
                      <div class="media-body"> <a href="single_page.php" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Sponsor</span></h2>
            <a class="sideAdd" href="#"><img src="../images/add_img.jpg" alt=""></a> </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Category Archive</span></h2>
            <select class="catgArchive">
              <option>Select Category</option>
              <option>Life styles</option>
              <option>Sports</option>
              <option>Technology</option>
              <option>Treads</option>
            </select>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Links</span></h2>
            <ul>
              <li><a href="http://techgroup.co/" target="_blank">Tech Group</a></li>
              <li><a href="#">Rss Feed</a></li>
              <li><a href="#">Login</a></li>
              <li><a href="#">Life &amp; Style</a></li>
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </section>
  <footer id="footer">
    <div class="footer_top">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInLeftBig">
            <h2>Flickr Images</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.310851197278!2d90.41073071453336!3d23.736291984596402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b85f9ec209f1%3A0x229c1f48fbf1342c!2sTECH+GROUP!5e0!3m2!1sen!2sbd!4v1513666057090" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInDown">
            <h2>Tag</h2>
            <ul class="tag_nav">
              <li><a href="#">Games</a></li>
              <li><a href="#">Sports</a></li>
              <li><a href="#">Fashion</a></li>
              <li><a href="#">Business</a></li>
              <li><a href="#">Life &amp; Style</a></li>
              <li><a href="#">Technology</a></li>
              <li><a href="#">Photo</a></li>
              <li><a href="#">Slider</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInRightBig">
            <h2>Contact</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <address>
              Address: 30/ A নয়া পল্টন, Dhaka 1000 Phone: 01711-525312
            </address>
          </div>
        </div>
      </div>
    </div>
    <div class="footer_bottom">
      <p class="copyright">Copyright &copy; <?php echo date("Y"); ?> <a href="../index.php">Tech Group</a></p>
      <p class="developer">Developed By Tech Group</p>
    </div>
  </footer>
</div>
<script src="../assets/js/jquery.min.js"></script> 
<script src="../assets/js/wow.min.js"></script> 
<script src="../assets/js/bootstrap.min.js"></script> 
<script src="../assets/js/slick.min.js"></script> 
<script src="../assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="../assets/js/jquery.newsTicker.min.js"></script> 
<script src="../assets/js/jquery.fancybox.pack.js"></script> 
<script src="../assets/js/custom.js"></script>
<!--Menu Script Start
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>-->
<script src="../js/menu_script.js"></script>
<!--Menu script End-->
</body>
</html>