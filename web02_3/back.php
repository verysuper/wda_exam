<?php
  include_once '_config.php';
  if($_GET['do']=='good'){
    if($_GET['type']=='2'){
      $conn->query("UPDATE article SET good=good-1 WHERE id='{$_POST['id']}'");
      $conn->query("DELETE FROM log_good WHERE acc='{$_POST['user']}' and art='{$_POST['id']}'");
    }
    if($_GET['type']=='1'){
      $conn->query("UPDATE article SET good=good+1 WHERE id='{$_POST['id']}'");
      $conn->query("INSERT INTO log_good VALUES(null,'{$_POST['user']}','{$_POST['id']}')");
    }
  }
?>

