<?php
$sql="select * from account where a_id = '".$_SESSION["mem"]."'";
$me = mysqli_query($link,$sql);
$mem = mysqli_fetch_assoc($me);
?><table width="100%" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td colspan="5" align="center">結帳櫃檯</td>
  </tr>
  <tr>
    <td width="300" align="center" bgcolor="#FF9900">帳號</td>
    <td colspan="4" align="left"><?=$mem["a_id"]?></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FF9900">姓名</td>
    <td colspan="4" align="left"><?=$mem["a_name"]?></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FF9900">電子信箱</td>
    <td colspan="4" align="left"><?=$mem["a_email"]?></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FF9900">聯絡地址</td>
    <td colspan="4" align="left"><?=$mem["a_cc"]?></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FF9900">聯絡電話</td>
    <td colspan="4" align="left"><?=$mem["a_tel"]?></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FF9900">商品名稱</td>
    <td align="center" bgcolor="#FF9900">編號</td>
    <td align="center" bgcolor="#FF9900">數量</td>
    <td align="center" bgcolor="#FF9900">單價</td>
    <td align="center" bgcolor="#FF9900">小計</td>
  </tr>
<?php
  $money = 0;
  for($i=0; $i < count($_SESSION["my_item"]) ;$i++ ){
    if(!empty($_SESSION["my_item"][$i])){
    $mi=$_SESSION["my_item"][$i];
    $mb=$_SESSION["my_buy"][$i];
    $sql="select * from item_3 where i3_seq = '".$mi."'";
    $cc = mysqli_query($link,$sql);
    $co = mysqli_fetch_assoc($cc);
    $now_money = $co["i3_sell"] * $mb;
    $money = $money + $now_money;
?>
  <tr>
    <td align="center"><?=$co["i3_name"]?></td>
    <td align="center"><?=$mi?></td>
    <td align="center"><?=$mb?></td>
    <td align="center"><?=$co["i3_sell"]?></td>
    <td align="center"><?=$now_money?></td>
  </tr>
<?php }}?>
  <tr>
    <td colspan="5" align="center" bgcolor="#FFCC00">總價 : <?=$money?></td>
  </tr>
  <tr>
    <td colspan="5" align="center">
      <form action="gobilling.php" method="post"><input type="submit" value="確定送出"></form>
      <form action="/?do=buycart" method="post"><input type="submit" value="返回修改訂單"></form>
    </td>
  </tr>
</table>
