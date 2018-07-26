<?php
$sql = "select * from admin_member";
$ro = mysqli_query($link,$sql);
$rr = mysqli_fetch_assoc($ro);
?>
<table width="95%" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td colspan="3" align="center" valign="middle"><a href="admin.php?do=admin&redo=aa">新增管理員</a></td>
  </tr>
  <tr>
    <td align="center" valign="middle">帳號</td>
    <td align="center" valign="middle">密碼</td>
    <td align="center" valign="middle">管理</td>
  </tr>
<?php do{?>
  <tr>
    <td align="center" valign="middle"><?=$rr["a_m_id"]?></td>
    <td align="center" valign="middle">****</td>
    <td align="center" valign="middle">
<?php if($rr["a_m_id"] == "admin"){?>
此帳號為最高權限
<?php }else{?>
      <a href="admin.php?do=admin&redo=aa">修改</a>
      <a href="del_api.php?del=admin_member&goto=admin&no=<?=$rr["a_m_seq"]?>">刪除</a>
<?php }?>
    </td>
  </tr>
<?php }while($rr = mysqli_fetch_assoc($ro));?>
</table>
