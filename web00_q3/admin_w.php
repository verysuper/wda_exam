<?php
$no = $_GET["no"];
if(!empty($_POST["m_name"])){
  $m_name =$_POST["m_name"];
  $m_lv =$_POST["m_lv"];
  $m_time =$_POST["m_time"];
  $m_fa =$_POST["m_fa"];
  $m_d =$_POST["m_d"];
  $m_con =$_POST["m_con"];
  $m_day = $_POST["m_day"];
  $m_desc = $_POST["m_desc"];
  $m_look = $_POST["m_look"];

  $sql="update move set m_name = '".$m_name."', m_con = '".$m_con."', m_time = '".$m_time."', m_lv = '".$m_lv."', m_day ='".$m_day."', m_fa = '".$m_fa."',m_d = '".$m_d."',m_desc = '".$m_desc."', m_look = '".$m_look."' where m_seq = '".$no."'";
  mysqli_query($link,$sql);
  if(!empty($_FILES["m_pic"]["tmp_name"])){
    $sql="select * from move where m_seq='".$no."'";
    $ro = mysqli_query($link,$sql);
    $rr = mysqli_fetch_assoc($ro);
    $m_pic = $rr["m_pic"];
    copy($_FILES["m_pic"]["tmp_name"],"pic/".$m_pic);
  }
  if(!empty($_FILES["m_u"]["tmp_name"])){
    $sql="select * from move where m_seq='".$no."'";
    $ro = mysqli_query($link,$sql);
    $rr = mysqli_fetch_assoc($ro);
    $m_u = $rr["m_u"];
    copy($_FILES["m_u"]["tmp_name"],"avi/".$m_u);
  }
}


$sql="select * from move where m_seq='".$no."'";
$ro = mysqli_query($link,$sql);
$rr = mysqli_fetch_assoc($ro);

?>

<form method="post" enctype="multipart/form-data">
<table width="100%" border="1" cellspacing="0" cellpadding="3">
  <tr>
    <td width="200" align="center">片名</td>
    <td align="left"><input name="m_name" value="<?=$rr['m_name']?>"></td>
  </tr>
  <tr>
    <td align="center">分級</td>
    <td align="left">
      <select name="m_lv">
        <option value="1" <?php if($rr['m_lv'] == 1){ echo "selected";}?>>普遍級</option>
        <option value="2" <?php if($rr['m_lv'] == 2){ echo "selected";}?>>輔導級</option>
        <option value="3" <?php if($rr['m_lv'] == 3){ echo "selected";}?>>保護級</option>
        <option value="4" <?php if($rr['m_lv'] == 4){ echo "selected";}?>>限制級</option>
      </select>
    </td>
  </tr>
  <tr>
    <td align="center">片長</td>
    <td align="left"><input name="m_time" value="<?=$rr['m_time']?>"></td>
  </tr>
  <tr>
    <td align="center">上映日期</td>
    <td align="left">
      <input type="date" name = "m_day" value="<?=$rr['m_day']?>">
    </td>
  </tr>
  <tr>
    <td align="center">發行商</td>
    <td align="left"><input name="m_fa" value="<?=$rr['m_fa']?>"></td>
  </tr>
  <tr>
    <td align="center">導演</td>
    <td align="left"><input name="m_d" value="<?=$rr['m_d']?>"></td>
  </tr>
  <tr>
    <td align="center">預告片</td>
    <td align="left"><input type="file" name="m_u"></td>
  </tr>
  <tr>
    <td align="center">海報</td>
    <td align="left"><input type="file" name="m_pic"></td>
  </tr>
  <tr>
    <td align="center">排序</td>
    <td align="left"><input name="m_desc" value="<?=$rr['m_desc']?>"></td>
  </tr>
  <tr>
    <td align="center">顯示</td>
    <td align="left">
      <select name="m_look">
        <option value="1" <?php if($rr['m_look'] == 1){ echo "selected";}?>>上檔</option>
        <option value="0" <?php if($rr['m_look'] == 0){ echo "selected";}?>>下檔</option>
      </select>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="left">簡介<br />
      <textarea name="m_con" style="width:980px;height:130px;"><?=$rr['m_con']?></textarea>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="修改"></td>
  </tr>
</table>
</form>
