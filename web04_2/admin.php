<?php
	include_once '_config.php';
	if(!isset($_SESSION['admin'])){
		header("location:index1.php?do=admin_login");
		exit();
	}else{
		$admin=$_SESSION['admin'];
		$sql="select * from admin where acc='{$admin}'";
		$row=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
		$permit=str_split($row['permit']);
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
            	<img src="./assets/0416.jpg"  width="560" height="100">
            </a>
                            <img src="./assets/0417.jpg" height="100">
                   </div>
        <div id="left" class="ct">
        	<div style="min-height:400px;">
        	            	<a href="?do=admin&redo=admin_root">管理權限設置</a>
												<?php if($permit[0]==1){?><a href="?do=admin&redo=admin_th1">商品分類與管理</a><?php }?>
												<?php if($permit[1]==1){?><a href="?do=admin&redo=order">訂單管理</a><?php }?>
												<?php if($permit[2]==1){?><a href="?do=admin&redo=mem">會員管理</a><?php }?>
												<?php if($permit[3]==1){?><a href="?do=admin&redo=admin_bot">頁尾版權管理</a><?php }?>
												<?php if($permit[4]==1){?><a href="?do=admin&redo=news">最新消息管理</a><?php }?>
            	        	<a href="?do=admin&redo=admin_logout" style="color:#f00;">登出</a>
                    </div>
                    </div>
        <div id="right">
					<?php
						if(!empty($_GET['redo'])){
							include_once $_GET['redo'].'.php';
						}else{
							include_once 'admin_root.php';
						}
					?>
        	        </div>
        <div id="bottom" style="line-height: 70px; color: #FFF; background: url(assets/bot.png); clear: both;" class="ct">
        	頁尾版權 :  <?=$footer['text']?></div>
    </div>

</body></html>
