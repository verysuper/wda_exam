<?php
  $sql = "select * from item_3 where i3_look =1";
  if(!empty($_GET["item"])){ $sql = "select * from item_3 where i3_i1 ='".$_GET["item"]."' and i3_look =1";}
  if(!empty($_GET["item2"])){ $sql = "select * from item_3 where i3_i2 ='".$_GET["item2"]."' and i3_look =1";}
  $ro2 = mysqli_query($link,$sql);
  $rr2 = mysqli_fetch_assoc($ro2);
?>

<table width="100%" border="0" cellspacing="1" cellpadding="3">
<?php do{?>
  <tr>
    <td rowspan="4" align="center" bgcolor="#FFCC33" width="250">
      <a href="/?do=look_item&look_item=<?=$rr2["i3_seq"]?>">
        <img src="images/item/<?=$rr2["i3_pic"]?>" width="250">
      </a>
    </td>
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