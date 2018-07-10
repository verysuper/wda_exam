<?php include_once("head_no_session.php");?>
<?php
  $sql = "select * from a_1_3_title_pic where a_1_3_t_p_look = 1";
  $ro = mysqli_query($link,$sql);
  $rr = mysqli_fetch_assoc($ro);
?>
<a href="/"><img src="nfgkjewqrhto3ty23984rh9fh32f/<?=$rr['a_1_3_t_p_title']?>" width="1024" height="100" alt="<?=$rr['a_1_3_t_p_alt']?>" title="<?=$rr['a_1_3_t_p_alt']?>"></a>