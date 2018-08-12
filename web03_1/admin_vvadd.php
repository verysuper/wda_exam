<?php
  if(isset($_POST['vvadd'])){
    foreach($_POST as $key=>$value){
      $$key = $value;
      // echo "<br>".$$key;
    }    
    $time=date("YmdHis",time());
    $trailer=$time.".".explode('.',$_FILES['trailer']['name'])[1];
    $poster=$time.".".explode('.',$_FILES['poster']['name'])[1];
    if(copy($_FILES['trailer']['tmp_name'],"imgs/".$trailer) && copy($_FILES['poster']['tmp_name'],"imgs/".$poster)){
      $sql="insert into vv value(
        null,'{$name}','{$lv}','{$videolen}','{$ondate}','{$info}','{$supplier}',
        '{$director}','{$poster}','{$trailer}','{$display}','{$rank}')";
        echo $sql;
      $conn->query($sql);
      header('location:admin.php?redo=admin_vv');
      exit();
    }
  }
?>
<form action="" method="post" enctype="multipart/form-data">
<table width="80%" border="0" align="center">
  <tr>
    <td rowspan="11" valign="top">影片資料</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>片名:</td>
    <td><input type="text" name="name" required /></td>
  </tr>
  <tr>
    <td>分級:</td>
    <td><select name="lv" id="select" required>
      <option value="1">普遍級</option>
      <option value="2">輔導級</option>
      <option value="3">保護級</option>
      <option value="4">限制級</option>
    </select></td>
  </tr>
  <tr>
    <td>片長:</td>
    <td><input type="text" name="videolen" required /></td>
  </tr>
  <tr>
    <td>上映日期:</td>
    <td><input type="date" name="ondate" required /></td>
  </tr>
  <tr>
    <td>發行商:</td>
    <td><input type="text" name="supplier" required /></td>
  </tr>
  <tr>
    <td>導演:</td>
    <td><input type="text" name="director" required /></td>
  </tr>
  <tr>
    <td>預告影片:</td>
    <td><input type="file" name="trailer" required /></td>
  </tr>
  <tr>
    <td>電影海報:</td>
    <td><input type="file" name="poster" required /></td>
  </tr>
  <tr>
    <td>排序:</td>
    <td><input type="text" name="rank" required /></td>
  </tr>
  <tr>
    <td>顯示:</td>
    <td>
      <select name="display">
        <option value="1" >上檔</option>
        <option value="0" >下檔</option>
      </select>
    </td>
  </tr>
  <tr>
    <td valign="top">劇情簡介</td>
    <td colspan="2">
      <textarea name="info" cols="45" rows="5" required></textarea></td>
    </tr>
  <tr>
    <td colspan="3" align="center">
      <input type="submit" name="vvadd" id="button" value="新增" />
      <input type="reset" name="button2" id="button2" value="重置" />
    </td>
  </tr>
</table>

</form>
