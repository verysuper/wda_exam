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
    array_splice($_SESSION["itemid"],$index,1);
    array_splice($_SESSION["buy_qty"],$index,1);
    header("location:index1.php?do=buycart");
  }
  if(isset($_POST['buycheckout']) && $_POST['buycheckout']=='確定送出'){
    foreach($_POST as $key => $value){    
      $$key = $value;      
    }
    $created=time();//created
    $o_no=date('YmdHis',$created);
    $o_date=date('Y/m/d',$created);
    $str="";
    //$total=0;
    for($i=0;$i<count($_SESSION['itemid']);$i++){
      if(!empty($_SESSION['itemid'])){
        $itemid=$_SESSION['itemid'][$i];
        $buy_qty=$_SESSION['buy_qty'][$i];
        $sql="select * from p_item where id='{$itemid}'";//迴圈做查詢資料庫 非常可能發生lag
        $row=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
        $sub_total=$row['price']*$buy_qty;
        // $total=$total+$sub_total;
        $str .="insert into p_order values(
          null,'{$o_no}','{$o_date}','{$acc}',
          '{$name}','{$mail}','{$address}','{$tel}',
          '{$row['name']}','{$row['no']}','{$buy_qty}',
          '{$row['price']}','{$sub_total}','{$total}','{$created}');";        
      }
    }
    $conn->query($str);
    unset($_SESSION["itemid"]);
    unset($_SESSION["buy_qty"]);
    // header("location:index1.php");
    ?><script>document.location.href='index1.php';alert('訂購成功,感謝您的選購');</script><?php
  }
?>
