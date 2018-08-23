<?php
  if(isset($_POST['login'])){
    $sql="SELECT * FROM user WHERE acc='{$_POST['acc']}' and pw='{$_POST['pw']}'";
    $result=$conn->query($sql);
    if($result->rowCount()>0){
      $_SESSION['acc']=$_POST['acc'];
      header('location:index1.php');
    }else{
      ?><script>alert('「查無帳號」或「密碼錯誤」');</script><?php
    }
  }
?>
<fieldset>
  <legend>會員登入</legend>
  <form action="" method="post">
  <table width="80%" border="0" align="center">
  <tr>
    <td>帳號:</td>
    <td><input type="text" name="acc" required /></td>
  </tr>
  <tr>
    <td>密碼:</td>
    <td><input type="text" name="pw" required /></td>
  </tr>
  <tr>
    <td><input type="submit" name="login" id="button" value="登入" />
      <input type="reset" name="button2" id="button2" value="重設" /></td>
    <td> <a href="?do=password">忘記密碼</a> | <a href="?do=register">尚未註冊</a></td>
  </tr>
</table>

  </form>
</fieldset>
