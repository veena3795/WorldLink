<?php
mysql_connect("localhost", "root", "");
mysql_select_db('social_net_working_site');
session_start();
$id = $_SESSION["id"];
?>

<!DOCTYPE html>
<html>


    <head>
        <title>Social NetWorking Site</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script src="../../cdn-cgi/apps/head/1sZCq7BECvDgKDoo_5GdSy-HJEo.js"></script><link rel="shortcut icon" href="img/favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style/bootstrap.min.css">
        <link rel="stylesheet" href="../../../maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style/icon.css">
        <link rel="stylesheet" href="style/loader.css">
        <link rel="stylesheet" href="style/idangerous.swiper.css">
        <link rel="stylesheet" href="style/jquery-ui.css">
        <link rel="stylesheet" href="style/stylesheet.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="script.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

        <!-- THE LOADER -->

        <div class="be-loader">
            <div class="spinner">
                <img src="img/logo-loader.png"  alt="">
                <p class="circle">
                    <span class="ouro">
                        <span class="left"><span class="anim"></span></span>
                        <span class="right"><span class="anim"></span></span>
                    </span>
                </p>
            </div>
        </div>
        <!-- THE HEADER -->
        <header>
            <div class="container-fluid custom-container">
                <div class="row no_row row-header">
                    <div class="brand-be">
                        <h1><label style="font-size: 30px; font-family: Comic Sans MS; color: white; height: 50px; min-height: 50px"><b style="color:pink">W</b>Orld <b style="color:pink">L</b>ink</label></h1>
                    </div>
                    <div class="login-header-block">
                        <div class="login_block">																	


                            <div class="be-drop-down login-user-down">
                                <?php
                                $q1 = mysql_query("select * from register where id=$id");
                                $row1 = mysql_fetch_array($q1);
                                $q = "select * from register inner join add_profile on add_profile.reg_id=register.id where add_profile.reg_id=$id";
                                $res = mysql_query($q);
                                $row = mysql_fetch_array($res);
//                               
                                ?>
                                <img class="login-user" src="img/<?php echo $row["image"] ?>" height="40px" width="40px">
                                <span class="be-dropdown-content"><span style="font-size: 15px;"><b style="color: #204d74"><?php echo $row1["fname"] . ' ' . $row1["lname"] ?></b></span></span>                                                 <div class="drop-down-list a-list">
                                    <a href="myprofile.php?uid=<?php echo $row["reg_id"] ?>">My Porfile</a>

                                    <a href="friends.php">Friends</a>
                                    <a href="change_password.php">Change Password</a>
                                    <a href="logout.php">Logout</a>
                                </div>
                            </div>	


                        </div>	
                    </div>
                    <div class="header-menu-block">
                        <button class="cmn-toggle-switch cmn-toggle-switch__htx"><span></span></button>
                        <ul class="header-menu" id="one">
                            <li><a href="user_home.php">Home</a></li>
                            <li><a href="find_friends.php">Find Friends</a></li>
                            <li><a href="friend_request.php"><i class="glyphicon glyphicon-user"></i></a></li>

                            <div class="login-header-block">
                                <div class="login_block">

                                    <li><a class="messages-popup" href="blog-detail-2.html">
                                            <i class="glyphicon glyphicon-globe">3</i>
<!--                                            <img src="img/facebook-messenger.ico" width="16px" height="17px">4</i>-->

                                        </a></li>
                                    <div class="noto-popup messages-block">
                                        <div class="m-close"><i class="glyphicons glyphicons-message-empty"></i></div>
                                        <div class="noto-label">Your Messages <span class="noto-label-links"><a href="compose_messege.php">compose</a><a href="view_all_messages.php">View all messages</a></span></div>
                                        <div class="noto-body">
                                            <div class="noto-entry style-2">
                                                <div class="noto-content clearfix">
                                                    <div class="noto-img">	
                                                        <a href="blog-detail-2.html">
                                                            <img src="img/c1.png" alt="" class="be-ava-comment">
                                                        </a>
                                                    </div>
                                                    <div class="noto-text">
                                                        <div class="noto-text-top">
                                                            <span class="noto-name"><a href="blog-detail-2.html">Ravi Sah</a></span>
                                                            <span class="noto-date"><i class="fa fa-clock-o"></i> May 27, 2015</span>
                                                        </div>
                                                        <div class="noto-message">Sed velit mauris, pulvinar sit amet accumsan vitae, egestas, pulvinar sit amet accumsan vitae, egestas</div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>							
                                    </div>
                                </div></div>
                            <div class="login-header-block">
                                <div class="login_block">																	
                                    <a class="notofications-popup" href="blog-detail-2.html">
                                        <i class="glyphicon glyphicon-bell">4</i>


                                    </a>
<!--<img class="notofications-popup" src="messenger.png" height="20px" width="20px">    -->


<!--
                                    <div class="noto-popup notofications-block">
                                        <div class="m-close"></div>
                                        <div class="noto-label">Your Notification</div>
                                        <div class="noto-body">
                                            <div class="noto-entry">
                                                <div class="noto-content clearfix">
                                                    <div class="noto-img">	
                                                        <a href="blog-detail-2.html">
                                                            <img src="img/c1.png" alt="" class="be-ava-comment">
                                                        </a>
                                                    </div>
                                                    <div class="noto-text">
                                                        <div class="noto-text-top">
                                                            <span class="noto-name"><a href="blog-detail-2.html">Ravi Sah</a></span>
                                                            <span class="noto-date"><i class="fa fa-clock-o"></i> May 27, 2015</span>
                                                        </div>
                                                        <a href="blog-detail-2.html" class="noto-message">Start following your work</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>							
                                    </div>-->




                                </div>	
                            </div>


                        </ul>
                    </div>

                </div>
            </div>
        </header>	

        <!-- MAIN CONTENT -->
        <div id="content-block">

            <div class="container-fluid custom-container">
                <div class="row">
                    <div class="col-md-2 left-feild">
                        <form action="http://demo.nrgthemes.com/projects/nrgnetwork/" class="input-search">
                            <input type="text" required placeholder="Search For Your Friend">
                            <i class="fa fa-search"></i>
                            <input type="submit" value="">
                        </form>
                    </div>
                    <div class="col-md-10 ">
                        <div class="for-be-dropdowns">
                            <div class="be-drop-down">
                                <i class="icon-projects"></i>
                                <span class="be-dropdown-content">All Friends	</span>
                                <ul class="drop-down-list">
                                    <li class="filter" data-filter=".category-1"><a data-type="category-1">Projects</a></li>
                                    <li class="filter" data-filter=".category-2"><a data-type="category-2">Work in Progress</a></li>
                                    <li class="filter" data-filter=".category-3"><a data-type="category-3">People</a></li>
                                </ul>
                            </div>
                            <div class="be-drop-down">
                                <i class="icon-creative"></i>
                                <span class="be-dropdown-content">Find Friends
                                </span>
                                <ul class="drop-down-list">
                                    <li class="filter" data-filter=".category-4"><a>Item - 1</a></li>
                                    <li class="filter" data-filter=".category-5"><a>Item - 2</a></li>
                                    <li class="filter" data-filter=".category-1"><a>Item - 3</a></li>
                                </ul>
                            </div>
                            <div class="be-drop-down">
                                <i class="icon-features"></i>
                                <span class="be-dropdown-content">Friend Requests
                                </span>
                                <ul class="drop-down-list">
                                    <li class="filter" data-filter=".category-2"><a>Featured</a></li>
                                    <li class="filter" data-filter=".category-3"><a>Most Appreciated</a></li>
                                    <li class="filter" data-filter=".category-4"><a>Most Viewed</a></li>
                                    <li class="filter" data-filter=".category-5"><a>Most Discussed</a></li>
                                    <li class="filter" data-filter=".category-1"><a>Most Recent</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid custom-container">
                <div class="row">

                    <div class="col-md-10 col-md-push-2">
                        <div id="container-mix" class="be-user-wrapper row">
                            <div  class="mix category-4 custom-column-5">
                                <div class="be-user-block style-2">
                                    <a class="be-ava-user style-2" href="blog-detail-2.html">
                                        <img src="img/ava_2.jpg" alt=""> 
                                    </a>
                                    <div class="be-user-counter">
                                        <div class="c_number">17</div>
                                        <div class="c_text">Mutual Friends</div>
                                    </div>
                                    <a href="blog-detail-2.html" class="be-use-name">Daniel Ng</a>
                                    <p class="be-user-info">Singapore, Singapore</p>
                                    <div class="be-text-tags">							
                                        <a href="blog-detail-2.html">Graphic Design</a>,
                                        <a href="blog-detail-2.html">Branding,</a>
                                        <a href="blog-detail-2.html">Typography</a>
                                    </div>
                                    <div class="info-block">
                                        <span><i class="fa fa-thumbs-o-up"></i> 360</span>
                                        <span><i class="fa fa-eye"></i> 789</span>
                                    </div>
                                    <a class="btn color-1 size-2 hover-1">Friends</a>

                                </div>
                            </div>
                            <div class="mix category-3 custom-column-5">
                                <div class="be-user-block style-2">
                                    <a class="be-ava-user style-2" href="blog-detail-2.html">
                                        <img src="img/ava_3.jpg" alt=""> 
                                    </a>
                                    <div class="be-user-counter">
                                        <div class="c_number">34</div>
                                        <div class="c_text">Mutual Friends</div>
                                    </div>
                                    <a href="blog-detail-2.html" class="be-use-name">Louis Paquet</a>
                                    <p class="be-user-info">Singapore, Singapore</p>
                                    <div class="be-text-tags">
                                        <a href="blog-detail-2.html">Web Design</a>,
                                        <a href="blog-detail-2.html">Graphic Design</a>,
                                        <a href="blog-detail-2.html">Art Director</a>		
                                    </div>
                                    <div class="info-block">
                                        <span><i class="fa fa-thumbs-o-up"></i> 360</span>
                                        <span><i class="fa fa-eye"></i> 789</span>
                                    </div>
                                    <a class="btn color-1 size-2 hover-1">Friends</a>

                                </div>
                            </div>
                            <div class="mix category-2 custom-column-5">
                                <div class="be-user-block style-2">
                                    <a class="be-ava-user style-2" href="blog-detail-2.html">
                                        <img src="img/ava_4.jpg" alt=""> 
                                    </a>
                                    <div class="be-user-counter">
                                        <div class="c_number">42</div>
                                        <div class="c_text">Mutual Friends</div>
                                    </div>
                                    <a href="blog-detail-2.html" class="be-use-name">Phoenix, the Creative Studio</a>
                                    <p class="be-user-info">Montreal, Quebec, Canada</p>
                                    <div class="be-text-tags">
                                        <a href="blog-detail-2.html">Web Design</a>,
                                        <a href="blog-detail-2.html">Brandingn</a>,
                                        <a href="blog-detail-2.html">Graphic Designr</a>											
                                    </div>
                                    <div class="info-block">
                                        <span><i class="fa fa-thumbs-o-up"></i> 360</span>
                                        <span><i class="fa fa-eye"></i> 789</span>
                                    </div>
                                    <a class="btn color-1 size-2 hover-1">Friends</a>

                                </div>
                            </div>
                            <div class="mix category-1 custom-column-5">
                                <div class="be-user-block style-2">
                                    <a class="be-ava-user style-2" href="blog-detail-2.html">
                                        <img src="img/ava_5.jpg" alt=""> 
                                    </a>
                                    <div class="be-user-counter">
                                        <div class="c_number">21</div>
                                        <div class="c_text">Mutual Friends</div>
                                    </div>
                                    <a href="blog-detail-2.html" class="be-use-name">Cüneyt ŞEN</a>
                                    <p class="be-user-info">Istanbul, Turkey</p>
                                    <div class="be-text-tags">
                                        <a href="blog-detail-2.html">Web Design</a>,
                                        <a href="blog-detail-2.html">UI/UX</a>,
                                        <a href="blog-detail-2.html">Graphic Designr</a>
                                    </div>
                                    <div class="info-block">
                                        <span><i class="fa fa-thumbs-o-up"></i> 360</span>
                                        <span><i class="fa fa-eye"></i> 789</span>
                                    </div>
                                    <a class="btn color-1 size-2 hover-1">Friends</a>

                                </div>
                            </div>
                            <div class="mix category-6 custom-column-5">
                                <div class="be-user-block style-2">
                                    <a class="be-ava-user style-2" href="blog-detail-2.html">
                                        <img src="img/ava_6.jpg" alt=""> 
                                    </a>
                                    <div class="be-user-counter">
                                        <div class="c_number">19</div>
                                        <div class="c_text">Mutual Friends</div>
                                    </div>
                                    <a href="blog-detail-2.html" class="be-use-name">Christopher Nicola</a>
                                    <p class="be-user-info">Montreal, Quebec, Canada</p>
                                    <div class="be-text-tags">
                                        <a href="blog-detail-2.html">Web Design</a>,
                                        <a href="blog-detail-2.html">Brandingn</a>,
                                        <a href="blog-detail-2.html">Graphic Designr</a>
                                    </div>
                                    <div class="info-block">
                                        <span><i class="fa fa-thumbs-o-up"></i> 360</span>
                                        <span><i class="fa fa-eye"></i> 789</span>
                                    </div>
                                    <a class="btn color-1 size-2 hover-1">Friends</a>

                                </div>
                            </div>
                            <div class="mix category-5 custom-column-5">
                                <div class="be-user-block style-2">
                                    <a class="be-ava-user style-2" href="blog-detail-2.html">
                                        <img src="img/ava_7.jpg" alt=""> 
                                    </a>
                                    <div class="be-user-counter">
                                        <div class="c_number">9</div>
                                        <div class="c_text">Mutual Friends</div>
                                    </div>
                                    <a href="blog-detail-2.html" class="be-use-name">Maciej Mizer</a>
                                    <p class="be-user-info">Łódź, Poland</p>
                                    <div class="be-text-tags">
                                        <a href="blog-detail-2.html">Digital Art</a>,
                                        <a href="blog-detail-2.html">Illustration</a>,
                                        <a href="blog-detail-2.html">Web Design</a>		
                                    </div>
                                    <div class="info-block">
                                        <span><i class="fa fa-thumbs-o-up"></i> 360</span>
                                        <span><i class="fa fa-eye"></i> 789</span>
                                    </div>
                                    <a class="btn color-1 size-2 hover-1">Friends</a>

                                </div>
                            </div>
                            <div class="mix category-4 custom-column-5">
                                <div class="be-user-block style-2">
                                    <a class="be-ava-user style-2" href="blog-detail-2.html">
                                        <img src="img/ava_8.jpg" alt=""> 
                                    </a>
                                    <div class="be-user-counter">
                                        <div class="c_number">4</div>
                                        <div class="c_text">All Friends</div>
                                    </div>
                                    <a href="blog-detail-2.html" class="be-use-name">Tomasz Mazurczak</a>
                                    <p class="be-user-info">Opole, Poland</p>
                                    <div class="be-text-tags">
                                        <a href="blog-detail-2.html">Web Design</a>,
                                        <a href="blog-detail-2.html">UI/UX</a>,
                                        <a href="blog-detail-2.html">Graphic Design</a>
                                    </div>
                                    <div class="info-block">
                                        <span><i class="fa fa-thumbs-o-up"></i> 360</span>
                                        <span><i class="fa fa-eye"></i> 789</span>
                                    </div>
                                    <a class="btn color-1 size-2 hover-1">Friends</a>

                                </div>
                            </div>
                            <div class="mix category-3 custom-column-5">
                                <div class="be-user-block style-2">
                                    <a class="be-ava-user style-2" href="blog-detail-2.html">
                                        <img src="img/ava_9.jpg" alt=""> 
                                    </a>
                                    <div class="be-user-counter">
                                        <div class="c_number">2</div>
                                        <div class="c_text">Mutual Friends</div>
                                    </div>
                                    <a href="blog-detail-2.html" class="be-use-name">v-a studio</a>
                                    <p class="be-user-info">Lisbon, Portugal</p>
                                    <div class="be-text-tags">
                                        <a href="blog-detail-2.html">Graphic Design</a>,
                                        <a href="blog-detail-2.html">Editorial Design</a>,
                                        <a href="blog-detail-2.html">Web Design</a>		
                                    </div>
                                    <div class="info-block">
                                        <span><i class="fa fa-thumbs-o-up"></i> 360</span>
                                        <span><i class="fa fa-eye"></i> 789</span>
                                    </div>
                                    <a class="btn color-1 size-2 hover-1">Follow</a>

                                </div>
                            </div>
                            <div class="mix category-1 custom-column-5">
                                <div class="be-user-block style-2">
                                    <a class="be-ava-user style-2" href="blog-detail-2.html">
                                        <img src="img/ava_10.jpg" alt=""> 
                                    </a>
                                    <div class="be-user-counter">
                                        <div class="c_number">20</div>
                                        <div class="c_text">Mutual Friends</div>
                                    </div>
                                    <a href="blog-detail-2.html" class="be-use-name">Leigh Taylor</a>
                                    <p class="be-user-info">Barnsley, United Kingdom</p>
                                    <div class="be-text-tags">
                                        <a href="blog-detail-2.html">UI/UX</a>,
                                        <a href="blog-detail-2.html">Web Design</a>,
                                        <a href="blog-detail-2.html">Art Direction</a>
                                    </div>
                                    <div class="info-block">
                                        <span><i class="fa fa-thumbs-o-up"></i> 360</span>
                                        <span><i class="fa fa-eye"></i> 789</span>
                                    </div>
                                    <a class="btn color-1 size-2 hover-1">Friends</a>

                                </div>
                            </div>
                            <div class="mix category-2 custom-column-5">
                                <div class="be-user-block style-2">
                                    <a class="be-ava-user style-2" href="blog-detail-2.html">
                                        <img src="img/ava_11.jpg" alt=""> 
                                    </a>
                                    <div class="be-user-counter">
                                        <div class="c_number">22</div>
                                        <div class="c_text">Mutual Friends</div>
                                    </div>
                                    <a href="blog-detail-2.html" class="be-use-name">Hoang Nguyen</a>
                                    <p class="be-user-info">Ho Chi Minh City, Vietnam</p>
                                    <div class="be-text-tags">
                                        <a href="blog-detail-2.html">Interaction Design</a>,
                                        <a href="blog-detail-2.html">UI/UX</a>,
                                        <a href="blog-detail-2.html">Web Designn</a>	
                                    </div>
                                    <div class="info-block">
                                        <span><i class="fa fa-thumbs-o-up"></i> 360</span>
                                        <span><i class="fa fa-eye"></i> 789</span>
                                    </div>
                                    <a class="btn color-1 size-2 hover-1">Friends</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-md-pull-10 left-feild">
                        <div class="be-vidget">
                            <h3 class="letf-menu-article">
                                Popular Creative Filds
                            </h3>
                            <div class="creative_filds_block">
                                <div class="ul">
                                    <a  data-filter=".category-1" class="filter">Events</a>
                                    <a data-filter=".category-2" class="filter">Groups</a>
                                    <a data-filter=".category-3" class="filter">Pages</a>
                                    <a data-filter=".category-4" class="filter">Photos</a>
                                    <a data-filter=".category-5" class="filter">Friends List</a>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- THE FOOTER -->
        <footer>


            <footer>


                <div class="footer-bottom">
                    <div class="container-fluid custom-container">
                        <div class="col-md-12 footer-end clearfix">
                            <center><div class="">
                                    <span class="copy">College@  <span class="steelblue" style="font-size: 15px"><a href="http://www.adishankara.ac.in">ASI</a></span></span>
                                    <span class="created">Design by <span class="steelblue" style="font-size: 15px"><a href="http://www.adishankara.ac.in">CS Department</a></span></span>
                                </div></center>

                        </div>			
                    </div>
                </div>		
            </footer>	
        </footer>
        <div class="be-fixed-filter"></div>



        <div class="theme-config">
            <div class="main-color">
                <div class="title">Main Color:</div>
                <div class="colours-wrapper">
                    <div class="entry color1 m-color active" data-colour="style/stylesheet.css"></div>   
                    <div class="entry color3 m-color"  data-colour="style/style-green.css"></div>
                    <div class="entry color6 m-color"  data-colour="style/style-orange.css"></div>
                    <div class="entry color8 m-color"  data-colour="style/style-red.css"></div>  
                    <div class="title">Second Color:</div>  
                    <div class="entry s-color  active color10"  data-colour="style/stylesheet.css"></div>
                    <div class="entry s-color color11"  data-colour="style/style-oranges.css"></div> 
                    <div class="entry s-color color12"  data-colour="style/style-greens.css"></div>
                    <div class="entry s-color color13"  data-colour="style/style-reds.css"></div>

                </div>
            </div>
            <div class="open"><img src="img/icon-134.png" alt=""></div>
        </div>

        <!-- SCRIPTS	 -->
        <script src="script/jquery-2.1.4.min.js"></script>
        <script src="script/jquery-ui.min.js"></script>
        <script src="script/bootstrap.min.js"></script>		
        <script src="script/idangerous.swiper.min.js"></script>
        <script src="script/jquery.mixitup.js"></script>
        <script src="script/filters.js"></script>
        <script src="script/jquery.viewportchecker.min.js"></script>
        <script src="script/global.js"></script>	
    </body>

    <!-- Mirrored from demo.nrgthemes.com/projects/nrgnetwork/people.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Jan 2018 14:47:37 GMT -->
</html>