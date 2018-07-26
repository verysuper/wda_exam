<?php
  if(!empty($_POST['acc']) && !empty($_POST['ps'])){
    $sql="select * from user where acc='{$_POST['acc']}'";
    $result=$conn->query($sql);
    if($result->rowCount()>0){
      $row=$result->fetch(PDO::FETCH_ASSOC);
      if($row['ps']==$_POST['ps']){         
        $_SESSION['acc']=$row['acc'];
        ?><script>document.location.href='?do=admin';</script><?php
      }else{
        ?><script>alert('密碼錯誤');</script><?php
      }      
    }else{
      ?><script>alert('查無此帳號');</script><?php
    }
  }
?>

<form action="" method="post">
<fieldset width="500">
<legend>會員登入</legend>
<table  border="0" align="center">
  <tr>
    <td>帳號</td>
    <td><label for="textfield"></label>
      <input type="text" name="acc" id="textfield" required/></td>
  </tr>
  <tr>
    <td>密碼</td>
    <td><input type="text" name="ps" id="textfield2" required/></td>
  </tr>
  <tr>
    <td>
      <input type="submit" name="button" id="button" value="登入" />
      <input type="reset" name="button2" id="button2" value="清除" /></td>
    <td><a href="?do=forget">忘記密碼</a> | <a href="?do=reg">尚未註冊</a></td>
  </tr>
</table>
</fieldset>

</form>
