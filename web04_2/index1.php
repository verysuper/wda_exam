<?php
    include_once '_config.php';
    if(isset($_SESSION['admin'])){
        $gateAdmin="<a href='admin.php'>後臺管理</a>";
    }else{
        $gateAdmin="<a href='admin.php'>管理登入</a>";
    }
    if(isset($_SESSION['user'])){
        $gateUser="<a href='user_logout.php'>登出</a>";
    }else{
        $gateUser="<a href='?do=user_login'>會員登入</a>";
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>┌精品電子商務網站」</title>
<link href="./assets/css.css" rel="stylesheet" type="text/css">
<script src="./assets/jquery-1.9.1.min.js"></script>
<script src="./assets/js.js"></script>
</head>

<body>
<iframe name="back" style="display:none;"></iframe>
	<div id="main">
    	<div id="top">

                        <div><!-- 取消 style="padding:10px;"-->
                        	<a href="?">
            	<img src="./assets/0416.jpg" width="560" height="100">
            </a>
                <a href="?">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=user_buycart">購物車</a> |
                                <?=$gateUser?> |
                                <?=$gateAdmin?>
           </div>
      </div>
        <div id="left" class="ct" style="overflow:auto; height:500px;">
        	<div style="min-height:400px;">
<?php
//itemAll
$allCount = $conn->query("select * from p_item where sell=1")->rowCount();
echo "<div class='ww'><a href='?'>全部商品({$allCount})</a></div>"; 
$cat = $conn->query("select * from p_cat")->fetchAll();
foreach ($cat as $row1) {
    if ($row1['parent'] == 0) {
        $sql="select * from p_item where sell=1 and c1={$row1['id']}";
        $c1Count = $conn->query($sql)->rowCount();
        echo "<div class='ww'><a href='?c1={$row1['id']}'>{$row1['name']}($c1Count)</a>";
foreach ($cat as $row2) {
            if ($row2['parent'] == $row1['id']) {
                $sql = "select * from p_item where sell=1 and c2={$row2['id']}";
                $c2Count = $conn->query($sql)->rowCount();
                echo "<div class='s'><a href='?c1={$row1['id']}&c2={$row2['id']}'>{$row2['name']}($c2Count)</a></div>";
            }
        }
         echo "</div>";
    }   
}
?>
        	            </div>
                        <span>
            	<div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                	00005                </div>
            </span>
                    </div>
        <div id="right"  style="overflow:auto; height:500px;">
            <marquee>情人節特惠活動 &nbsp; 為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~        </marquee>
<?php 
    if(!empty($_GET['do'])){
        include_once $_GET['do'].'.php';
    }else{
        include_once "item_list.php";
    }
?>
        </div>
        <div id="bottom" style="line-height: 70px; background: url(assets/bot.png); color: #FFF; clear: both;" class="ct">
        	頁尾版權 :  <?=$footer['text']?></div>
    </div>

</body></html>
