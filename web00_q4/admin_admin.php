<?php
  if(!empty($_POST["my_id"])){
    if($_POST["my_id"] != "admin"){
      $id = $_POST["my_id"];
      $pw = $_POST["my_pw"];
      $l1 = 0;
      $l2 = 0;
      $l3 = 0;
      $l4 = 0;
      $l5 = 0;
      if(!empty($_POST["l1"])){ $l1=1;}
      if(!empty($_POST["l2"])){ $l2=1;}
      if(!empty($_POST["l3"])){ $l3=1;}
      if(!empty($_POST["l4"])){ $l4=1;}
      if(!empty($_POST["l5"])){ $l5=1;}
      $sql ="insert into admin_member value(null,'".$id."','".$pw."','".$l1."','".$l2."','".$l3."','".$l4."','".$l5."')";
      mysqli_query($link,$sql);
      ?><script>document.location.href="admin.php?do=admin&redo=admin"</script><?php
    }
  }
?>
<form method="post">
<table width="95%" border="1" cellspacing="0" cellpadding="3">
  <tr>
    <td colspan="2" align="center" valign="middle">新增管理帳號</td>
  </tr>
  <tr>
    <td align="center" valign="middle" width="30%">帳號</td>
    <td align="left" valign="middle"><input name="my_id"></td>
  </tr>
  <tr>
    <td align="center" valign="middle">密碼</td>
    <td align="left" valign="middle"><input type="password" name="my_pw"></td>
  </tr>
  <tr>
    <td align="center" valign="middle">權限</td>
    <td align="left" valign="middle">
      <input type="checkbox" name = "l1" value="1">商品分類與管理<br>
      <input type="checkbox" name = "l2" value="1">訂單管理<br>
      <input type="checkbox" name = "l3" value="1">會員管理<br>
      <input type="checkbox" name = "l4" value="1">頁尾版權管理<br>
      <input type="checkbox" name = "l5" value="1">最新消息管理<br>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle"><input type="submit" value="新增"><input type="reset" value="重置"></td>
  </tr>
</table>
</form>