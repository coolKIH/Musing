<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 9/13/16
 * Time: 7:57 AM
 */
$pageTitle = 'Musing - Post your sharing';
$includesDir = "includes";
session_start();

include ("includes/headerChooser.php");
if(!isset($_SESSION['user'])){
    require_once ("includes/tools.php");
    echo '<p class="redirectIndicator">Please log in. Redirecting to login page in <span id="counter">3</span> seconds</p>
    <script src="includes/js/redirecting.js" type="text/javascript"></script> ';
    //Header("Refresh:2;url=".absolute_url());
    exit();
}

if(isset($_POST['submit'])){
    $title=$_POST['newPostTitle'];
    $content=$_POST['newPostContent'];
    require_once ("classes/Post.php");
    require_once ("includes/mysqli_connect.php");
    Post::setDbc($dbc);
    if(($pid=Post::generateNewOne($title,$content,$_SESSION['user']))>0){
        echo '<script type="text/javascript">location.href="index.php?id='.$pid.'"</script>';
        //require_once ("includes/tools.php");
        //$url=absolute_url()."?id=".$pid;
        //echo $url;
        //Header("Location:$url");
        exit();
    }
}

include ("includes/newPost.html");
include ("includes/footer.html");
?>