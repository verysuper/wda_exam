<?php
try {
    $conn = new PDO("mysql:host=127.0.0.1;dbname=wda_2_1;charset=UTF8;", "root", "");
} catch (PDOException $ex) {
    $ex->getMessage();
}
session_start();

?>
