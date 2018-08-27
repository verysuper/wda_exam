<?php
  $conn=new PDO("mysql:host=127.0.0.1;dbname=wda_1_4;charset=UTF8;","root","");
  date_default_timezone_set("Asia/Taipei");
  session_start();

$sql="SELECT * FROM `title` where display=1";
$result=$conn->query($sql);
while($row=$result->fetch(PDO::FETCH_ASSOC)){
  $title=$row['name'];
}

$name="";
$sql="SELECT * FROM `menu` where parent='0' and display=1";
$result=$conn->query($sql);
while($row=$result->fetch(PDO::FETCH_ASSOC)){
  
}

?>
