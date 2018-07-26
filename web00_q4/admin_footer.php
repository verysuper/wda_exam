<?php
  if(!empty($_POST["my_footer"])){
    $my_footer = $_POST["my_footer"];
    $sql = "update myfooter set m_footer = '$my_footer' ";
    mysqli_query($link,$sql);
  }
 $sql = "select * from myfooter";
 $rr = mysqli_query($link,$sql);
 $rrr = mysqli_fetch_assoc($rr);
?>
<form method="post">
<table width="95%" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td colspan="2" align="center">編輯頁尾版權管理</td>
  </tr>
  <tr>
    <td align="center">頁尾宣告內容</td>
    <td align="left"><input name ="my_footer" value="<?=$rrr["m_footer"]?>"></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" value="編輯">
      <input type="reset" value="重置">
    </td>
  </tr>
</table>
</form>