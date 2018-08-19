<?php
  try{
    $conn=new PDO("mysql:host=localhost;dbname=wda_3_2","root","");
  }catch(PDOException $ex){
    echo $ex->getMessage();
  }
  date_default_timezone_set("Asia/Taipei");
  session_start();
?>
