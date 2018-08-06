<?php
  try{
    $conn=new PDO("mysql:host=localhost;dbname=wda_4_2;charset=UTF8;",'root','');
  }catch(PDOexception $ex){
    echo $ex->getMessage();
  }
  date_default_timezone_set('Asia/Taipei');
  session_start();
  $sql="select * from footer where id=1";
  $footer=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
?>
