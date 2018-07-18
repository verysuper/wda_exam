<?php
include_once '_config.php';
$currTime = date("m 月 d 號 l", strtotime('now'));

$result = $conn->query("select sum(count) as count from visit");
$visTotal = $result->fetch()['count'];
$result = $conn->query("select count from visit where time = {$today}");
$visToday = $result->fetch()['count'];

// $_SESSION["acc"]='aaaaa'; //test
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>健康促進網</title>
<link href="./home_files/css.css" rel="stylesheet" type="text/css">
<script src="./home_files/jquery-1.9.1.min.js"></script>
<script src="./home_files/js.js"></script>
</head>

<body>
<div id="alerr" style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;">
	<pre id="ssaa"></pre>
</div>
<iframe name="back" style="display:none;"></iframe>
	<div id="all">
    	<div id="title" width="80%">
        <?=$currTime?> | 今日瀏覽: <?=$visToday?> | 累積瀏覽: <?=$visTotal?>
		<a href="index1.php" style="float:right">回首頁</a></div>
		<div id="title2">
			<img src="./home_files/02B01.jpg" width="100%" height="100%" alt="健康促進網 - 回首頁" title="健康促進網 - 回首頁">
        </div>
        <div id="mm">
<div class="hal" id="lef">
	<?php
// 這邊以GET do判斷網頁內容區的顯示內容
// 如果是顯示管理頁面的話，側邊選單顯示管理員選單
// 管理員選單頁面版型沒有提供，所以我複製版型提供的選單
// 改字後在每個do變數前面加個a，代表是管理員頁面
if (!empty($_GET["do"]) && (
    ($_GET["do"] == "admin") || ($_GET["do"] == "aacc") || ($_GET["do"] == "apo") || ($_GET["do"] == "anews") || ($_GET["do"] == "aknow") || ($_GET["do"] == "aque"))) {
    ?>
			<a class="blo" href="?do=aacc">帳號管理</a>
			<a class="blo" href="?do=apo">分類網誌</a>
			<a class="blo" href="?do=anews">最新文章管理</a>
			<a class="blo" href="?do=aknow">講座管理</a>
			<a class="blo" href="?do=aque">問卷管理</a>
			<?php
}
// 如果是顯示一般頁面的話，側邊選單顯示一般選單
else {
    ?>
			<a class="blo" href="?do=po">分類網誌</a>
			<a class="blo" href="?do=news">最新文章</a>
			<a class="blo" href="?do=pop">人氣文章</a>
			<a class="blo" href="?do=know">講座訊息</a>
			<a class="blo" href="?do=que">問卷調查</a>
			<?php
}
?>
 </div>
            <div class="hal" id="main">
            	<div>
<marquee width="82%">請民眾踴躍投稿電子報，讓電子報成為大家相互交流、分享的園地！詳見最新文章</marquee>
 		<span style="width:18%; display:inline-block; float:right">
			<?php
				// 這邊以session acc代表登入帳號
				// 下一步做登入登出時會用
				// 如果沒有session，顯示會員登入，按下去後網頁內容區顯示登入表單
				if(empty($_SESSION["acc"]))
				{
					?>
					<a href="?do=login">會員登入</a>
					<?php
				}
				// 如果有session，顯示會員帳號和登出按鈕
				// 如果是管理員，顯示管理按鈕
				// 
				else 
				{
					echo "歡迎，".$_SESSION["acc"]."<a href='?do=logout'>登出</a>";
					if($_SESSION["acc"] == "admin" )	echo "<a href='?do=admin'>管理</a>";
				}
			?>
		</span>
<div class="">
			<?php
				// 如果沒有get變數，顯示首頁
				// 首頁標籤頁接下來會用DreamWeaver做，不需要php，html就好
				if(!$_GET)
				{
					include "frame.html";
				}
				// 如果GET變數是login，顯示登入
				// 以下類推
				// logout之後打在auth.php
				elseif($_GET["do"] == "login")
				{
					include "login.php";
				}
				elseif($_GET["do"] == "forget")
				{
					include "forget.php";
				}
				elseif($_GET["do"] == "reg")
				{
					include "reg.php";
				}
				elseif($_GET["do"] == "po")
				{
					include "po.php";
				}
				elseif($_GET["do"] == "pop")
				{
					include "pop.php";
				}
				elseif($_GET["do"] == "news")
				{
					include "news.php";
				}
				elseif($_GET["do"] == "que")
				{
					include "que.php";
				}
				// 管理員首頁只有一句話，不需要再另開一個檔案，直接echo就好
				elseif($_GET["do"] == "admin")
				{
					echo "請選擇管理項目";
				}
				elseif($_GET["do"] == "aacc")
				{
					include "aacc.php";
				}
				elseif($_GET["do"] == "anews")
				{
					include "anews.php";
				}
				elseif($_GET["do"] == "aque")
				{
					include "aque.php";
				}
			?>
		</div>
                </div>
            </div>
        </div>
        <div id="bottom">
    	    本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2018健康促進網社群平台 All Right Reserved
    		 <br>服務信箱：health@test.labor.gov.tw<img src="./home_files/02B02.jpg" width="45">
        </div>
    </div>

</body></html>
