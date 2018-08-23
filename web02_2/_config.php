<?php
  $conn=new PDO("mysql:host=localhost;dbname=wda_2_2;charset=UTF8;","root","");
  date_default_timezone_set('Asia/Taipei');
  session_start();

  $curtime=date('Ymd',time());
  if (!isset($_SESSION['user'])) {
    $sql = "update log_visit set count = count+1 where time='{$curtime}'";
    $result = $conn->query($sql);
    if (!$result->rowCount() > 0) {
      $sql = "insert into log_visit values(null,'{$curtime}','1')";
      $result = $conn->query($sql);
    }
    $_SESSION['user'] = 'visitor';
  }
  $showTime = date("m 月 d 號 l", $curtime); //
  $sql="SELECT sum(count) as totalall FROM log_visit";
  $totalAll = $conn->query($sql)->fetch(PDO::FETCH_ASSOC)['totalall']; //
  $sql="SELECT * FROM log_visit where time='{$curtime}'";
  $totalToday = $conn->query($sql)->fetch(PDO::FETCH_ASSOC)['count']; //


  // echo $totaltoday;
?>
