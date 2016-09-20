<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 9/11/16
 * Time: 10:46 AM
 */
function absolute_url($page='index.php')
{
    $url= 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
    $url=rtrim($url,'/\\');
    $url .= '/' . $page;
    return $url;
}
?>