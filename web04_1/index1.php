<?php
        include_once '_config.php';
        
        if(isset($_SESSION['user'])){
                $gate="<a href='?do=login'>會員登入</a>";
        }else{
                $gate="<a href='logout.php'>登出</a>";
        }
        
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>┌精品電子商務網站」</title>
<link href="./assets/css.css" rel="stylesheet" type="text/css">
<script src="./assets/js.js"></script>
</head>

<body>
<iframe name="back" style="display:none;"></iframe>
	<div id="main">
    	<div id="top">
        	
                        <div>
                <a href="?"><img src="./assets/0416.jpg" width='268'></a>
                <a href="?">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a> |
                                <a href="?do=login">會員登入</a> |
                                <a href="?do=admin">管理登入</a>
           </div>
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
        <div id="right"><marquee behavior="" direction="">情人節特惠活動 &nbsp; 為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~        </marquee>
        	        </div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
        	頁尾版權 :        </div>
    </div>

</body></html>
