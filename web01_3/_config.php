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
    $titles=$row;
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
  $ads="";
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    $ads .= $row['ad'].", "; // usage js
  }
  //5.mvim
  $mvims="";
  $result=$conn->query("select * from mvims where display = 1;");
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    // $mvims[]=$row;
    $mvims .= "'upload/".$row["mvim"]."',"; // usage js
  }
  // foreach( $mvims as $val){
  //   echo "<pre>".print_r($val,true)."</pre>"; //test*************
  // }

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
  $num = 0;
	$gallery = "<div onclick='pp(1)' align='center'><img src='images/01E01.jpg'></div>";
  $result=$conn->query("select * from images where display = 1;");
  $gallery_num=$result->rowCount();
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    //$images[]=$row;
		$gallery .= "
		<img src='upload/".$row["image"]."'  width='150' height='103'  style='border:5px #FC3 solid;' class='im' id='ssaa".$num."' />
		";
		
		$num++;
  }
  $gallery .= "<div onclick='pp(2)' align='center'><img src='images/01E02.jpg'></div>";

  //9.bottoms
  $result=$conn->query("select * from bottoms;");
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    $bottoms=$row;
  }
?>
