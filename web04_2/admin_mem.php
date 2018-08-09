<?php
  if(isset($_POST['del'])){
    $sql="delete from user where acc='{$_POST['acc']}'";
    $conn->query($sql);
  }
?>
<table width="80%" border="0" align="center">
<caption><h1>會員管理</h1></caption>
  <tr class="tt ct">
    <td>姓名</td>
    <td>會員帳號</td>
    <td>註冊日期</td>
    <td>操作</td>
  </tr>
  <?php
    $sql="select * from user";
    $result=$conn->query($sql);
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
?>
  <form action="" method="post">  <tr class="pp ct">
    <td><?=$row['name']?></td>
    <td><?=$row['acc']?></td>
    <td><?=$row['created']?></td>
    <td>
      <a href="?redo=admin_memEdit&acc=<?=$row['acc']?>"><input type="button" value="修改" name="edit"></a>
      <input type="submit" value="刪除" name="del">
      <input type="hidden" name="acc" value="<?=$row['acc']?>">
    </td>
  </tr></form>
<?php
    }
  ?>

</table>
