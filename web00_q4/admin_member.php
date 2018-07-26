<?php
  $sql="select * from account";
  $cc = mysqli_query($link,$sql);
  $ccc = mysqli_fetch_assoc($cc);
?>
<table width="95%" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td colspan="4" align="center">會員管理</td>
  </tr>
  <tr>
    <td align="center">姓名</td>
    <td align="center">會員帳號</td>
    <td align="center">註冊日期</td>
    <td align="center">操作</td>
  </tr>
<?php do{?>
  <tr>
    <td align="center"><?=$ccc["a_name"]?></td>
    <td align="center"><?=$ccc["a_id"]?></td>
    <td align="center"><?=$ccc["a_day"]?></td>
    <td align="center">
      <a href="admin.php?do=admin&redo=admin_acc_update&no=<?=$ccc["a_seq"]?>">修改</a>
      <a href="del_api.php?del=account&goto=mem&no=<?=$ccc["a_seq"]?>">刪除</a>
    </td>
  </tr>
<?php }while($ccc = mysqli_fetch_assoc($cc));?>
</table>
