<?php
  include_once '_config.php';
  if(isset($_POST['do']) && $_POST['do']=='categore'){
    if($_POST['action']=='1'){
      $sql = "update p_cat set name='{$_POST['name']}' where id='{$_POST['id']}'";
      $conn->query($sql);
    }
    if ($_POST['action'] == '2') {
      $sql="delete from p_cat where id='{$_POST['id']}'";
      $conn->query($sql);
    }
  }
  if(isset($_POST['do']) && $_POST['do']=='dropdown_api'){
    $sql="select * from p_cat where parent='{$_POST['parent']}'";
    $result=$conn->query($sql);
    ?><option value="">請先選擇大項</option><?php
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      ?><option value="<?=$row['id']?>"><?=$row['name']?></option><?php
    }
  }
  if(isset($_POST['do']) && $_POST['do']=='chklogin'){
    $_SESSION['buyItem'][]=$_POST['id'];
    $_SESSION['buyQt'][] = $_POST['qt'];
    if(!isset($_SESSION['user'])){
      header('location:index1.php?do=user_login');
    }else{
      header('location:index1.php');
    }
  }
  if(isset($_POST['do']) && $_POST['do']=='chkexist_api'){
    $sql="select * from user where acc='{$_POST['acc']}'";
    if($_POST['acc']=='admin'){
      echo '不得使用「 admin 」作為帳號註冊';
    }
    if($conn->query($sql)->rowCount()==1){
      echo '帳號已存在';
    }else{
      echo '帳號不存在';
    }
  }
  if(isset($_GET['do']) && $_GET['do']=='buycart_del'){
    array_splice($_SESSION['buyItem'],$_GET['i'],1);
    array_splice($_SESSION['buyQt'],$_GET['i'],1);
    header('location:index1.php?do=user_buycart');
  }
?>
