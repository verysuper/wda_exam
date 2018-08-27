<?php
  include_once '_config.php';
  unset($_SESSION['acc']);
  header('location:login.php');
?>
