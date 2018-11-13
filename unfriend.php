
<?php

session_start();
mysql_connect("localhost", "root", "");
mysql_select_db('social_net_working_site');
$id = $_GET["usid"];
$id1 = $_SESSION["id"];
$rid = $_GET["reqid"];
if (mysql_query("delete from friend_request where req_id=$id")) {
    echo "<script>window.location.href='find_friends.php';alert('Success')</script>";
}
?>
   