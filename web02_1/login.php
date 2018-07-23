<?php
  if(!empty($_POST['acc']) && !empty($_POST['ps'])){
    $sql="select * from user where acc='{$_POST['acc']}'";
    $result=$conn->query($sql);
    if($result->rowCount()>0){
      $row=$result->fetch(PDO::FETCH_ASSOC);
      if($row['ps']==$_POST['ps']){         
        $_SESSION['acc']=$row['acc'];
        ?><script>document.location.href='index1.php';</script><?php
      }else{
        ?><script>alert('密碼錯誤');</script><?php
      }      
    }else{
      ?><script>alert('查無此帳號');</script><?php
    }
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
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
    <td><a href="index.php?do=forget">忘記密碼</a> | <a href="index.php?do=reg">尚未註冊</a></td>
  </tr>
</table>

</fieldset>
</form>
</body>
</html>
