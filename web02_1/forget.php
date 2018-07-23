
<?php
  $msg="";
  if(isset($_POST['psForget'])){
    $sql="select * from user where mail='{$_POST['psForget']}'";
    $result=$conn->query($sql);

    if($result->rowCount()==1){
      $row=$result->fetch(PDO::FETCH_ASSOC);
      $msg="您的密碼為:".$row['ps'];
    }else{
      $msg="查無此資料";
    }
  }
?>
<fieldset>
<!-- <legend></legend> -->
<form action="" method="post">
<table align="center">
  <tr>
    <td>請輸入信箱以查詢密碼</td>
  </tr>
  <tr>
    <td><input name="psForget" type="text" value="" required/></td>
  </tr>
    <tr>
    <td><?=$msg?></td>
  </tr>
  <tr>
    <td><input name="尋找" type="submit" /></td>
  </tr>
</table>

</form>
</fieldset>
