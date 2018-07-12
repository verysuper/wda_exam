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
//menu page mapping 
$list['title']='1_title.php';
$list['ad']='2_ad.php';
?>
