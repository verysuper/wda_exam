<?php
  $sql = "select * from item_3 a,item_1 b,item_2 c 
  where i3_seq ='".$_GET["look_item"]."' and a.i3_i1 = b.i1_seq and a.i3_i2 = c.i2_seq and i3_look =1";
  $ro2 = mysqli_query($link,$sql);
  $rr2 = mysqli_fetch_assoc($ro2);
?>
<table width="100%" border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td colspan="2" align="center"><?=$rr2["i3_name"]?></td>
  </tr>
  <tr>
    <td rowspan="5" align="center" bgcolor="#FFCC00" width="350"><img src="images/item/<?=$rr2["i3_pic"]?>" width="350"></td>
    <td align="left" bgcolor="#FFCC00">分類:<?=$rr2["i1_name"]?> > <?=$rr2["i2_name"]?></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#FFCC00">編號:<?=$rr2["i3_seq"]?></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#FFCC00">價錢:<?=$rr2["i3_sell"]?></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#FFCC00">詳細說明:<?=$rr2["i3_con"]?></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#FFCC00">庫存量:<?=$rr2["i3_cnt"]?></td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#FF9900">
      <form method="post" action="check_login.php">
        <input name="my_buy"><input name="my_item" type="hidden" value="<?=$rr2["i3_seq"]?>">
        <input type="submit" value="" style="width:57px;height:18px;background-image:url(images/0402.jpg);border-style: none;">
      </form>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="button" onclick="ggg()" value="返回"></td>
  </tr>
</table>
<script>
 function ggg(){
  document.location.href="/";
 }
</script>