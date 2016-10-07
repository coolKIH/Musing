<?php
if(!isset($_SESSION['user'])) {
    include('includes/header.html');
}else{
    include ('includes/header.loggedin.html');
}
?>