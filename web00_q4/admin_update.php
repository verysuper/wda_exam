<?php
  if(!empty($_POST["my_id"])){
    $id = $_POST["my_id"];
    $pw = $_POST["my_pw"];
    $l1 = "0";//預設為0
    $l2 = "0";
    $l3 = "0";
    $l4 = "0";
    $l5 = "0";
    if(!empty($_POST["l1"])){ $l1 ="1"; }//如果有點選的話改為1
    if(!empty($_POST["l2"])){ $l2 ="1"; }
    if(!empty($_POST["l3"])){ $l3 ="1"; }
    if(!empty($_POST["l4"])){ $l4 ="1"; }
    if(!empty($_POST["l5"])){ $l5 ="1"; }
    $sql = "update admin_member set a_m_id = '$id' ,a_m_pw = '$pw' ,a_m_1 = '$l1' ,a_m_2 = '$l2' ,a_m_3 = '$l3' ,a_m_4 = '$l4' ,a_m_5 = '$l5'  where a_m_seq = '".$_GET["no"]."'";
    mysqli_query($link,$sql);
  }

 $sql = "select * from admin_member where a_m_seq = '".$_GET["no"]."'";
 $rr = mysqli_query($link,$sql);
 $rrr = mysqli_fetch_assoc($rr);
?>
<input type="button" value="返回" onclick = "document.location.href='/'"><br>
<form method="post">
<table width="95%" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td colspan="2" align="center">修改管理員權限</td>
  </tr>
  <tr>
    <td align="center" width="30%">帳號</td>
    <td align="left"><input name="my_id" value="<?=$rrr["a_m_id"]?>"></td>
  </tr>
  <tr>
    <td align="center">密碼</td>
    <td align="left"><input type = "password" name="my_pw" value="<?=$rrr["a_m_pw"]?>"></td>
  </tr>
  <tr>
    <td align="center">權限</td>
    <td align="left">
      <input type = "checkbox" name="l1" value="1" <?php if($rrr["a_m_1"] == 1){ echo "checked";}?>>商品分類與管理<br>
      <input type = "checkbox" name="l2" value="1" <?php if($rrr["a_m_2"] == 1){ echo "checked";}?>>訂單管理<br>
      <input type = "checkbox" name="l3" value="1" <?php if($rrr["a_m_3"] == 1){ echo "checked";}?>>會員管理<br>
      <input type = "checkbox" name="l4" value="1" <?php if($rrr["a_m_4"] == 1){ echo "checked";}?>>頁尾版權管理<br>
      <input type = "checkbox" name="l5" value="1" <?php if($rrr["a_m_5"] == 1){ echo "checked";}?>>最新消息管理<br>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type = "submit" value="修改">
      <input type = "reset" value="重置">
    </td>
  </tr>
</table>
</form>