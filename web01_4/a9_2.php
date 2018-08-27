<?php
  if(isset($_POST['a9_21'])){
      $sql="INSERT INTO `menu` VALUES(null,'{$_POST['name']}','{$_POST['href']}','{$_POST['parent']}','1')";
      $conn->query($sql);
  }
  if(isset($_POST['a9_2'])){
    for($i=0;$i<count($_POST['id']);$i++){
      $sql="UPDATE `menu` SET name='{$_POST['name'][$i]}',href='{$_POST['href'][$i]}',display='0' WHERE id='{$_POST['id'][$i]}'";
      $conn->query($sql);
    }
    if(isset($_POST['display'])){
      for($i=0;$i<count($_POST['display']);$i++){
        $sql="UPDATE `menu` SET display='1' WHERE id='{$_POST['display'][$i]}'";
        $conn->query($sql);
      }
    }
    if(isset($_POST['del'])){
      for($i=0;$i<count($_POST['del']);$i++){
        $sql="DELETE FROM `menu` WHERE id='{$_POST['del'][$i]}'";
        $conn->query($sql);
      }
    }
  }
?>
<p class="t cent botli">選單管理</p>
<form method="post" action="">
<table width="100%">
<tbody>
  <tr class="yel">
    <td width="45%">次選單名稱</td>
    <td width="23%">次選單連結網址</td>
    <td width="7%">顯示</td>
    <td width="7%">刪除</td>
    <td></td>
  </tr>
  <?php
    $sql="SELECT * FROM `menu` where parent='{$_GET['parent']}'";
    $result=$conn->query($sql);
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      ?>
        <tr class="yel">
          <td width="45%">
            <input type="text" name="name[]" value="<?=$row['name']?>" />
            <input type="hidden" name="id[]" value="<?=$row['id']?>">
          </td>
          <td width="23%">
            <input type="text" name="href[]" value="<?=$row['href']?>" style="width:80%;"/>            
          </td>
          <td width="7%"><input type="checkbox" name="display[]" value="<?=$row['id']?>" <?=$row['display']==1?'checked':'';?>/></td>
          <td width="7%"><input type="checkbox" name="del[]" value="<?=$row['id']?>" /></td>
          <td>
            <!-- <a href="?redo=a9_2&parent=<?=$row['id']?>"><input type="button" value="新增次選單" /></a> -->
          </td>
        </tr>
      <?php
    }
  ?>
</tbody></table>
<table style="margin-top:40px; width:70%;">
<tbody>
<tr>
<td width="200px">
<input type="button" onclick="op('#cover','#cvr','a9_21.php?parent=<?=$_GET['parent']?>')" value="新增次選單"></td><td class="cent">
<input type="submit" value="修改確定" name="a9_2">
<input type="reset" value="重置">
</td>
</tr>
</tbody></table>   
</form>
