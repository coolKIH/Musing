<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 9/11/16
 * Time: 7:43 AM
 */
if(isset($_SESSION['user'])) {
    include("includes/makeComment.html");
}else{
    include ("includes/makeCommentDisabled.html");
}
?>
