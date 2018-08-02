<?php
session_start();

$_SESSION["my_item"][] =$_POST["my_item"];
$_SESSION["my_buy"][] =$_POST["my_buy"];

if(empty($_SESSION["mem"])){
  header("location:/?do=login");
}else{
  header("location:/?do=buycart");
}

?>