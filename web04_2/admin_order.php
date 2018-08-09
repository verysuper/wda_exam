<?php
  if(isset($_POST['order_del'])){
    $sql="delete from p_order where o_no='{$_POST['o_no']}'";
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
    $result=$conn->query("select * from p_order group by o_no");
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
?>
<form action="" method="post">  <tr class="pp ct">
    <td>
      <a href="?redo=admin_orderDetail&no=<?=$row['o_no']?>"><?=$row['o_no']?></a>
    </td>
    <td><?=$row['total']?></td>
    <td><?=$row['acc']?></td>
    <td><?=$row['name']?></td>
    <td><?=$row['o_date']?></td>
    <td>
    <input type="submit" name="order_del" id="button" value="刪除" />
    <input type="hidden" name="o_no" value="<?=$row['o_no']?>">
    </td>
  </tr></form>
<?php
    }
  ?>

</table>
