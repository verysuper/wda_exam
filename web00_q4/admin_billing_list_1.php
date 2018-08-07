<?php
$bill = $_GET["no"];

  $sql ="select * 
         from billing_log a,account b 
         where a.b_l_member = b.a_seq and b_l_no ='$bill'";
$me = mysqli_query($link,$sql);
$mem = mysqli_fetch_assoc($me);
?><table width="100%" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td colspan="5" align="center">訂單編號  的詳細資料</td>
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
do{
?>
  <tr>
    <td align="center"></td>
    <td align="center"><?=$mem["b_l_no"]?></td>
    <td align="center"><?=$mem["b_l_i_cnt"]?></td>
    <td align="center"><?=$mem["b_l_money"]?></td>
    <td align="center"><?=$mem["b_l_totle"]?></td>
  </tr>
<?php }while($mem = mysqli_fetch_assoc($me));?>
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
