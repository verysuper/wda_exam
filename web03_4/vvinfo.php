<?php
  include_once '_config.php';
  if(!empty($_GET['id'])){
    $sql="SELECT * FROM vv WHERE id='{$_GET['id']}'";
    $row=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0063)?do=viewmore&id=4 -->
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
  <div id="top" style=" background:#999 center; background-size:cover; " title="替代文字">
    <h1>ABC影城</h1>
  </div>
  <div id="top2">
    <a href="index1.php">首頁</a>
    <a href="ticket1.php">線上訂票</a>
    <a href="#">會員系統</a>
    <a href="admin.php">管理系統</a>
  </div>
  <div id="text"> <span class="ct">最新活動</span>
    <marquee direction="right">
    ABC影城票價全面八折優惠1個月
    </marquee>
  </div>
  <div id="mm">
    <div class="tab rb" style="width:87%;">
      <div style="background:#FFF; width:100%; color:#333; text-align:left">
        <embed src="imgs/<?=$row['video']?>" width="300px" height="250px" controls="" style="float:right;"></embed>
        <font style="font-size:24px"> <img src="imgs/<?=$row['pic']?>" width="200px" height="250px" style="margin:10px; float:left">
        <p style="margin:3px">影片名稱 ：<?=$row['name']?>
          <a href="ticket1.php?id=<?=$row['id']?>"><input type="button" value="線上訂票" style="margin-left:50px; padding:2px 4px" class="b2_btu"></a>
        </p>
        <p style="margin:3px">影片分級 ： <img src="assets/03C0<?=$row['lv']?>.png" style="display:inline-block;"></p>
        <p style="margin:3px">影片片長 ： <?=$row['length']?></p>
        <p style="margin:3px">上映日期 ： <?=$row['ondate']?></p>
        <p style="margin:3px">發行商 ： <?=$row['supplier']?></p>
        <p style="margin:3px">導演 ： <?=$row['director']?></p>
        <br>
        <br>
        <p style="margin:10px 3px 3px 3px; word-break:break-all"> 劇情簡介：<br><?=$row['info']?>
        </p>
        </font>
        <table width="100%" border="0">
          <tbody>
            <tr>
              <td align="center">
                <a href="index1.php"><input type="button" value="院線片清單"></a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
</div>
</body>
</html>
