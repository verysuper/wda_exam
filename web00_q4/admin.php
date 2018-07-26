<?php
include_once("head.php");
$m = "admin";
if(!empty($_GET["redo"])){$m = $_GET["redo"];}
if(!empty($_SESSION["acc"])){
  $id = $_SESSION["acc"];
  $sql = "select * from admin_member where a_m_id ='".$id."'";
  $rr = mysqli_query($link,$sql);
  $rrr = mysqli_fetch_assoc($rr);

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0057)?do=admin -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>┌精品電子商務網站」</title>
<link href="./Manage Page_files/css.css" rel="stylesheet" type="text/css">
<script src="./Manage Page_files/js.js"></script>
</head>
<body>
<iframe name="back" style="display:none;"></iframe>
	<div id="main">
    	<div id="top">
        	<a href="?"><img src="./Manage Page_files/0416.jpg"></a><img src="./Manage Page_files/0417.jpg">
      </div>
        <div id="left" class="ct">
        	<div style="min-height:400px;">
            <?php if($_SESSION["acc"] =="admin"){?><a href="?do=admin&redo=admin">管理權限設置</a><?php }?>
            <?php if($rrr["a_m_1"] =="1"){?><a href="?do=admin&redo=th">商品分類與管理</a><?php }?>
            <?php if($rrr["a_m_2"] =="1"){?><a href="?do=admin&redo=order">訂單管理</a><?php }?>
            <?php if($rrr["a_m_3"] =="1"){?><a href="?do=admin&redo=mem">會員管理</a><?php }?>
            <?php if($rrr["a_m_4"] =="1"){?><a href="?do=admin&redo=bot">頁尾版權管理</a><?php }?>
            <?php if($rrr["a_m_5"] =="1"){?><a href="#">最新消息管理</a><?php }?>
            <a href="?do=admin&redo=logout" style="color:#f00;">登出<?=$_SESSION["acc"]?></a>
          </div>
        </div>
        <div id="right"><?php include_once($kfc[$m]);?></div>
        <div id="bottom" style="line-height:70px; color:#FFF; background:url(icon/bot.png);" class="ct">
        	頁尾版權 :<?php include_once("footer.php");?></div>
    </div>

</body></html>