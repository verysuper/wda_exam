<?php
  $link=mysqli_connect("localhost","root","","db00_q3");
  mysqli_query($link,"set names utf8");
  $s2 = $_POST["s2"];//日期
  $ss = $_POST["ss"];//索引鍵
  $s3 = 0;
  if(!empty($_POST["s3"])){$s3 = $_POST["s3"];}//預先選取

for($i=1;$i<=5;$i++){
  $sql = "select * from ding_log where d_l_day ='".$s2."' and d_l_m = '".$ss."' and d_l_time = '".$i."'";
  $ro = mysqli_query($link,$sql);
  $totle = mysqli_num_rows($ro);

  $ya[$i] = 20-$totle;
}
  $ttt = strtotime("+6hour");
  $today = date("Y-m-d",$ttt); //抓今天日期(用來判斷訂票時間是否是今天)
  $time = date("H",$ttt); //抓現在時間時分秒(用來判斷訂票場次)
  if( $s2 != $today){
?>
<select name="s3">
  <option>請選擇場次</option>
  <option value="1" <?php if($s3 != 0 ){if($s3==1){echo "selected='selected'";}}?>>14:00~16:00 剩餘座位 <?=$ya[1]?></option>
  <option value="2" <?php if($s3 != 0 ){if($s3==2){echo "selected='selected'";}}?>>16:00~18:00 剩餘座位 <?=$ya[2]?></option>
  <option value="3" <?php if($s3 != 0 ){if($s3==3){echo "selected='selected'";}}?>>18:00~20:00 剩餘座位 <?=$ya[3]?></option>
  <option value="4" <?php if($s3 != 0 ){if($s3==4){echo "selected='selected'";}}?>>20:00~22:00 剩餘座位 <?=$ya[4]?></option>
  <option value="5" <?php if($s3 != 0 ){if($s3==5){echo "selected='selected'";}}?>>22:00~24:00 剩餘座位 <?=$ya[5]?></option>
</select>
<?php
  }else{
?>
<select name="s3">
  <option>請選擇場次</option>
    <?php if($time < 14){?><option value="1" <?php if($s3 != 0 ){if($s3==1){echo "selected='selected'";}}?>>14:00~16:00 剩餘座位 <?=$ya[1]?></option><?php }?>
    <?php if($time < 16){?><option value="2" <?php if($s3 != 0 ){if($s3==2){echo "selected='selected'";}}?>>16:00~18:00 剩餘座位 <?=$ya[2]?></option><?php }?>
    <?php if($time < 18){?><option value="3" <?php if($s3 != 0 ){if($s3==3){echo "selected='selected'";}}?>>18:00~20:00 剩餘座位 <?=$ya[3]?></option><?php }?>
    <?php if($time < 20){?><option value="4" <?php if($s3 != 0 ){if($s3==4){echo "selected='selected'";}}?>>20:00~22:00 剩餘座位 <?=$ya[4]?></option><?php }?>
    <?php if($time < 22){?><option value="5" <?php if($s3 != 0 ){if($s3==5){echo "selected='selected'";}}?>>22:00~24:00 剩餘座位 <?=$ya[5]?></option><?php }?>
</select>
<?php  
  }
?>