<?php
  if(empty($_GET['redo']) && empty($_GET['id'])){
    header('location:admin.php?redo=admin_vv');
    exit();
  }else{
    $sql="select * from vv where id='{$_GET['id']}'";
    $vv=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC)[0];
    //print_r($vv);
  }
  if(isset($_POST['vvedit'])){
    foreach($_POST as $key=>$value){
      $$key = $value;
    }
    $time=date("YmdHis",time());
    if(!empty($_FILES['trailer']['name'])){
      $trailer=$time.".".explode('.',$_FILES['trailer']['name'])[1];
      copy($_FILES['trailer']['tmp_name'],"imgs/".$trailer);
    }else{
      $trailer=$vv['trailer'];
    }
    if(!empty($_FILES['poster']['name'])){
      $poster=$time.".".explode('.',$_FILES['poster']['name'])[1];
      copy($_FILES['poster']['tmp_name'],"imgs/".$poster);
    }else{
      $poster=$vv['poster'];
    }
    $sql="update vv set name='{$name}',lv='{$lv}',length='{$videolen}',
    ondate='{$ondate}',info='{$info}',supplier='{$supplier}',director='{$director}',
    poster='{$poster}',trailer='{$trailer}',display='{$display}',rank='{$rank}' WHERE id='{$_GET['id']}'";
    echo $sql;
    $conn->query($sql);
    header('location:admin.php?redo=admin_vv');
    exit();
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
    <td><input type="text" name="name" value="<?=$vv['name']?>" required /></td>
  </tr>
  <tr>
    <td>分級:</td>
    <td><select name="lv" id="select" required>
      <option value="1" <?php if($vv['lv']=="1"){echo "selected";}?>>普遍級</option>
      <option value="2" <?php if($vv['lv']=="2"){echo "selected";}?>>輔導級</option>
      <option value="3" <?php if($vv['lv']=="3"){echo "selected";}?>>保護級</option>
      <option value="4" <?php if($vv['lv']=="4"){echo "selected";}?>>限制級</option>
    </select></td>
  </tr>
  <tr>
    <td>片長:</td>
    <td><input type="text" name="videolen" value="<?=$vv['length']?>" required /></td>
  </tr>
  <tr>
    <td>上映日期:</td>
    <td><input type="date" name="ondate" value="<?=$vv['ondate']?>" required /></td>
  </tr>
  <tr>
    <td>發行商:</td>
    <td><input type="text" name="supplier" value="<?=$vv['supplier']?>" required /></td>
  </tr>
  <tr>
    <td>導演:</td>
    <td><input type="text" name="director" value="<?=$vv['director']?>" required /></td>
  </tr>
  <tr>
    <td>預告影片:</td>
    <td><input type="file" name="trailer" />原檔:<?=$vv['trailer']?></td>
  </tr>
  <tr>
    <td>電影海報:</td>
    <td><input type="file" name="poster" />原檔:<?=$vv['poster']?></td>
  </tr>
  <tr>
    <td>排序:</td>
    <td><input type="text" name="rank" value="<?=$vv['rank']?>" required /></td>
  </tr>
  <tr>
    <td>顯示:</td>
    <td>
      <select name="display">
        <option value="1" <?php if($vv['display'] == 1){ echo "selected";}?>>上檔</option>
        <option value="0" <?php if($vv['display'] == 0){ echo "selected";}?>>下檔</option>
      </select>
    </td>
  </tr>
  <tr>
    <td valign="top">劇情簡介</td>
    <td colspan="2">
      <textarea name="info" cols="45" rows="5" required><?=$vv['info']?></textarea></td>
    </tr>
  <tr>
    <td colspan="3" align="center">
      <input type="submit" name="vvedit" id="button" value="修改" />
      <input type="reset" name="button2" id="button2" value="重置" />
    </td>
  </tr>
</table>

</form>
