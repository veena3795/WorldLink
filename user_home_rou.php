
<?php
mysql_connect("localhost", "root", "");
mysql_select_db('social_net_working_site');
session_start();
$id = $_SESSION["id"];
?>
<!DOCTYPE html>
<html>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
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
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="script/script.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script>
            function like()
            {
                var postid = document.getElementById('pid').value;
                var usrid = document.getElementById("usrid").value;
                $.get('ajax/likes.php', {pstid: postid, urid: usrid}, function (data)
                {
                    $('#like').html(data);
                });
            }
//            function add_post() {
//                var input = document.getElementById("file");
//                file = input.files[0];
//                if (file != undefined) {
//                    formData = new FormData();
//                    if (!file.type.match(/image.*/)) {
//                        formData.append("image", file);
//                    }
//
//                    alert(formData);
//                    var cmt = document.getElementById('comment').value;
//
//                    $.get('ajax/posts.php', {commnt: cmt}, function (data)
//                    {
//
//                        document.getElementById('cmt_post').value = data;
//
////                   $("#img").html(data);
//                    })
//                }
        </script>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

        <script type="text/javascript">
            function myFunction() {
                $.ajax({
                    url: "view_notification.php",
                    type: "POST",
                    processData: false,
                    success: function (data) {
                        $("#notification-count").remove();
                        $("#notification-latest").show();
                        $("#notification-latest").html(data);
                    },
                    error: function () {}
                });
            }

            $(document).ready(function () {
                $('body').click(function (e) {
                    if (e.target.id != 'images/notification-icon') {
                        $("#notification-latest").hide();
                    }
                });
            });
        </script>
        <script type="text/javascript">
            // Set up global variable
            var result;

            function showPosition() {
                // Store the element where the page displays the result
                result = document.getElementById("result");

                // If geolocation is available, try to get the visitor's position
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
                    result.innerHTML = "Getting the position information...";
                } else {
                    alert("Sorry, your browser does not support HTML5 geolocation.");
                }
            }
            ;

            // Define callback function for successful attempt
            function successCallback(position) {
                result.innerHTML = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
            }

            // Define callback function for failed attempt
            function errorCallback(error) {
                if (error.code == 1) {
                    result.innerHTML = "You've decided not to share your position, but it's OK. We won't ask you again.";
                } else if (error.code == 2) {
                    result.innerHTML = "The network is down or the positioning service can't be reached.";
                } else if (error.code == 3) {
                    result.innerHTML = "The attempt timed out before it could get the location data.";
                } else {
                    result.innerHTML = "Geolocation failed due to unknown error.";
                }
            }
        </script>
        <script type="text/javascript" src="jquery-ui.js"></script>
        <link rel="stylesheet" href="jquery-ui.css">
        <script
            src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
            integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
        crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(function ()
            {
                $("#name").autocomplete({
                    source: 'fetch.php'
                });
            });
        </script>
        
    </head>
    <body >
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $q = "delete from posts where pid=$id";
            mysql_query($q);
            echo "<script>window.location.href='user_home.php';alert('Your Status Deleted')</script>";
        } else {
            
        }
        $count = 0;

        $sql2 = "SELECT count(req_id) FROM friend_request WHERE frnd_id=$id and status = 'Request Send'";
        $result = mysql_query($sql2);
        $ro = mysql_fetch_array($result);
//        $count = mysql_num_rows($result);
        $count = $ro[0];

        $count1 = 0;
        $res = mysql_query("select count(cmt_id) from comments where uid={$_SESSION['id']} and status=1");
        $r = mysql_fetch_array($res);
        $count1 = $r[0];
        ?>

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
                                <span class="be-dropdown-content"><span style="font-size: 15px;"><b style="color: #204d74"><?php echo $row1["fname"] . ' ' . $row1["lname"] ?></b></span></span>                                <div class="drop-down-list a-list">
                                    <a href="myprofile.php?uid=<?php echo $row["reg_id"] ?>">My Porfile</a>

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
                            <li><a href="friend_request.php"><i class="glyphicon glyphicon-user" id="notification-count"><?php
                                        if ($count > 0) {
                                            echo $count;
                                        }
                                        ?></i></a></li>
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
                                        <i class="glyphicon glyphicon-bell" id="notification-count"><b><label><?php
                                                    if ($count1 > 0) {
                                                        echo $count1;
                                                    }
                                                    ?></label></b></i>
                                        <div id="notification-latest"></div>
                                    </a>
<!--<img class="notofications-popup" src="messenger.png" height="20px" width="20px">    -->
                                    <div class="noto-popup notofications-block" >
                                        <div class="m-close"></div>
                                        <div class="noto-label"  id="notification-latest" >Your Notification</div>
                                        "<div class='noto-body'>

                                        </div>							
                                    </div>
                                </div>	
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- MAIN CONTENT -->
        <div id="content-block">
            <div class="container-fluid cd-main-content custom-container" >
                <div class="row" >
                    <div class="col-md-2 left-feild" >
                        <form action="" class="input-search">
                            <input type="text" id="name" required="" placeholder="Search">
                            <i class="fa fa-search"></i>
                            <input type="submit" value="">
                        </form>				
                    </div>			
                </div>
            </div>		
            <div class="container-fluid custom-container">
                <div class="row">
                    <div class="col-md-3 left-feild">
                        <div class="be-vidget" style="position: fixed;">
                            <div class="be-drop-down">
                                <h3 class="letf-menu-article">
                                    <a href="myprofile.php?uid=<?php echo $row["reg_id"] ?>"><img class="login-user" src="img/<?php echo $row["image"] ?>" height="50px" width="50px">
<?php echo $row1["fname"] ?></a>
                                </h3>
                            </div>
                            <div class="creative_filds_block" >
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
                    <center><div class=" col-md-7">
                            <div id="result">
                              
                            </div>
                        
                            <div id="container-mix"  class="row _post-container_">
                                <div class="tab-wrapper style-1">
                                    <form action="" enctype="multipart/form-data" id="form" method="post" name="form">

                                        <!--                                        <div  class="nav-tab  clearfix">                      
                                                                                    <div class="nav-tab-item">
                                        
                                                                                        <li ><a href="#"><i class="fa fa-cloud-upload"></i></a><input class="file" type="file" name="file"/>Upload Images</li>
                                                                              
                                                                                    </div>
                                                                                </div><br><br>-->
                                        <div class="col-lg-7">
                                            <div class="">
                                                <textarea id="comment" name="comment" rows="4px" cols="2px" style="width: 540px;border-radius: 5px" placeholder="Writing Somethings Here....."></textarea>
                                                <!--                                                <div class="tab-nav-wrapper">
                                                                                                 
                                                                                                </div>-->
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="be-post">
                                                <div id="formdiv">
                                                    <div id="upload" style="">
                                                        <input id="file" name="file" type="file">
                                                    </div>
                                                </div>
                                                <div id="clear"></div>
                                                <div id="preview" style="height:180px; width:180px;text-align:center;margin:20px;display:none;">
                                                    <img id="previewimg" src="" style="height:140px;width:140px;float:left;padding:8px;border:1px solid #e4d3c3;margin-bottom:5px"><img id="deleteimg" src="abc.png"> 
                                                </div>

                                                <input type="submit" value="Post" style="background-color: #0097b9;float: left;color: white;width: 100px;margin-bottom: 30px" name="submit" onclick="add_post()"><br/><br>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-lg-7">
                                            <div class="be-post">
                                                <a href="share_loc.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-share"></span> Share Your Location
        </a>
<!--                                                <h3> <li><a href="" class="">Share Your Location</a>
                                                    </li></h3>-->
                                                
                                            </div>
                                        </div>
                                        
                                        <br/><br/>
                                        <?php
                                        if (isset($_POST["submit"])) {
                                            $stat = $_POST["comment"];
                                            $img = $_FILES["file"]["name"];
                                            $validextensions = array("jpeg", "jpg", "png");
                                            $temporary = explode(".", $_FILES["file"]["name"]);
                                            $file_extension = end($temporary);
                                            if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
                                                    ) && ($_FILES["file"]["size"] < 1700000)//Approx. 100kb files can be uploaded.
                                                    && in_array($file_extension, $validextensions)) {

                                                if ($_FILES["file"]["error"] > 0) {
                                                    echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
                                                } else {
                                                    move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
                                                }
                                            }
                                            mysql_query("insert into posts(user_id,comment,img_file,status) values('$id','$stat','$img','1')");
                                        }
                                        ?>
                                    </form>
                                    <?php
                                    $res = mysql_query("select * from  add_profile join posts on add_profile.reg_id=posts.user_id where user_id=$id or user_id in(select user_id from friend_request where frnd_id='$id') or user_id in(select frnd_id from friend_request where user_id='$id') order by pid desc");
//                                      $res = mysql_query("select * from posts where user_id=$id union select * from posts where user_id in(select user_id from friend_request where frnd_id=$id) union select * from posts where user_id in(select req_id from friend_request where user_id=$id)");
//                                    $res=  mysql_query("SELECT * FROM posts INNER JOIN friend_request ON friend_request.frnd_id = posts.user_id WHERE friend_request.user_id ={$_SESSION['id']} AND friend_request.status ='Friends'");
//                                    $res = mysql_query("select * from posts inner join friend_request inner join add_profile on posts.user_id=add_profile.reg_id and friend_request.user_id=posts.user_id and friend_request.user_id=add_profile.reg_id where friend_request.status='Friends' and friend_request.user_id=$id and posts.user_id=$id and posts.user_id=friend_request.user_id order by pid desc");
                                    while ($row1 = mysql_fetch_array($res)) {
                                        if ($row1["user_id"] == $_SESSION['id']) {
                                            ?>
                                            <br/><br/> <div class="col-lg-7">
                                                <div class="be-post">
                                                    <input type="hidden" id="usrid" name="usrid" value="<?php echo $row1["user_id"] ?>">
                                                    <input type="hidden" id="pid" name="pid" value="<?php echo $row1["pid"] ?>">
                                                    <div style="float: left">   <img class="login-user" src="img/<?php echo $row1["image"] ?>" height="40px" width="40px"> <b><a href="myprofile.php?uid=<?php echo $row1["user_id"] ?>"><?php echo $row1["fname"] . " " . $row1["lname"] ?></a></b> Updated his status...<?php // echo date("h:i:sa");                  ?></div><br/><br/><br>
                                                    <b style="float: left"><?php
                                                        echo $row1["comment"];
                                                        ?></b><br> <br> 
                                                    <?php
                                                    if ($row1["img_file"] == "") {
                                                        ?>
                                                        <a href="user_home.php" class="be-img-block" id="img">

                                                        </a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <a href="page3.html" class="be-img-block" id="img">
                                                            <img src="upload/<?php echo $row1["img_file"] ?>" alt="omg">
                                                        </a>
                                                        <?php
                                                    }
                                                    ?>
                                                    <br><br>
                                                    <div class="author-post">
                                                        <img src="img/a1.png" alt="" class="ava-author">
                                                        <span>by <a href="user_home.php">World Link</a></span>
                                                    </div>
                                                    <div class="info-block">
                                                        <span id="like"><i class="fa fa-thumbs-o-up" onclick="like()"></i></span>

                                                        <span><a href="comments.php?pid=<?php echo $row1["pid"] ?>"><i class="fa fa-comment-o"></i><?php
//                                                        $pid=$row1["pid"];
//                                                        $res=mysql_query("select count(cmt_id) from comments where post_id=$pid");
//                                                        $r=mysql_fetch_array($res);
//                                                        echo $r[0]
                                                                ?></a></span>
                                                        <span><a href="user_home.php?id=<?php echo $row1["pid"] ?>"><i class="glyphicon glyphicon-trash" style="color:darkgray"></i></a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="col-lg-7">
                                                <div class="be-post">
                                                    <input type="hidden" name="usrid" id="usrid" value="<?php echo $row1["user_id"] ?>">
                                                    <input type="hidden" id="pid" name="pid" value="<?php echo $row1["pid"] ?>">
                                                    <div style="float: left">   <img class="login-user" src="img/<?php echo $row1["image"] ?>" height="40px" width="40px"> <b><a href="myprofile.php?uid=<?php echo $row1["user_id"] ?>"><?php echo $row1["fname"] . " " . $row1["lname"] ?></a></b> Updated his status...<?php // echo date("h:i:sa");                ?></div><br/><br/><br>
                                                    <b style="float: left"><?php
                                                        echo $row1["comment"];
                                                        ?></b><br> <br> 
                                                    <?php
                                                    if ($row1["img_file"] == "") {
                                                        ?>
                                                        <a href="page3.html" class="be-img-block" id="img">

                                                        </a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <a href="page3.html" class="be-img-block" id="img">
                                                            <img src="upload/<?php echo $row1["img_file"] ?>" alt="omg">
                                                        </a>
                                                        <?php
                                                    }
                                                    ?>
                                                    <br><br>
                                                    <div class="author-post">
                                                        <img src="img/a1.png" alt="" class="ava-author">
                                                        <span>by <a href="user_home.php">World Link</a></span>
                                                    </div>
                                                    <div class="info-block">
                                                        <span id="like"><i class="fa fa-thumbs-o-up" onclick="like()"></i></span>
                                                        <span><a href="comments.php?pid=<?php echo $row1["pid"] ?>"><i class="fa fa-comment-o"></i><?php
//                                                        $pid=$row1["pid"];
//                                                        $res=mysql_query("select count(cmt_id) from comments where post_id=$pid");
//                                                        $r=mysql_fetch_array($res);
//                                                        echo $r[0]
                                                                ?></a></span>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div></center>
                    <div class="col-md-2 right-feild">
                        <div class="be-vidget" style="position:fixed">
                            <div class="be-drop-down">
                                <h4>Contacts</h4>
                            </div>
                            <?php
                            $q2 = "select * from friend_request inner join add_profile on add_profile.reg_id=friend_request.user_id  where friend_request.frnd_id=$id and friend_request.user_id!=$id and friend_request.status='Friends'";
                            $res2 = mysql_query($q2);
                            while ($row2 = mysql_fetch_array($res2)) {
                                ?>
                                <div>
                                    <h3 class="letf-menu-article">
                                        <img class="login-user" src="img/<?php echo $row2["image"] ?>" height="40px" width="40px">

                                        <a href="compose_messege.php" style="color:black"> <?php echo $row2["fname"] . ' ' . $row2["lname"] ?></a>
                                    </h3>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    <div class="entry s-color active color11"  data-colour="style/style-oranges.css"></div> 
                    <div class="entry s-color active color12"  data-colour="style/style-greens.css"></div>
                    <div class="entry s-color active color13"  data-colour="style/style-reds.css"></div>
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
        <script src="script/jquery.viewportchecker.min.js"></script>
        <script src="script/filters.js"></script>
        <script src="script/global.js"></script>
    </body>
</html>