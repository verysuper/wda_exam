<?php
try {
    $conn = new PDO("mysql:host=127.0.0.1;dbname=wda_2_1;charset=UTF8;", "root", "");
} catch (PDOException $ex) {
    $ex->getMessage();
}
session_start();
$today = strtotime('today GMT+8');

if(!isset($_SESSION['visit'])){
  $sql="update visit set count = count+1 where time='{$today}'";
  $result=$conn->query($sql);
  //echo $result->rowCount();
  if(!$result->rowCount()>0){
    $result=$conn->query("insert into visit values(null,'{$today}','1')");
  }
  $_SESSION['visit']=1;
}
?>
