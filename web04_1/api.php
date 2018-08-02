<?php
  include_once '_config.php';
  if(isset($_POST['to']) && $_POST['to']=='userAccCheck'){
    $sql="select * from user where acc='{$_POST['userAcc']}' limit 1";
    $result=$conn->query($sql)->rowCount();
    echo $result;
  }
  if(isset($_POST['to']) && $_POST['to']=='categore_api'){
    if($_POST['action']==1){
      $sql="update p_cat set name='{$_POST['name']}' where id='{$_POST['id']}'";
      $conn->query($sql);
    }
    if($_POST['action']==2){
      $sql="delete from p_cat where id='{$_POST['id']}'";
      $conn->query($sql);
    }
  }
  if(isset($_POST['to']) && $_POST['to']=='dropDownList_api'){
    $sql="select * from p_cat where parent='{$_POST['parent']}'";
    $result=$conn->query($sql);
    ?><option value="">請先選擇大類</option><?php //補
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      ?><option value="<?=$row['id']?>"><?=$row['name']?></option><?php
    }    
  }
  //進入購物車用 ********** 不能按太多次 session 會掛掉
  if(isset($_POST['to']) && $_POST['to']=='check_login'){
      $_SESSION["itemid"][] =$_POST["itemid"];
      $_SESSION["buy_qty"][] =$_POST["buy_qty"];
    if(empty($_SESSION["user"])){
      header("location:index1.php?do=userLogin");
    }else{
      header("location:index1.php?do=buycart");
    }
  }
  //remove cart array index ********** 不能按太多次 session 會掛掉
  if(isset($_GET['remove'])){
    $index=$_GET['remove'];
    $_SESSION["itemid"][$index]=null;
    $_SESSION["buy_qty"][$index]=null;
    header("location:index1.php?do=buycart");
  }
  if(isset($_GET['buycheckout'])){
    $items = $_SESSION["itemid"];
    print_r($items);//______________
    exit();//______________
  }
?>
