<?php
//1
  try{
    $conn=new PDO("mysql:host=127.0.0.1;dbname=wda_3_2;charset=UTF8;","root","");
  }catch(PDOException $ex){
    echo $ex->getMessage();
  }
//2
  date_default_timezone_set("Asia/Taipei");
//3
  session_start();
?>
