<?php
include_once("head.php");
$m = "main";
if(!empty($_GET["do"])){$m = $_GET["do"];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>┌精品電子商務網站」</title>
<link href="./home_files/css.css" rel="stylesheet" type="text/css">
<script src="./home_files/js.js"></script>
</head>

<body>
<iframe name="back" style="display:none;"></iframe>
	<div id="main">
    	<div id="top">
        	<a href="?">
            	<img src="./home_files/0416.jpg" width="540">
          </a>
          <span style="padding:10px;">
            <a href="?">回首頁</a> | 
            <a href="?do=news">最新消息</a> | 
            <a href="?do=look">購物流程</a> | 
            <a href="?do=buycart">購物車</a> | 
            <a href="?do=login">會員登入<?php if(!empty($_SESSION["mem"])){ echo $_SESSION["mem"];}?></a> | 
            <a href="?do=admin">管理登入</a>
          </span>
          <div style="padding:10px;"></div>
        </div>
        <div id="left" class="ct">
        	<div style="min-height:400px;">
        	            </div>
                        <span>
            	<div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                	00005                </div>
            </span>
                    </div>
        <div id="right">
        
        <marquee scrolldelay="120" direction="left" style="width:100%; height:23px;">年終特賣會開跑了　　　　情人節特惠活動</marquee><br>
        <?php include_once($web_list[$m]);?>
        </div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
        	頁尾版權 :<?php include_once("footer.php");?></div>
    </div>

</body></html>