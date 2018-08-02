<?php
  $sql = "select * from item_3";
  $ro2 = mysqli_query($link,$sql);
  $rr2 = mysqli_fetch_assoc($ro2);
?>

<table width="100%" border="0" cellspacing="1" cellpadding="3">
<?php do{?>
  <tr>
    <td rowspan="4" align="center" bgcolor="#FFCC33" width="250"><img src="images/item/<?=$rr2["i3_pic"]?>" width="250"></td>
    <td align="center" bgcolor="#FF9900"><?=$rr2["i3_name"]?></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#FFCC33">價錢:<?=$rr2["i3_sell"]?>　　　<img src="images/0402.jpg"></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#FFCC33">規格:<?=$rr2["i3_type"]?></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#FFCC33">簡介:<?=$rr2["i3_con"]?></td>
  </tr>
<?php }while($rr2 = mysqli_fetch_assoc($ro2));?>
</table>
