<?php include_once("head_no_session.php");?>
<?php
  if(empty($_SESSION["gg"])){
    $_SESSION["gg"] = 1;
    $sql = "update a_1_7_total set a_1_7_t_cnt = a_1_7_t_cnt + 1";
    mysqli_query($link,$sql);
  }
  $sql = "select * from a_1_7_total";
  $ro = mysqli_query($link,$sql);
  $rr = mysqli_fetch_assoc($ro);
  echo $rr['a_1_7_t_cnt'];
?>