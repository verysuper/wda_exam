<?php
  if(isset($_POST['rradd'])){
    $pic=time().'.'.explode('.',$_FILES['pic']['name'])[1];
    if(copy($_FILES['pic']['tmp_name'],'imgs/'.$pic)){
      $sql = "insert into rr value(null,'{$_POST['name']}','{$pic}','999','1','1')";
      $conn->query($sql);
    }
  }
  if(isset($_POST['rredit'])){
    $sql="update rr set rrlook='0'";
    $conn->query($sql);
    for($i=0;$i<count($_POST['id']);$i++){
      $sql="update rr set 
      rrname='{$_POST['name'][$i]}',
      rrrank='{$_POST['rank'][$i]}',
      rrani='{$_POST['ani'][$i]}',
      where rrid='{$_POST['id'][$i]}'";
      $conn->query($sql);
    }
    for ($i = 0; $i < count($_POST['look']); $i++) {
      $sql = "update rr set
        rrlook='1' where rrid='{$_POST['look'][$i]}'";
      $conn->query($sql);
    }
    if(isset($_POST['del'])){
      for ($i = 0; $i < count($_POST['del']); $i++) {
          $sql = "delete from rr where rrid='{$_POST['del'][$i]}'";
          $conn->query($sql);
      }
    }
  }
?>
<form action="" method="post">
<table width="100%" border="0" align="center">
  <tr>
    <td>預告片海報</td>
    <td>預告片片名</td>
    <td>預告片排序</td>
    <td>轉場動畫</td>
    <td>操作</td>
  </tr>
  <?php
$sql = "select * from rr";
$result = $conn->query($sql);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
  // print_r($row);
    ?>
        <tr>
          <td>
            <img src="imgs/<?=$row['rrpic']?>" width=50 alt="">
            <input type="hidden" name="id[]" value='<?=$row['rrid']?>'>
          </td>
          <td><input name="name[]" type="text" id="name" value="<?=$row['rrname']?>" required/></td>
          <td><input name="rank[]" type="text" id="rank" value="<?=$row['rrrank']?>" required/></td>
          <td><select name="ani[]" id="ani" required>
            <option value="1" <?=$row['rrani']==1?'selected':''?>>淡入</option>
            <option value="2" <?=$row['rrani']==2?'selected':''?>>縮放</option>
            <option value="3" <?=$row['rrani']==3?'selected':''?>>滑出</option>
          </select></td>
          <td><input type="checkbox" name="look[]" value="<?=$row['rrid']?>" <?=$row['rrlook']==1?'checked':''?>/>
            顯示
            <input type="checkbox" name="del[]" value="<?=$row['rrid']?>" />
            刪除</td>
        </tr>
      <?php
}
?>
    <tr>
    <td colspan="5" align="center">
      <input type="submit" name="rredit" id="button" value="編輯確定" />
      <input type="reset" name="button2" id="button2" value="重設" />
    </td>
    </tr>
</table>

</form>
<hr>
<form action="" method="post" enctype="multipart/form-data">
<table width="80%" border="0" align="center">
  <tr>
    <td>預告片海報
      <input type="file" name="pic" required /></td>
    <td>預告片片名
      <input type="text" name="name" required /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="rradd"  value="新增" />
      <input type="reset" value="重設" /></td>
    </tr>
</table>

</form>
