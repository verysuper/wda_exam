﻿<?php
  include_once '_config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0047)? -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>影城</title>
<link rel="stylesheet" href="css/css.css">
<link href="css/s2.css" rel="stylesheet" type="text/css">
<script src="scripts/jquery-1.9.1.min.js"></script>
</head>

<body>
<div id="main">
  <div id="top" class="ct" style=" background:#999 center; background-size:cover; " title="替代文字">
    <h1>ABC影城</h1>
  </div>
  <div id="top2"> <a href="03P01.htm">首頁</a> <a href="03P02.htm">線上訂票</a> <a href="#">會員系統</a> <a href="03P03.htm">管理系統</a> </div>
  <div id="text"> <span class="ct">最新活動</span>
    <marquee direction="right">
    ABC影城票價全面八折優惠1個月
    </marquee>
  </div>
  <div id="mm">
    <div class="half" style="vertical-align:top;">預告片介紹
      <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
<?php
  include_once "index_rr.php";
?>
        </div>
      </div>
    </div>
    <div class="half">>院線片清單
      <div class="rb tab" style="width:95%;">
<?php
  include_once "index_vv.php";
?>
      </div>
    </div>
  </div>
  <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
</div>
</body>
</html>