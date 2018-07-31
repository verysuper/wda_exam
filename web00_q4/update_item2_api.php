<?php
session_start();
$link = mysqli_connect("localhost","root","","db00_q4");
mysqli_query($link,"set names utf8");
$no = $_POST["i1"];
$con = $_POST["ii"];

$sql ="update item_2 set i2_name = '".$con."' where i2_seq = '".$no."'";
mysqli_query($link,$sql);
?>