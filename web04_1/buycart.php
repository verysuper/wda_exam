<?php
if(empty($_SESSION["user"])){
  header("location:index1.php?do=userLogin");
}
if(empty($_SESSION["itemid"])){
  header("location:index1.php");
}
?>
<form action="" method="post">
<table width="80%" border="0" align="center">
  <caption><h1><?=$_SESSION["user"]?>的購物車</h1></caption>
  <tr class="tt ct">
    <td>編號</td>
    <td>商品名稱</td>
    <td>數量</td>
    <td>庫存量</td>
    <td>單價</td>
    <td>小記</td>
    <td>刪除</td>
  </tr>
<?php
print_r($_SESSION['itemid']);echo "<br>";//________________
echo count($_SESSION['itemid'])."<br>";//________________
  for($i=0;$i<count($_SESSION['itemid']);$i++){
    echo $i."=".$_SESSION['itemid'][$i]."<br>";//________________
    echo $i."=".$_SESSION['buy_qty'][$i]."<br>";//________________
    if(!empty($_SESSION['itemid'][$i])){
      $itemid=$_SESSION['itemid'][$i];
      $buy_qty=$_SESSION['buy_qty'][$i];
      $sql="select * from p_item where id='{$itemid}'";//迴圈做查詢資料庫 非常可能發生lag
      $row=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
      ?>
  <tr class="pp ct">      
    <td><?=$row['no']?></td>
    <td><?=$row['name']?></td>
    <td><?=$buy_qty?></td>
    <td><?=$row['qt']?></td>
    <td><?=$row['price']?></td>
    <td><?=$row['price']*$buy_qty?></td>
    <td> 
      <a href="api.php?remove=<?=$i?>"><img src="./assets/0415.jpg"></a><!--remove cart array index-->
    </td>
  </tr>       
      <?php
    }
  }
?>
  <tr class="pp ct">
    <td colspan="7">
      <img src="./assets/0411.jpg" alt="" onclick="document.location.href='index1.php'">
      <img src="./assets/0412.jpg" alt="" onclick="document.location.href='?do=buycheckout'">
    </td>
    </tr>
</table>
</form>
