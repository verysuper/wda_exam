<?php
  include_once("head.php");
  $od = $_POST["my_id"];
  $sql="select * from account where a_id = '".$od."'";
  $rr = mysqli_query($link,$sql);
  $totle = mysqli_num_rows($rr);
  echo $totle;
?>