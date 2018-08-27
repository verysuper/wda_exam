<?php
  if(isset($_POST['a1_2'])){
    $name=time().'.'.explode('.',$_FILES['file']['name'])[1];
    if(copy($_FILES['file']['tmp_name'],"imgs/{$name}")){
      $sql="INSERT INTO `title` VALUES(null,'{$name}','{$_POST['alt']}','0')";
      $conn->query($sql);
    }
  }
  if(isset($_POST['a1_3'])){
    copy($_FILES['file']['tmp_name'],"imgs/{$_POST['name']}");
  }
  if(isset($_POST['a1_1'])){
    for($i=0;$i<count($_POST['id']);$i++){
      $sql="UPDATE `title` SET alt='{$_POST['alt'][$i]}',display='0' WHERE id='{$_POST['id'][$i]}'";
      $conn->query($sql);
    }
    for($i=0;$i<count($_POST['display']);$i++){
      $sql="UPDATE `title` SET display='1' WHERE id='{$_POST['display'][$i]}'";
      $conn->query($sql);
    }
    if(isset($_POST['del'])){
      for($i=0;$i<count($_POST['del']);$i++){
        $sql="DELETE FROM `title` WHERE id='{$_POST['del'][$i]}'";
        $conn->query($sql);
      }
    }
  }
?>
<p class="t cent botli">網站標題管理</p>
<form method="post" action="">
<table width="100%">
<tbody>
  <tr class="yel">
    <td width="45%">網站標題</td>
    <td width="23%">替代文字</td>
    <td width="7%">顯示</td>
    <td width="7%">刪除</td>
    <td></td>
  </tr>
  <?php
    $sql="SELECT * FROM `title` ";
    $result=$conn->query($sql);
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      ?>
        <tr class="yel">
          <td width="45%">
            <embed src="imgs/<?=$row['name']?>" type="" style="width:300px; height:30px;">
            <input type="hidden" name="id[]" value="<?=$row['id']?>">
          </td>
          <td width="23%">
            <input type="text" name="alt[]" value="<?=$row['alt']?>" style="width:80%;"/>            
          </td>
          <td width="7%"><input type="radio" name="display[]" value="<?=$row['id']?>" <?=$row['display']==1?'checked':'';?>/></td>
          <td width="7%"><input type="checkbox" name="del[]" value="<?=$row['id']?>" /></td>
          <td><input type="button" onclick="op('#cover','#cvr','a1_3.php?name=<?=$row['name']?>')" value="更新圖片" /></td>
        </tr>
      <?php
    }
  ?>
</tbody></table>
<table style="margin-top:40px; width:70%;">
<tbody>
<tr>
<td width="200px">
<input type="button" onclick="op('#cover','#cvr','a1_2.php')" value="新增網站標題圖片"></td><td class="cent">
<input type="submit" value="修改確定" name="a1_1">
<input type="reset" value="重置">
</td>
</tr>
</tbody></table>   
</form>
