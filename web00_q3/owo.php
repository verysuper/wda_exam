<?php
  include_once("head.php");
  $tt = strtotime("+6hour");
  $p1 = date("Y-m-d",$tt);
  $sql = "select * from ding_log order by d_l_cnt desc limit 1";
  $ro = mysqli_query($link,$sql);
  $rr = mysqli_fetch_assoc($ro);
  $totle = $rr["d_l_cnt"]+1;

  $move = $_POST["n1"];
  $day =  $_POST["n2"];
  $xx = $_POST["n3"];
  $tday = strtotime($day); 
  $pd = date("Ymd",$tday).str_pad($totle,4,'0',STR_PAD_LEFT);

  $msql = "select * from move where m_seq = '".$move."'";
  $mro = mysqli_query($link,$msql);
  $mrr = mysqli_fetch_assoc($mro);
  
  $oo[1] = "14:00~16:00";
  $oo[2] = "16:00~18:00";
  $oo[3] = "18:00~20:00";
  $oo[4] = "20:00~22:00";
  $oo[5] = "22:00~24:00";
?>
  <div id="mm">
<table width="100%" border="1" cellspacing="0" cellpadding="3">
  <tr>
    <td colspan="2" align="left"><p>訂單編號:<?=$pd?></p></td>
  </tr>
  <tr>
    <td width="200" align="center">電影名稱</td>
    <td align="left"><?=$mrr["m_name"]?></td>
  </tr>
  <tr>
    <td align="center">日期</td>
    <td align="left"><?=$day?></td>
  </tr>
  <tr>
    <td align="center">場次時間</td>
    <td align="left"><?=$oo[$xx]?></td>
  </tr>
  <tr>
    <td colspan="2" align="left">
      <p>座位:</p>
<?php
for($i=0;$i<count($_POST["aa"]);$i++){
  $dt = $_POST["aa"][$i];
    $j = ceil($dt/5);
    $k = $dt - (($j - 1) * 5) ;
  $sql = "insert into ding_log value(null,'$move','$day','$xx','$dt','$pd','$totle')";
  mysqli_query($link,$sql);
?>
      <p><?=$j?>排<?=$k?>號</p>
<?php
}
?>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="left"><a href="/">確定</a></td>
  </tr>
</table>
  </div>
<?php include_once("footer.php")?>