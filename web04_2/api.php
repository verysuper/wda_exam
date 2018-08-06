<?php
  include_once '_config.php';
  if(isset($_POST['to']) && $_POST['to']=='categore'){
    if($_POST['action']=='1'){
      $sql = "update p_cat set name='{$_POST['name']}' where id='{$_POST['id']}'";
      $conn->query($sql);
    }
    if ($_POST['action'] == '2') {
      $sql="delete from p_cat where id='{$_POST['id']}'";
      $conn->query($sql);
    }
  }
?>
