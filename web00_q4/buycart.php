<?php
if(empty($_SESSION["mem"])){
  header("location:/?do=login");
}
?>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td colspan="7" align="center"> <?=$_SESSION["mem"]?> 的購物車</td>
  </tr>
  <tr>
    <td align="center">編號</td>
    <td align="center">商品名稱</td>
    <td align="center">數量</td>
    <td align="center">庫存量</td>
    <td align="center">單價</td>
    <td align="center">小計</td>
    <td align="center">刪除</td>
  </tr>
<?php
  for($i=0; $i < count($_SESSION["my_item"]) ;$i++ ){
    if(!empty($_SESSION["my_item"][$i])){
    $mi=$_SESSION["my_item"][$i];
    $mb=$_SESSION["my_buy"][$i];
    $sql="select * from item_3 where i3_seq = '".$mi."'";
    $cc = mysqli_query($link,$sql);
    $co = mysqli_fetch_assoc($cc);
?>
  <tr>
    <td align="center"><?=$mi?></td>
    <td align="center"><?=$co["i3_name"]?></td>
    <td align="center"><?=$mb?></td>
    <td align="center"><?=$co["i3_cnt"]?></td>
    <td align="center"><?=$co["i3_sell"]?></td>
    <td align="center"><?php echo $co["i3_sell"] * $mb?></td>
    <td align="center"><a href="buy_cart_delete.php?del=<?=$i?>">刪除</a></td>
  </tr>
<?php }}?>
  <tr>
    <td colspan="7" align="center"><a href="/"><img src="images/0411.jpg"></a> <a href="?do=billing"><img src="images/0412.jpg"></a></td>
  </tr>
</table>
