<?php
$sql = "select * from move";
$ro = mysqli_query($link,$sql);
$rr = mysqli_fetch_assoc($ro);
?>
<p><a href="admin.php?do=admin&amp;redo=vv">新增電影</a></p>
<table width="100%" border="1" cellspacing="0" cellpadding="3">
<?php do{?>
  <tr>
    <td align="center"  width="100"><img src="pic/<?=$rr["m_pic"]?>" width="100"></td>
    <td align="center"><?=$rr["m_name"]?></td>
    <td align="center" width="100">排序<?=$rr["m_desc"]?>  <?php if($rr["m_look"] == 1){echo "上檔中";}else{echo "下檔中";}?></td>
    <td align="center" width="100">
      <a href="admin.php?do=admin&amp;redo=w&no=<?=$rr["m_seq"]?>">修改電影資料</a><br><br>
      <a href="del_move.php?no=<?=$rr["m_seq"]?>">刪除電影</a>
    </td>
  </tr>
<?php }while($rr = mysqli_fetch_assoc($ro));?>
</table>
<p></p>
