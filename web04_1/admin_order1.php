<?php
  if(isset($_POST['admin_order1']) && $_POST['admin_order1']=='刪除' && isset($_POST['o_no'])){
    $sql="delete from p_order where no ='{$_POST['o_no']}'";
    $conn->query($sql);
  }
?>
<table width="80%" border="0" align="center">
<caption><h1>訂單管理</h1></caption>
  <tr class="tt ct">
    <td>訂單編號</td>
    <td>金額</td>
    <td>會員帳號</td>
    <td>姓名</td>
    <td>下單時間</td>
    <td>操作</td>
  </tr>
<?php
  //read
  $sql="select * from p_order group by no";
  $result=$conn->query($sql);
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    ?>
<form action="" method="post">  
<tr class="pp ct">
    <td><a href="admin.php?redo=order2&no=<?=$row['no']?>"><?=$row['no']?></a></td>
    <input type="hidden" name="o_no" value="<?=$row['no']?>">
    <td><?=$row['p_total']?></td>
    <td><?=$row['acc']?></td>
    <td><?=$row['name']?></td>
    <td><?=$row['date']?></td>
    <td><input type="submit" name="admin_order1" id="button" value="刪除" /></td>
</tr>
</form>
    <?php
  }
?>

</table>
