<?php
session_start();
include_once("web_list.php");
$link = mysqli_connect("localhost","root","","db00_q4");
mysqli_query($link,"set names utf8");
$tt = strtotime("+6hour");
$now_day = date("Y-m-d",$tt);
?>