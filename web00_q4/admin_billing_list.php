<?php
  $sql ="select sum(b_l_totle) as aa ,b_l_no , a_id , a_name , b_l_time 
         from billing_log a,account b 
         where a.b_l_member = b.a_seq 
         group by b_l_no";
  $ro = mysqli_query($link,$sql);
  $rr = mysqli_fetch_assoc($ro);
?>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td colspan="6" align="center">訂單管理</td>
  </tr>
  <tr>
    <td align="center" width="300">訂單編號</td>
    <td align="center" width="150">金額</td>
    <td align="center" width="200">會員帳號</td>
    <td align="center" width="100">姓名</td>
    <td align="center" width="200">下單時間</td>
    <td align="center" width="50">操作</td>
  </tr>
<?php do{?>
  <tr>
    <td align="center"><a href="admin.php?do=admin&redo=order_1&no=<?=$rr["b_l_no"]?>"><?=$rr["b_l_no"]?></a></td>
    <td align="center"><?=$rr["aa"]?></td>
    <td align="center"><?=$rr["a_id"]?></td>
    <td align="center"><?=$rr["a_name"]?></td>
    <td align="center"><?=$rr["b_l_time"]?></td>
    <td align="center"><input type="button" value="刪除"></td>
  </tr>
<?php }while($rr = mysqli_fetch_assoc($ro));?>
</table>
