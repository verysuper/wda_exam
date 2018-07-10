<?php include_once("head_no_session.php");?>
<?php
  $sql = "select * from a_1_7_total";
  $ro = mysqli_query($link,$sql);
  $rr = mysqli_fetch_assoc($ro);
  echo $rr['a_1_7_t_cnt'];
?>