<?php
  if(isset($_POST['rradd'])){
    $time=date("YmdHis",time());
    $pic=$time.".".explode('.',$_FILES['pic']['name'])[1];
    //echo $pic;
    if(copy($_FILES['pic']['tmp_name'],'imgs/'.$pic)){
      $sql="insert into rr value(null,'{$_POST['name']}','{$pic}','0', '0', '1')";
      $conn->query($sql);
    }
  }
  if(isset($_POST['rredit'])){
    $sql="update rr set display='0'";
    $conn->query($sql);
    if(isset($_POST['name'])){
      for($i=0;$i<count($_POST['name']);$i++){
        $sql = "update rr set name='{$_POST['name'][$i]}' where id='{$_POST['id'][$i]}'";
        $conn->query($sql);
      }
    }
    if (isset($_POST['rank'])) {
        for ($i = 0; $i < count($_POST['rank']); $i++) {
            $sql = "update rr set rank='{$_POST['rank'][$i]}' where id='{$_POST['id'][$i]}'";
            $conn->query($sql);
        }
    }
    if (isset($_POST['display'])) {
        for ($i = 0; $i < count($_POST['display']); $i++) {
            $sql = "update rr set display='1' where id='{$_POST['display'][$i]}'";
            $conn->query($sql);
        }
    }
    if (isset($_POST['del'])) {
        for ($i = 0; $i < count($_POST['del']); $i++) {
            $sql = "delete from rr where id='{$_POST['del'][$i]}'";
            $conn->query($sql);
        }
    }
  }
?>
<div class="mm">
<form action="" method="post">
<table width="80%" border="0" align="center">
  <tr>
    <td colspan="4" align="center"><h5>預告片清單</h5></td>
    </tr>
  <tr>
    <td width="20%">預告片海報</td>
    <td width="20%">預告片片名</td>
    <td width="20%">預告片排序</td>
    <td>操作</td>
    <td>動畫</td>
  </tr>
  <?php
  $sql="select * from rr";
  $rr=$conn->query($sql)->fetchAll();
  //print_r($result);
  for($i=0;$i<count($rr);$i++){
?>
  <tr>
    <td><img src="imgs/<?=$rr[$i]['pic']?>" alt="" width="50%"></td>
    <td><input type="text" name="name[]"  value="<?=$rr[$i]['name']?>" style="width:100px;"/></td>
    <td><input type="text" name="rank[]"  value="<?=$rr[$i]['rank']?>" style="width:100px;"/></td>
    <td>
      <input type="checkbox" name="display[]" value="<?=$rr[$i]['id']?>" <?php if($rr[$i]['display']==1){echo "checked";} ?>/>顯示
      <input type="checkbox" name="del[]"  value="<?=$rr[$i]['id']?>"/>刪除
      <input type="hidden" name="id[]" value="<?=$rr[$i]['id']?>">
    </td>
    <td><select name="select" id="select">
      <option value="1" <?php if($rr[$i]['ani']=='1'){echo "selected";}?>>淡入</option>
      <option value="2" <?php if($rr[$i]['ani']=='2'){echo "selected";}?>>縮放</option>
      <option value="3" <?php if($rr[$i]['ani']=='3'){echo "selected";}?>>滑出</option>
    </select></td>
  </tr>
<?php
  }
  ?>
  <tr>
    <td colspan="4" align="center">
      <input type="submit" name="rredit" id="" value="送出" />
      <input type="reset" name="" id="" value="重設" /></td>
    </tr>
</table>
</form>
<hr>
<form action="" method="post" enctype="multipart/form-data">
<table width="80%" border="0" align="center">
  <tr>
    <td colspan="2" align="center"><h5>新增預告片海報</h5></td>
    </tr>
  <tr>
    <td>預告片海報:
      <input type="file" name="pic" id="fileField" /></td>
    <td>預告片片名:
      <input type="text" name="name" id="textfield" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" name="rradd" id="" value="送出" />
      <input type="reset" name="" id="" value="重設" />
    </td>
    </tr>
</table>

</form>
</div>

