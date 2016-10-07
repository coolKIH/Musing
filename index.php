<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 9/9/16
 * Time: 7:16 PM
 */

$pageTitle = 'Musing - Sharing your favorite music with the world';
session_start();
if(isset($_GET['opr'])&&$_GET['opr']=='logout'){
    unset($_SESSION['user']);
}
include("includes/headerChooser.php");

if(isset($_GET['opr'])&&$_GET['opr']=='login'){
    include ("includes/login.html");
    include ('includes/footer.html');
    exit();
}
if(isset($_GET['opr'])&&$_GET['opr']=='register'){
    include ("includes/register.html");
    include ('includes/footer.html');
    exit();
}
require_once('classes/Post.php');
require_once('includes/mysqli_connect.php');

$thisPostId=$_GET["id"];
if(!isset($thisPostId))$thisPostId=$_POST["id"];
if(!isset($thisPostId)){
    $q = "select * from Post ORDER BY p_id DESC ";
    $r = mysqli_query($dbc, $q);
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $post = new Post($dbc, $row["p_id"]);
        $post->displayTitleNDetailForPreview();
    }
}else{
    $thisPost = new Post($dbc,$thisPostId);
    $thisPostTitle=$thisPost->getTitle();
    $pageTitle=$thisPostTitle;
    $newContent=$_POST['commentContent'];
    if(isset($newContent)){
        $writer=$_SESSION['user'];
        $thisPost->addNewDiscuss($newContent,$writer);
    }
    $thisPost->displayTitleNDetail();
    include ("includes/makeCommentAreaChooser.php");
    $thisPost->displayAllDiscuss();
}

include ('includes/footer.html');
?>