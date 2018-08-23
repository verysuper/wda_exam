<?php
$conn = new PDO("mysql:host=localhost;dbname=wda_2_3;charset=UTF8", "root", "");
date_default_timezone_set("Asia/Taipei");
session_start();
$curtime = date("Ymd", time());
if (!isset($_SESSION['acc'])) {
    $sql = "UPDATE log_visit SET count=count+1 WHERE time='{$curtime}'";
    $result = $conn->query($sql);
    if (!$result->rowCount() > 0) {
        $sql = "INSERT INTO log_visit VALUES(null, '{$curtime}', '1')";
        $result = $conn->query($sql);
    }
    $_SESSION['acc'] = 'visit';
}

$today = date('m 月 d 號 l',time());
$sql = "SELECT sum(count) as total FROM log_visit";
$allTotal = $conn->query($sql)->fetch(PDO::FETCH_ASSOC)['total'];
$sql = "SELECT count FROM log_visit where time='{$curtime}'";
$todayTotal = $conn->query($sql)->fetch(PDO::FETCH_ASSOC)['count'];

// $_SESSION['acc'] = 'admin';
switch ($_SESSION['acc']) {
    case 'admin':
        $utype = 999;
        break;
    case 'visit':
        $utype = 0;
        break;
    default:
        $utype = 1;
}
// echo $utype;
