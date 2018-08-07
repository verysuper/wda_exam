<table width="80%" border="0" align="center">
  <tr>
    <td colspan="5">商品管理 | <a href="?redo=admin_th1">商品分類</a></td>
  </tr>
  <tr class="ct">
    <td colspan="5"><h1>商品管理</h1></td>
  </tr>
  <tr class="ct">
    <td colspan="5">
      <a href="?redo=admin_itemAdd"><input type="button" value="新增商品" /></a>
    </td>
  </tr>
  <tr class="ct">
    <td colspan="5"><select name="select" size="1" id="select">
      <option value="">全部商品</option>
    </select></td>
  </tr>
  <tr class="tt ct">
    <td>編號</td>
    <td>商品名稱</td>
    <td>庫存量</td>
    <td>狀態</td>
    <td>操作</td>
  </tr>
  <?php 
    $result=$conn->query("select * from p_item");
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
?>
<form action="" method="post">
  <tr class="pp ct">
    <td><?=$row['no']?></td>
    <td><?=$row['name']?></td>
    <td><?=$row['qt']?></td>
    <td><?=$row['sell']?></td>
    <td>
      <a href="?redo=admin_itemEdit&id=<?=$row['id']?>"><input type="button" value="修改" /></a>
      <input type="submit" name="button3" id="button3" value="刪除" /><br>
      <input type="submit" name="button4" id="button4" value="上架" />
      <input type="submit" name="button5" id="button5" value="下架" />
    </td>
  </tr></form>
<?php
    }
  ?>

</table>
