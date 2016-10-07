<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 16-10-6
 * Time: 下午10:43
 */
if(isset($_POST["do_register"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];
    $q = "INSERT INTO Web_user VALUES ('{$username}', PASSWORD('{$password}'),'{$email}','{$gender}')";
    require_once ("mysqli_connect.php");
    $r = mysqli_query($dbc,$q);
    $feedback = array("result"=>"error");
    if(mysqli_affected_rows($dbc)> 0){
        $feedback["result"]="success";
    }
    echo json_encode($feedback);
}
?>