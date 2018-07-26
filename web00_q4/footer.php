<?php
 $sql = "select * from myfooter";
 $rr = mysqli_query($link,$sql);
 $rrr = mysqli_fetch_assoc($rr);
?>
<?=$rrr["m_footer"]?>