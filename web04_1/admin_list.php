<?php
  //read
  $sql="select * from admin where type=1";
  $result=$conn->query($sql);
?>
<table width="80%" border="0" align="center">
  <tr>
    <td colspan="3" align="center">
      <input type="button" onclick="document.location.href='?redo=root&ga=insert'" value="新增管理員" /><!-- ga:get action -->
    </td>
  </tr>
  <tr class="tt ct">
    <td align="center">帳號</td>
    <td align="center">密碼</td>
    <td align="center">管理</td>
  </tr>
  <tr class="pp">
    <td align="center">admin</td>
    <td align="center">****</td>
    <td align="center">此帳號為最高權限</td>
  </tr>
  <?php while($row=$result->fetch(PDO::FETCH_ASSOC)){?>
  <tr class="pp">
    <td align="center"><?=$row['acc']?></td>
    <td align="center">****</td>
    <td align="center">
      <input type="button" onclick="document.location.href='?redo=root&ga=update&acc=<?=$row['acc']?>'" value="修改" /><!-- ga:get action -->
      <input type="button" onclick="document.location.href='?redo=root&ga=delete&acc=<?=$row['acc']?>'" value="刪除" /><!-- ga:get action -->
    </td>
  </tr>
  <?php }?>
  <tr class="ct">
    <td colspan="3"><input type="button" value="返回" onclick="document.location.href='index1.php'"></td>
  </tr>
</table>

