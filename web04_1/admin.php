<?php
	include_once '_config.php';	
	if (!isset($_SESSION['admin'])) {
		?><script>document.location.href='index1.php'</script><?php
	} else {
		$admin=$_SESSION['admin'];
		$sql="select * from admin where acc='{$admin}'";
		$row=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);		
		$menu=str_split($row['permit']);
		//print_r($menu);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0057)?do=admin -->
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
        	<a href="index1.php">
            	<img src="./assets/0416.jpg"  height='90'>
            </a>
                            <img src="./assets/0417.jpg" height='90'>
                   </div>
        <div id="left" class="ct">
        	<div style="min-height:400px;">
												<?php //if($admin=='admin'){?><a href="?do=admin&redo=list">管理權限設置</a><?php //}?><!-- 題目並沒說要關閉 -->
												<?php if($menu[0]==1){?><a href="?do=admin&redo=th1">商品分類與管理</a><?php }?>
												<?php if($menu[1]==1){?><a href="?do=admin&redo=order">訂單管理</a><?php }?>
												<?php if($menu[2]==1){?><a href="?do=admin&redo=mem">會員管理</a><?php }?>
												<?php if($menu[3]==1){?><a href="?do=admin&redo=bot">頁尾版權管理</a><?php }?>
												<?php if($menu[4]==1){?><a href="?do=admin&redo=news1">最新消息管理</a><?php }?>
            	        	<a href="?do=admin&redo=logout" style="color:#f00;">登出</a>
                    </div>
                    </div>
        <div id="right" style="overflow:auto; height:500px;"><!--修改過-->
				<?php include_once "admin_".$_GET["redo"].".php";?>
        	        </div>
        <div id="bottom" style="line-height:70px; color:#FFF; background:url(icon/bot.png);" class="ct">
        	頁尾版權 :        </div>
    </div>

</body></html>

