<?php
if (isset($_POST['submit'])) {
$cart = $_POST['cart'];
$price = $_POST['price'];
setcookie("recent-bought", $cart, time() + (86400 * 30), "/");
setcookie("cart", "", time() - (86400 * 30), "/");
header("location:../index.php");
}

?>