<?php
  $conn=new PDO("mysql:host=localhost;dbname=wda_1_3;charset=UTF8","root","");
  date_default_timezone_set('Asia/Taipei');
  session_start();
//1
  $sql="SELECT * FROM titles WHERE display=1";
  $title=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC)[0];
//2
  $sql="SELECT * FROM `menus` WHERE display=1";
  $menus = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  $menuStr="";
  foreach($menus as $menu1){
    if($menu1['parent']=='0'){
      $menuStr.="<div class='mainmu'><a href='{$menu1['href']}'>{$menu1['menu']}</a>";
      foreach($menus as $menu2){
        if($menu2['parent']==$menu1['id']){
          $menuStr .= "<div class='mainmu2 mw' style='display:none;'><a href='{$menu2['href']}'>{$menu2['menu']}</a></div>";
        }
      }
      $menuStr.="</div>";
    }
  }
//3
  if(!isset($_SESSION['visitor'])){
    $sql="UPDATE totals SET total=total+1 WHERE id=1";
    $conn->query($sql);
    $_SESSION['visitor']=1;
  }
  $sql = "SELECT * FROM totals WHERE id=1";
  $total = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC)[0];
//4
  $sql = "SELECT * FROM bottoms WHERE id=1";
  $bottom = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC)[0];
//5
  if(!isset($_SESSION['admin'])){
    $login_text="管理登入";
    $login_url="login.php";
  }else{
    $login_text = "回後台管理";
    $login_url = "admin.php";
  }
//6
  $sql = "SELECT * FROM images WHERE display=1";
  $images = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  // print_r($images);
  $imgLen=count($images);
  $imgStr="<img src='assets/01E01.jpg' onclick='pp(1)'>";
  for($i=0;$i<$imgLen;$i++){
    $imgStr .= "<img src='imgs/{$images[$i]['image']}' style='width:200px;height:130px;' class='im' id='ssaa{$i}'>";    
  }
  $imgStr .= "<img src='assets/01E02.jpg' onclick='pp(2)'>";
//7
  $abStr="";
  $sql = "SELECT * FROM ads WHERE display=1";
  $ads = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  foreach($ads as $arr){
    $abStr.=$arr['ad'].",　";
  }

?>

