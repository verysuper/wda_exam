<?php include_once("head_no_session.php");?>
<?php
  $sql = "select * from a_1_4_marquee where a_1_4_m_look = 1";
  $ro = mysqli_query($link,$sql);
  $rr = mysqli_fetch_assoc($ro);
?>
<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
<?php do{?>
  <?=$rr['a_1_4_m_word']?>　　
<?php }while($rr = mysqli_fetch_assoc($ro));?>
</marquee>
