<?php 
  try{
    $conn=new PDO("mysql:
    host=localhost;
    dbname=wda_exam01;
    charset=UTF8;","root","");
  }catch(PDOEXception $ex){
    echo $ex->getMessage();
  }
  session_start();

  //total
  if(!isset($_SESSION['visitor'])){
    $sql="update total set count = count + 1 ;";
    $result = $conn->query($sql);
    $_SESSION['visitor']='1';
  }
  $result = $conn->query("select * from total");
  $total=$result->fetch();

  //bottom
  $result = $conn->query("select * from bottom");
  $bottom=$result->fetch();

  //menu page mapping 
  $list['title']='1_title.php';
  $list['ad']='2_ad.php';
  $list['mvim'] = '3_mvim.php';
  $list['image'] = '4_image.php';
  $list['total'] = '5_total.php';
  $list['bottom'] = '6_bottom.php';
  $list['news'] = '7_news.php';
?>
