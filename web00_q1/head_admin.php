<?php
session_start();
if(empty($_SESSION["ya"])){
    ?><script>document.location.href="login.php";</script><?php
    exit();
}

$link =mysqli_connect("localhost","root","","db00_q1");
mysqli_query($link , 'SET NAMES UTF8'); 


?>