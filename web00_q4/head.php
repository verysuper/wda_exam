<?php
session_start();
include_once("web_list.php");
$link = mysqli_connect("localhost","root","","db00_q4");
mysqli_query($link,"set names utf8");
$tt = strtotime("+6hour");
$now_day = date("Y-m-d",$tt);
$jo_time = date("Y-m-d H:i:s",$tt);
$jo_no = date("YmdHis",$tt);

?>