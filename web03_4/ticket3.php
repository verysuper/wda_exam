<?php
  include_once '_config.php';
  if(isset($_POST['chkout'])){
    foreach($_POST as $key => $value){
      $$key = $value;
    }
    $sql="select * from ticket where mdate='{$mdate}' and mid='{$mid}'";
    $cnt=$conn->query($sql)->rowCount();
    $no=date('Ymd',strtotime($mdate)).str_pad($cnt+1,4,'0',STR_PAD_LEFT);
    foreach($chair as $num){
      $sql="insert into ticket value(null,'{$no}','{$mid}','{$mname}','{$mdate}','{$msess}','{$num}')";
      $conn->query($sql);
    }
  }
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
  <div id="top2"> <a href="index1.php">首頁</a> <a href="ticket1.php">線上訂票</a> <a href="#">會員系統</a> <a href="admin.php">管理系統</a> </div>
  <div id="text"> <span class="ct">最新活動</span>
    <marquee direction="right">
    ABC影城票價全面八折優惠1個月
    </marquee>
  </div>
  <div id="mm">
    <table width="80%" border="1" align="center">
  <tr>
    <td colspan="2">感謝你的訂購,你的訂單編號是:<?=$no?></td>
    </tr>
  <tr>
    <td>電影名稱:</td>
    <td><?=$mname?></td>
  </tr>
  <tr>
    <td>日期:</td>
    <td><?=$mdate?></td>
  </tr>
  <tr>
    <td>場次時間:</td>
    <td><?=$msess?></td>
  </tr>
  <tr>
    <td colspan="2"><p>座位:</p>
    <?php
      $c=0;
      foreach($chair as $num){
        echo "{$num[0]}排{$num[1]}號<br>";
        $c++;
      }
    ?>
      <p>共<?=$c?>張票</p></td>
    </tr>
  <tr>
    <td colspan="2" align="center">
      <a href="index1.php"><input type="button" value="確認" /></a>
    </td>
    </tr>
</table>

  </div>
  <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
</div>
</body>
</html>

