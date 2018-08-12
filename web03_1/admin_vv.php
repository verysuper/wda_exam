
<?php
  if(isset($_POST['vvdel'])){
    $sql="delete from vv where id='{$_POST['id']}'";
    $conn->query($sql);
  }
?>
<a href="?do=admin&redo=admin_vvadd"> <input type="button" value="新增電影"> </a> 
<table width="80%" border="0" align="center">
  <tr>
    <td>海報</td>
    <td>片名</td>
    <td>排序</td>
    <td>狀態</td>
    <td>上映日</td>
    <td>操作</td>
  </tr>
  <?php
  $sql="select * from vv";
  $vvArr=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  foreach($vvArr as $row){
?>
<form action="" method="post">
  <tr>
    <td><img src="imgs/<?=$row['poster']?>" alt="" width=50px></td>
    <td><?=$row['name']?></td>
    <td><?=$row['rank']?></td>
    <td><?=$row['display']==1?'上檔':'下檔';?></td>
    <td><?=$row['ondate']?></td>
    <td>
    	<a href="?do=admin&redo=admin_vvedit&id=<?=$row['id']?>"><input type="button" value="修改"></a> 
      <input type="submit" name="vvdel" value="刪除">
    </td>
  </tr>
  <input type="hidden" name="id" value="<?=$row['id']?>">
</form>
<?php
  }
  ?>

</table>



