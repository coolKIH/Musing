<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 16-10-6
 * Time: 下午8:52
 */
session_start();
if(isset($_POST["do_login"])) {
    require_once("mysqli_connect.php");
    $username = $_POST["username"];
    $password =$_POST["password"];
    $q = "SELECT user_name FROM Web_user WHERE user_name = '{$username}' AND user_pwd = PASSWORD('{$password}')";
    $r = mysqli_query($dbc, $q);
    if (mysqli_num_rows($r) > 0) {
        $_SESSION["user"]=$username;
        echo "success";
    } else {
        echo "failure";
    }
}
?>