<?php
$id = $_GET['id'];
$back=$_GET['back'];
$cookie_name = 'cart';
if (isset($_COOKIE[$cookie_name])) {
    setcookie($cookie_name, $_COOKIE[$cookie_name].",".$id, time() + (86400 * 30), "/");
    } else {
    setcookie($cookie_name, $id, time() + (86400 * 30), "/");
    }
    header("location:".$back);
?>
