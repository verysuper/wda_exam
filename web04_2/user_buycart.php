<?php
  if(!isset($_SESSION['user'])){
    header('location:index1.php?do=user_login');
  }
  if(empty($_SESSION['buyItem'])){
    echo "請選購商品";
    exit();
  }
?>
<form action="" method="post">
<table width="80%" border="0" align="center">
<caption><h1><?=$_SESSION['user']?>的購物車</h1></caption>
  <tr class="tt ct">
    <td>編號</td>
    <td>商品名稱</td>
    <td>數量</td>
    <td>庫存量</td>
    <td>單價</td>
    <td>小計</td>
    <td>刪除</td>
  </tr>
  <?php
  print_r($_SESSION['buyQt']);
    for($i=0;$i<count($_SESSION['buyItem']);$i++){
      $id=$_SESSION['buyItem'][$i];
      $qt=$_SESSION['buyQt'][$i];
      echo "<br>".$qt;
      $sql="select * from p_item where id='{$id}'";
      $row=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
?>
  <tr class="pp">
    <td><?=$row['no']?></td>
    <td><?=$row['name']?></td>
    <td><?=$qt?></td>
    <td><?=$row['qt']?></td>
    <td><?=$row['price']?></td>
    <td><?=$row['price']*$qt?></td>
    <td>
      <a href="api.php?do=buycart_del&i=<?=$i?>"><img src="assets/0415.jpg" alt=""></a>
    </td>
  </tr>
<?php
    }
  ?>

  <tr class="ct">
    <td colspan="7">
      <a href="index1.php"><img src="assets/0411.jpg" alt=""></a>
      <a href="index1.php?do=user_chkout"><img src="assets/0412.jpg" alt=""></a>
    </td>
    </tr>
</table>

</form>
