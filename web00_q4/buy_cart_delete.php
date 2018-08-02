<?php
session_start();
$dd = $_GET["del"];
$_SESSION["my_item"][$dd]=null;
$_SESSION["my_buy"][$dd]=null;
header("location:/?do=buycart");

?>