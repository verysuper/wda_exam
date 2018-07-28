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
<script src="./assets/jquery-1.9.1.min.js"></script>
<script src="./assets/js.js"></script>
</head>

<body>
<iframe name="back" style="display:none;"></iframe>
	<div id="main">
    	<div id="top">
        	
                        <div>
                <a href="?"><img src="./assets/0416.jpg" height='90'></a>
                <a href="?">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a> |
                                <a href="?do=login">會員登入</a> |
                                <a href="?do=adminlogin">管理登入</a>
           </div>
                </div>
        <div id="left" class="ct">
        	<div style="min-height:400px;">
                        <!-- menu -->
<?php
        //all
        $allCount=$conn->query("select * from p_item")->rowCount();
        echo '<div class="ww"><a href="?">全部商品('.$allCount.')</a></div>';
        //cat(array) us mapping name
        $result=$conn->query("select * from p_cat");
        $cat=$result->fetchAll();
        //categore1
        $c1=$conn->query("select c1,count(*) as cc1 from p_item group by c1");
        while($row1=$c1->fetch(PDO::FETCH_ASSOC)){
                //note:$cat[id-1=index]['name']
                echo '<div class="ww"><a href="?c1='.$row1['c1'].'">'.
                        $cat[$row1['c1']-1]['name'].'('.$row1['cc1'].')</a>';
                //categore2
                $sql="select c2,count(*) as cc2 from p_item where c1={$row1['c1']} group by c2";
                $c2=$conn->query($sql);
                while($row2=$c2->fetch(PDO::FETCH_ASSOC)){
                        echo '<div class="s"><a href="?c1='.$row1['c1'].'&c2='.$row2['c2'].'">'.
                                $cat[$row2['c2']-1]['name'].'('.$row2['cc2'].')</a></div>';
                }
                echo '</div>';
        }        
?>
        	            </div>
                        <span>
            	<div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                	00005                </div>
            </span>
                    </div>
        <div id="right" style="overflow:auto; height:500px;">
                <marquee behavior="" direction="">情人節特惠活動 &nbsp; 為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~        </marquee>
                <!-- content -->
        <?php
		// c是顯示的商品分類，i是商品id (點商品圖片要顯示商品詳細資料)
                if(empty($_GET) || !empty($_GET["c1"]))// || !empty($_GET["i"])) TTTTTMMMMMMMMMMDDDDDDDDDD
                	include "item_list.php";
		elseif(!empty($_GET["do"]))
		{
			// look是購物流程說明，只有一張圖，直接echo就好
                        if($_GET["do"] == "look")	
                                echo "<img src='assets/0401.jpg'>";
                        else	
                                include $_GET["do"].".php";
		}
	?>
        	        </div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
        	頁尾版權 :  <?=$footer?>      </div>
    </div>

</body></html>

