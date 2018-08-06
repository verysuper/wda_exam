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
  if($_POST['do']=='dropdown_api'){
    $sql="select * from p_cat where parent='{$_POST['parent']}'";
    $result=$conn->query($sql);
    ?><option value="">請先選擇大項</option><?php
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      ?><option value="<?=$row['id']?>"><?=$row['name']?></option><?php
    }
  }
?>
