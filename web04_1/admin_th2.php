<?php
  if(isset($_POST['delete'])){
    $sql="delete from p_item where id='{$_POST['id']}'";
    $conn->query($sql);
  }
  if(isset($_POST['onsell'])){
    $sql="update p_item set sell='1' where id='{$_POST['id']}'";
    $conn->query($sql);
  }
  if(isset($_POST['offsell'])){
    $sql="update p_item set sell='0' where id='{$_POST['id']}'";
    $conn->query($sql);
  }
?>
<table width="80%" border="0" align="center">
  <tr>
    <td colspan="5">商品管理　<a href="?do=admin&redo=th1">商品分類</a></td>
  </tr>
  <tr>
    <td colspan="5"><h1>商品管理</h1></td>
  </tr>
  <tr align="center">
    <td colspan="5">
      <input type="button" value="新增商品" onclick="document.location.href='?redo=item1'"/>
    </td>
  </tr>

  <tr  class="tt ct">
    <td>編號</td>
    <td>商品名稱</td>
    <td>庫存量</td>
    <td>狀態</td>
    <td>操作</td>
  </tr>
  <!--___________________________________________________________-->
  <?php
    //read
    $result=$conn->query("select * from p_item");
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
  ?>
<form action="" method="post">
  <tr  class="pp ct">
    <td><?=$row['no']?><input type="hidden" name="id" value="<?=$row['id']?>"></td>
    <td><?=$row['name']?></td>
    <td><?=$row['qt']?></td>
    <td><?=$row['sell']>0?'販售中':'已下架'?></td>
    <td>
      <input type="button" value="修改" onclick="document.location.href='?redo=item2&edit_id=<?=$row['id']?>'"/>
      <input type="submit" name="delete" value="刪除" /><br>
      <input type="submit" name="onsell" value="上架" />
      <input type="submit" name="offsell" value="下架" />
    </td>
  </tr>
</form>
  <?php }?>
</table>
