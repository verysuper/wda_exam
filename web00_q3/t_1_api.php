<?php
  $link=mysqli_connect("localhost","root","","db00_q3");
  mysqli_query($link,"set names utf8");
//-------------------------------今天日期-------------------------------
  $tt = strtotime("+6hour"); //當前時間 年月日時分秒
  $today = date("Y-m-d",$tt);//去除時分秒
  $tt = strtotime($today);   //去除時分秒後轉成數值
//-------------------------------今天日期-------------------------------
/**************************抓上映日期(上映後3天)**************************/
  $s1 = $_POST["s1"];
  $sql = "select * from move where m_seq = '$s1'";
  $ro = mysqli_query($link,$sql);
  $upday = mysqli_fetch_assoc($ro);
  $ud= $upday["m_day"];

  $select_day1 = date("Y-m-d" , strtotime($ud));
  $select_day2 = date("Y-m-d" , strtotime($ud."+1 day"));
  $select_day3 = date("Y-m-d" , strtotime($ud."+2 day"));
/*=============================設定判斷是否已上映的條件=============================*/
  $ttt1 = strtotime($ud);
  $ttt2 = strtotime($ud."+1day");
  $ttt3 = strtotime($ud."+2day");
/*=============================設定判斷是否已上映的條件=============================*/
  $sel_day1 = "";
  $sel_day2 = "";
  $sel_day3 = "";
  if( $ttt1 >= $tt){
    $uselect = "";
    if(!empty($_POST["s2"])){if($_POST["s2"] == $select_day1){$uselect = "selected='selected'";}}
    $sel_day1 = "<option value='".$select_day1."' ".$uselect.">".$select_day1."</option>";
  }
  if( $ttt2 >= $tt){
    $uselect = "";
    if(!empty($_POST["s2"])){if($_POST["s2"] == $select_day2){ $uselect = "selected='selected'";}}
    $sel_day2 = "<option value='".$select_day2."' ".$uselect.">".$select_day2."</option>";
  }
  if( $ttt3 >= $tt){
    $uselect = "";
    if(!empty($_POST["s2"])){if($_POST["s2"] == $select_day3){ $uselect = "selected='selected'";}}
    $sel_day3 = "<option value='".$select_day3."' ".$uselect.">".$select_day3."</option>";
  }
/**************************抓上映日期(上映後3天)**************************/
?>
          <select name="s2" id="s2" onchange="select2('<?=$s1?>')">
            <option>請選擇日期</option>
<?=$sel_day1?>
<?=$sel_day2?>
<?=$sel_day3?>
          </select>