<?php
session_start();
$link = mysqli_connect("localhost","root","","db00_q4");
mysqli_query($link,"set names utf8");
$no = $_POST["i1"];
$con = $_POST["ii"];

$sql ="update item_1 set i1_name = '".$con."' where i1_seq = '".$no."'";
mysqli_query($link,$sql);

?>