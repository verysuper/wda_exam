<?php
  $conn=new PDO("mysql:host=127.0.0.1;dbname=wda_1_4;charset=UTF8;","root","");
  date_default_timezone_set("Asia/Taipei");
  session_start();

<<<<<<< HEAD
$sql="SELECT * FROM `title` where display=1";
$result=$conn->query($sql);
while($row=$result->fetch(PDO::FETCH_ASSOC)){
  $title=$row['name'];
}

// $menu="";
// $sql="SELECT * FROM `menu` where parent='0' and display=1";
// $result=$conn->query($sql);
// while($row=$result->fetch(PDO::FETCH_ASSOC)){
  
// }
=======
  $sql="SELECT * FROM `title` where display=1";
  $result=$conn->query($sql);
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    $title=$row['name'];
  }
>>>>>>> 75f5f45fd2dda96e7243b39b84c0803d805da648

  $menu="";
  $sql1="SELECT * FROM `menu` where parent='0' and display=1";
  $result1=$conn->query($sql1);
  while($row1=$result1->fetch(PDO::FETCH_ASSOC)){
    $menu.="<div class='mainmu'><a href='{$row1['href']}'>{$row1['name']}</a>";
    $sql2="SELECT * FROM `menu` where parent='{$row1['id']}' and display=1";
    $result2=$conn->query($sql2);
    while($row2=$result2->fetch(PDO::FETCH_ASSOC)){
       $menu.="<div class='mainmu2 mw' style='display:none'><a href='{$row2['href']}'>{$row2['name']}</a></div>";
    }
    $menu.="</div>";
  }

  if(!isset($_SESSION['visit'])){
    $sql="UPDATE `total` SET `total`=total+1 WHERE `id`='1'";
    $conn->query($sql);
    $_SESSION['visit']='visit';
  }
  $sql="SELECT * FROM `total` ";
  $result=$conn->query($sql);
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    $total=$row['total'];
  }

  $sql="SELECT * FROM `bottom` ";
  $result=$conn->query($sql);
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    $bottom=$row['bottom'];
  }

  $ad="";
  $sql="SELECT * FROM `ad` where display=1 ";
  $result=$conn->query($sql);
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    $ad.=$row['name'].", ";
  }

  if(!isset($_SESSION['acc'])){
    $login_url="login.php";
    $login_text="管理登入";
  }else{
    $login_url="admin.php";
    $login_text="回後台管理";
  }

  $image="";
  $sql="SELECT * FROM `image` where display=1";
  $imgArr=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);  
  $end=count($imgArr);
  for($i=0;$i<$end;$i++){
    $image.="<img src='imgs/{$imgArr[$i]['name']}' style='width:150px; height:103px;' class='im' id='ssaa{$i}'>";
  }

  $mvim="";
  $sql="SELECT * FROM `mvim` where display=1";
  $result=$conn->query($sql);
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    $mvim.= "'imgs/{$row['name']}',";
  }

  $news="";
  $sql="SELECT * FROM `news` where display=1";
  $newsArr=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  $start=0;
  $end=count($newsArr);
  for($i=$start;$i<$start+5;$i++){
    $news.="<li>".mb_substr($newsArr[$i]['name'],0,10)."... <div class='all' style='display:none;'>{$newsArr[$i]['name']}</div></li>";
  }
?>
<!-- <li>123 <div class='all' style='display:none;'>123</div></li> -->
