<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 9/9/16
 * Time: 7:16 PM
 */

$pageTitle = 'Musing - Sharing your favorite music with the world';
$includesDir = "includes";
session_start();
if(isset($_GET['opr'])&&$_GET['opr']=='logout'){
    unset($_SESSION['user']);
}
if(isset($_GET['opr'])&&$_GET['opr']=='login'){
    $_SESSION['user']='小明';
}
include("includes/headerChooser.php");
require_once('classes/Post.php');
require_once($includesDir . '/mysqli_connect.php');

$thisPostId=$_GET["id"];
if(!isset($thisPostId))$thisPostId=$_POST["id"];
if(!isset($thisPostId)){
    $q = "select * from Post";
    $r = mysqli_query($dbc, $q);
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $post = new Post($dbc, $row["p_id"]);
        $post->displayTitle();
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
    echo '<div class="postMainArea">';
    $thisPost->displayTitleNDetail();
    include ("includes/makeCommentAreaChooser.php");
    echo '</div>';
    $thisPost->displayAllDiscuss();
}

include ('includes/footer.html');
?>