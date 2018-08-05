
<table width="80%" border="0" align="center">
  <tr class="ct">
    <td colspan="3">
      <a href="?redo=admin_rootAdd"><input type="button" value="新增管理員" /></a>
    </td>
  </tr>
  <tr class="tt ct">
    <td>帳號</td>
    <td>密碼</td>
    <td>管理</td>
  </tr>
  <tr class="pp ct">
    <td>admin</td>
    <td>****</td>
    <td>此帳號為最高權限</td>
  </tr>
  <?php
    $sql="select * from admin where type=1";
    $result=$conn->query($sql);
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
  ?>
  <tr class="pp ct">
    <td><?=$row['acc']?></td>
    <td>****</td>
    <td>
      <a href="?redo=admin_rootEdit&id=<?=$row['id']?>"><input type="button" value="修改" /></a>
      <a href="?redo=admin_rootDel&id=<?=$row['id']?>"><input type="button" value="刪除" /></a>
  </td>
  </tr>
    <?php }?>
  <tr>
    <td class="ct" colspan="3"><a href="index1.php"><input type="button" value="返回" /></a></td>
  </tr>
</table>
