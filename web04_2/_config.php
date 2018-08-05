<?php
/**
 * 簡化所有code
 * 一.版型
 * 1.把所有鬼東西和補一個jq庫都丟進 assets file 中,留下版型檔
 * 2.用 DW 調整版型:index.php + admin.php
 * 3.取消 index.php top 裡的 style="padding:10px;"
 * 二.後台
 * 1.資料庫連線 + 時區
 * 2.從 index.php 的<管理登入>開始
 * 
 */
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
