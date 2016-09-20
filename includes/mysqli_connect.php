<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 9/9/16
 * Time: 7:04 PM
 */
DEFINE ('DB_USER','yourusername');
DEFINE ('DB_PWD','youruserpassword');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','WebDb');

$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME) OR die('Could not connect to MYSQL:'.mysqli_connect_error());
mysqli_query($dbc,'set names utf8');
?>
