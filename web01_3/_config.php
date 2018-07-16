<?php
  try{
    $conn=new PDO("mysql:host=127.0.0.1;dbname=wda_1_1;charset=UTF8;","root","");
  }catch(PDOException $ex){
    echo $ex->getMessage();
  }
  //index info
  //1.titles
  $result=$conn->query("select * from titles where display = 1;");
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    $titles[]=$row;
  }
  //2.menu

  //3.totals
  session_start();
  if(!isset($_SESSION['visitor'])){
    $conn->query("update totals set total = total + 1 ;");
    $_SESSION['visitor']=1;
  }
  $result=$conn->query("select * from totals;");
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    $totals[]=$row;
  }
  
  //4.ads
  $result=$conn->query("select * from ads where display = 1;");
  $abs="";
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    $ads.=$row['ad'];
  }

  //5.mvim
  $result=$conn->query("select * from mvims where display = 1;");
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    $mvims[]=$row;
  }
  //echo "<pre>".print_r($mvims,true)."</pre>"; //test
  foreach( $mvims as $val){
    echo "<pre>".print_r($val,true)."</pre>"; //test
  }

  //6.newss
  $result=$conn->query("select * from newss where display = 1;");
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    $newss[]=$row;
  }
  //7.login button
  if(!isset($_SESSION['admin'])){
    $login_text = "管理登入";
		$login_url = "login.php";
  }else{
    $login_text = "回後台管理";
		$login_url = "admin.php";
  }
  //8.images
  $result=$conn->query("select * from images where display = 1;");
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    $images[]=$row;
  }

  //9.bottoms
  $result=$conn->query("select * from bottoms;");
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    $bottoms=$row;
  }
?>
