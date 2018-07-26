<?php
  if(!empty($_POST["a_name"])){
    $sql = "update account set a_name = '".$_POST["a_name"]."' , a_email= '".$_POST["a_email"]."' , a_cc= '".$_POST["a_cc"]."' , a_tel= '".$_POST["a_tel"]."' where a_seq = '".$_GET["no"]."'";
    mysqli_query($link,$sql);
  }

 $sql = "select * from account where a_seq = '".$_GET["no"]."'";
 $rr = mysqli_query($link,$sql);
 $rrr = mysqli_fetch_assoc($rr);
?>

<form method="post">
<table width="95%" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td colspan="2" align="center">編輯會員資料</td>
  </tr>
  <tr>
    <td align="center" width="30%">帳號</td>
    <td align="left"><?=$rrr["a_id"]?></td>
  </tr>
  <tr>
    <td align="center" width="30%">姓名</td>
    <td align="left"><input name="a_name" value="<?=$rrr["a_name"]?>"></td>
  </tr>
  <tr>
    <td align="center">電子信箱</td>
    <td align="left"><input name="a_email" value="<?=$rrr["a_email"]?>"></td>
  </tr>
  <tr>
    <td align="center" width="30%">地址</td>
    <td align="left"><input name="a_cc" value="<?=$rrr["a_cc"]?>"></td>
  </tr>
  <tr>
    <td align="center">電話</td>
    <td align="left"><input name="a_tel" value="<?=$rrr["a_tel"]?>"></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type = "submit" value="修改">
    </td>
  </tr>
</table>
</form>