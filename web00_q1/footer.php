<?php include_once("head_no_session.php");?>
<?php
  $sql = "select * from a_1_8_bottom";
  $ro = mysqli_query($link,$sql);
  $rr = mysqli_fetch_assoc($ro);
  echo $rr['a_1_7_t_footer'];
?>
