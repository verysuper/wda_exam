<?php
  $sql = "select * from item_1";
  $ro = mysqli_query($link,$sql);
  $rr = mysqli_fetch_assoc($ro);
?>
<style>
  .aa:hover .bb{
    display:block;
  }
  .bb{
    display:none;
  }
</style>
<table width="100%" border="0" cellspacing="5" cellpadding="3">
<?php
  do{
  $sql = "select * from item_2 where i2_i1 ='".$rr["i1_seq"]."'";
  $roo = mysqli_query($link,$sql);
  $rro = mysqli_fetch_assoc($roo);
?>
  <tr>
    <td align="center" valign="middle" bgcolor="#FFFF99" class="aa">
      <a href="/?item=<?=$rr["i1_seq"]?>"><?=$rr["i1_name"]?></a>
  <?php do{?>
      <div class="bb"><a href="/?item2=<?=$rro["i2_seq"]?>"><?=$rro["i2_name"]?></a></div>
  <?php }while($rro = mysqli_fetch_assoc($roo));?>
    </td>
  </tr>
<?php }while($rr = mysqli_fetch_assoc($ro));?>
  <tr>
    <td align="center" valign="middle" bgcolor="#FFFF99"><a href="/">全部商品</a></td>
  </tr>
</table>
