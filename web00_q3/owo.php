<?php
  include_once("head.php");
  $tt = strtotime("+6hour");
  $p1 = date("Y-m-d",$tt);
  $sql = "select * from ticket_log where t_l_day ='$p1'";
  $ro = mysqli_query($link,$sql);
  $totle = mysqli_num_rows($ro);
  $pd = date("Ymd",$tt).str_pad($totle,4,'0',STR_PAD_LEFT);
?>
  <div id="mm">
<table width="100%" border="1" cellspacing="0" cellpadding="3">
  <tr>
    <td colspan="2" align="left"><p>訂單編號:<?=$pd?></p></td>
  </tr>
  <tr>
    <td width="200" align="center">電影名稱</td>
    <td align="left"></td>
  </tr>
  <tr>
    <td align="center">日期</td>
    <td align="left"></td>
  </tr>
  <tr>
    <td align="center">場次時間</td>
    <td align="left"></td>
  </tr>
  <tr>
    <td colspan="2" align="left"><p>座位:</p>
    <p></p></td>
  </tr>
  <tr>
    <td colspan="2" align="left"></td>
  </tr>
</table>
  </div>
<?php include_once("footer.php")?>