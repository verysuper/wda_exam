<?php  
  try{
    $conn=new PDO("mysql:host=localhost;dbname=wda_4_1;charset=UTF8;","root","");
  }catch(PDOException $ex){
    echo $ex->getMessage();
  }
  date_default_timezone_set('Asia/Taipei');
  $now=date('Y/m/d H:i:s',time());
  //echo $now;
  session_start();
  $result=$conn->query("select * from footer");
  $footer=$result->fetch(PDO::FETCH_ASSOC)['footer'];
  //echo $footer;
?>
