<?php
session_start();
$link = mysqli_connect("localhost","root","","db00_q4");
mysqli_query($link,"set names utf8");
$no = $_GET["del"];

$sql ="delete from item_2 where i2_seq = '".$no."'";
mysqli_query($link,$sql);
header("location:/admin.php?do=admin&redo=th");
?>