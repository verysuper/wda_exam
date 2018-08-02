<?php
include_once("head.php");

$member_seq = $_SESSION["memseq"];
//$jo_no 
//$jo_time
  for($i=0; $i < count($_SESSION["my_item"]) ;$i++ ){
    if(!empty($_SESSION["my_item"][$i])){
      $mi=$_SESSION["my_item"][$i];
      $mb=$_SESSION["my_buy"][$i];
      $sql="select * from item_3 where i3_seq = '".$mi."'";
      $cc = mysqli_query($link,$sql);
      $co = mysqli_fetch_assoc($cc);
      $now_money = $co["i3_sell"] * $mb;
      $sql = "insert into billing_log value(null,'".$jo_no."','".$mi."','".$mb."','".$co["i3_sell"]."','".$now_money."','".$member_seq."','".$jo_time."')";
      mysqli_query($link,$sql);
    }
  }
unset($_SESSION["my_item"]);
unset($_SESSION["my_buy"]);
header("location:/");
?>