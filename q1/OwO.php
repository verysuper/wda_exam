<?php include_once("head.php");?>
<?php
  $sql = "select * from a_1_5_mv_pic where a_1_5_m_p_look = 1";
  $oo = mysqli_query($link,$sql);
  $ox = mysqli_fetch_assoc($oo);
  $oxo = mysqli_num_rows($oo);
  $now_pic = 0;
  do{
?>
            lin[<?=$now_pic?>]="jnbnbiuer9utw50/<?=$ox['a_1_5_m_p_pic']?>";
<?php
    $now_pic = $now_pic + 1;
  }while($ox = mysqli_fetch_assoc($oo));
?>
