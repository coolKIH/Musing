<?php
if(!isset($_SESSION['user'])) {
    include($includesDir.'/header.html');
}else{
    include ($includesDir.'/header.loggedin.html');
}
?>