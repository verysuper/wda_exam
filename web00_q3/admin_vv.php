<?php
if(!empty($_POST["m_name"])){
  $m_name =$_POST["m_name"];
  $m_lv =$_POST["m_lv"];
  $m_time =$_POST["m_time"];
  $m_fa =$_POST["m_fa"];
  $m_d =$_POST["m_d"];
  $m_con =$_POST["m_con"];
  $m_day = $_POST["m_day"];
  $m_pic = date("YmdHis",$tt).".png";
  $m_u = date("YmdHis",$tt).".avi";
  $sql="insert into move value(null,'".$m_name."','".$m_con."','".$m_time."','".$m_lv."','".$m_day."','".$m_fa."','".$m_d."','".$_FILES["m_u"]["name"]."','".$m_pic."','0','0')";
  mysqli_query($link,$sql);
  copy($_FILES["m_pic"]["tmp_name"],"pic/".$m_pic);
  copy($_FILES["m_u"]["tmp_name"],"avi/".$m_u);
}
?>

<form method="post" enctype="multipart/form-data">
<table width="100%" border="1" cellspacing="0" cellpadding="3">
  <tr>
    <td width="200" align="center">片名</td>
    <td align="left"><input name="m_name"></td>
  </tr>
  <tr>
    <td align="center">分級</td>
    <td align="left">
      <select name="m_lv">
        <option value="1">普遍級</option>
        <option value="2">輔導級</option>
        <option value="3">保護級</option>
        <option value="4">限制級</option>
      </select>
    </td>
  </tr>
  <tr>
    <td align="center">片長</td>
    <td align="left"><input name="m_time"></td>
  </tr>
  <tr>
    <td align="center">上映日期</td>
    <td align="left">
      <input type="date" name = "m_day">
    </td>
  </tr>
  <tr>
    <td align="center">發行商</td>
    <td align="left"><input name="m_fa"></td>
  </tr>
  <tr>
    <td align="center">導演</td>
    <td align="left"><input name="m_d"></td>
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
    <td colspan="2" align="left">簡介<br />
      <textarea name="m_con" style="width:980px;height:130px;"></textarea>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="新增"></td>
  </tr>
</table>
</form>
