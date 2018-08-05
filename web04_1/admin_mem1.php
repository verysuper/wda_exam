<?php
  if(isset($_POST['del']) && $_POST['del']=="刪除"){
    $sql="delete from user where id='{$_POST['id']}'";
    $conn->query($sql);
  }
?>
<table width="80%" border="0">
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
  <form action="" method="post">
  <tr class="pp ct">
    <td><?=$row['name']?></td>
    <td><?=$row['acc']?></td>
    <td><?=explode(" ",$row['created'])[0]?></td>
    <td>
      <a href="?redo=mem2&id=<?=$row['id']?>"><input type="button" value="修改"/></a><!-- note:a+button -->
      <input name="del" type="submit" value="刪除"/>
      <input type="hidden" name="id" value="<?=$row['id']?>">
    </td>
  </tr>
  </form>
    <?php
  }
?>

</table>
