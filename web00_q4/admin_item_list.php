<?php
$sql = "select * from item_3";
$ro2 = mysqli_query($link,$sql);
$list_i1_2 = mysqli_fetch_assoc($ro2);
?>
<table width="95%" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td colspan="5" align="center" valign="middle">商品管理　　<A href="admin.php?do=admin&redo=th">商品分類</A></td>
  </tr>
  <tr>
    <td colspan="5" align="center" valign="middle"><A href="admin.php?do=admin&redo=add_item">新增商品</A></td>
  </tr>
  <tr>
    <td align="center" valign="middle">商品編號</td>
    <td align="left" valign="middle">商品名稱</td>
    <td align="center" valign="middle">庫存</td>
    <td align="center" valign="middle">狀態</td>
    <td align="center" valign="middle">操作</td>
  </tr>
<?php
do{
  $look="已下架";
  if($list_i1_2["i3_look"] == 1){
    $look="販售中";
  }
?>
  <tr>
    <td align="center" valign="middle"><?=$list_i1_2["i3_seq"]?></td>
    <td align="left" valign="middle"><?=$list_i1_2["i3_name"]?></td>
    <td align="center" valign="middle"><?=$list_i1_2["i3_cnt"]?></td>
    <td align="center" valign="middle"><?=$look?></td>
    <td align="center" valign="middle"></td>
  </tr>
<?php }while($list_i1_2 = mysqli_fetch_assoc($ro2));?>
</table>
