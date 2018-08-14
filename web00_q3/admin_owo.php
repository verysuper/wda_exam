
<?php
if(!empty($_POST["dd"])){
  $sql="delete from ding_log where d_l_no = '".$_POST["dd"]."'";
  mysqli_query($link,$sql);
  ?><script>document.location.href="/admin.php?do=admin&redo=order"</script><?php
}
if(!empty($_POST["ddmove"])){
  $sql="delete from ding_log where d_l_m = '".$_POST["ddmove"]."'";
  mysqli_query($link,$sql);
  ?><script>document.location.href="/admin.php?do=admin&redo=order"</script><?php
}
if(!empty($_POST["dday"])){
  $sql="delete from ding_log where d_l_day = '".$_POST["dday"]."'";
  mysqli_query($link,$sql);
  ?><script>document.location.href="/admin.php?do=admin&redo=order"</script><?php
}
$sql="select * from ding_log a, move b where a.d_l_m = b.m_seq group by d_l_no desc";
$ro = mysqli_query($link,$sql);
$rr = mysqli_fetch_assoc($ro);
  $oo[1] = "14:00~16:00";
  $oo[2] = "16:00~18:00";
  $oo[3] = "18:00~20:00";
  $oo[4] = "20:00~22:00";
  $oo[5] = "22:00~24:00";

$msql="select * from move";
$mro = mysqli_query($link,$msql);
$mrr = mysqli_fetch_assoc($mro);
?>

<table width="100%" border="1" cellspacing="0" cellpadding="3">
  <tr>
    <td width="200" align="center">快速刪除</td>
<form method="post" id="dd1">
    <td width="100" align="center">依日期</td>
    <td width="200" align="center"><input type="date" name="dday"></td>
    <td width="100" align="center"><input type="button" value="刪除" onclick="d1()"></td>
</form>
    <td width="200" align="center"></td>
<form method="post" id="dd2">
    <td width="100" align="center">依電影</td>
    <td width="200" align="center">
      <select name="ddmove">
<?php do{?>
        <option value="<?=$mrr["m_seq"]?>"><?=$mrr["m_name"]?></option>
<?php }while($mrr = mysqli_fetch_assoc($mro));?>
      </select></td>
    <td width="100" align="center"><input type="button" value="刪除" onclick="d2()"></td>
</form>
  <tr>
</table>
<table width="100%" border="1" cellspacing="0" cellpadding="3">
  <tr>
    <td width="200" align="center">訂單編號</td>
    <td width="100" align="center">電影名稱</td>
    <td width="200" align="center">觀看日期</td>
    <td width="150" align="center">場次時間</td>
    <td width="100" align="center">訂購數量</td>
    <td width="200" align="center">訂購位置</td>
    <td width="50" align="center"></td>
  </tr>
<?php do{?>
<form method="post">
  <tr>
    <td width="200" align="center"><?=$rr["d_l_no"]?></td>
    <td width="100" align="center"><?=$rr["m_name"]?></td>
    <td width="200" align="center"><?=$rr["d_l_day"]?></td>
    <td width="150" align="center"><?=$oo[$rr["d_l_time"]]?></td>
<?php
  $sql="select * from ding_log where d_l_no = '".$rr["d_l_no"]."'";
  $tro = mysqli_query($link,$sql);
  $trr = mysqli_fetch_assoc($tro);
  $totle = mysqli_num_rows($tro);
?>
    <td width="100" align="center"><?=$totle?></td>
    <td width="200" align="center">
  <?php
    do{
      $j = ceil($trr["d_l_jo"]/5);
      $k = $trr["d_l_jo"] - (($j - 1) * 5) 
  ?>
      <?=$j?>排<?=$k?>號<br>
  <?php }while($trr = mysqli_fetch_assoc($tro));?>
    </td>
    <td width="50" align="center"><input type="submit" value="刪除"></td>
  </tr>
  <input type="hidden" name = "dd" value="<?=$rr["d_l_no"]?>">
</form>
<?php }while($rr = mysqli_fetch_assoc($ro));?>
</table>
<script>
function d1(){
  if(confirm("確認是否刪除")){
    document.getElementById("dd1").submit();
  }
}
function d2(){
  if(confirm("確認是否刪除")){
    document.getElementById("dd2").submit();
  }
}
</script>
