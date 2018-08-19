<?php
  $conn=new PDO("mysql:host=localhost;dbname=wda_1_2;charset=UTF8;","root","");
  date_default_timezone_set("Asia/Taipei");
  session_start();

  //1.title
  $sql="SELECT * FROM titles WHERE display=1";
  $title=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);

  //2.menu
  $menu="";
  $sql="SELECT * FROM menus WHERE display=1";
  $menArr=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  foreach($menArr as $arr1){
    if($arr1['parent']==0){
      $menu .="<div class='mainmu'><a href='{$arr1['href']}'>{$arr1['menu']}</a>";
      foreach($menArr as $arr2){
        if($arr2['parent']==$arr1['id']){
          $menu .="<div class='mainmu2 mw' style='display:none;'><a href='{$arr2['href']}'>{$arr2['menu']}</a></div>";
        }
      }      
      $menu .="</div>";
    }
  }

  //3.totals
  if(!isset($_SESSION['visitor'])){
    $sql="UPDATE totals SET total=total+1 WHERE id=1";
    $conn->query($sql);
    $_SESSION['visitor']=1;
  }
  $sql="SELECT * FROM totals WHERE id=1";
  $total=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);

  //4.bottoms
  $sql="SELECT * FROM bottoms WHERE id=1";
  $bottom=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);

  //5.ads
  $adStr="";
  $sql="SELECT * FROM ads WHERE display=1";
  $adArr=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  foreach($adArr as $ad){
    $adStr .=$ad['ad'].', ';
  }

  //6.login button
  if(!isset($_SESSION['admin'])){
    $login_text='管理登入';
    $login_url='login.php';
  }else{
    $login_text='回後台管理';
    $login_url='admin.php';
  }

  //7.images
  $sql="SELECT * FROM images WHERE display=1";
  $imgArr=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  $imgLen=count($imgArr);
  $gallery="<img src='assets/01E01.jpg' onclick='pp(1)'>";
  for($i=0;$i<$imgLen;$i++){
    $gallery .="<img src='imgs/{$imgArr[$i]['image']}' class='im' id='ssaa{$i}' style='width:200px; height:130px;'>";
  }
  $gallery.="<img src='assets/01E02.jpg' onclick='pp(2)'>";
?>




