<?php
  try{
    $conn=new PDO("mysql:host=127.0.0.1;dbname=wda_1_1;charset=UTF8;","root","");
  }catch(PDOException $ex){
    echo $ex->getMessage();
  }
  //index info
  //totals
  session_start();
  if(!isset($_SESSION['visitor'])){
    $conn->query("update totals set total = total + 1 ;");
    $_SESSION['visitor']=1;
  }
  //
  if(!isset($_SESSION['admin'])){
    $login_text = "管理登入";
		$login_url = "login.php";
  }else{
    $login_text = "回後台管理";
		$login_url = "admin.php";
  }

  //titles
  $result=$conn->query("select * from titles where display = 1;");
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    $titles_title=$row['title'];
    $titles_alt=$row['alt'];
  }
  //ads
  $result=$conn->query("select * from ads where display = 1;");
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    $ads_ads[]=$row['ad'];
  }
  //bottoms
  $result=$conn->query("select * from bottoms;");
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    $bottoms_bottom=$row['bottom'];
  }
?>
