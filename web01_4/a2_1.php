<?php
  if(isset($_POST['a2_2'])){
    $sql="INSERT INTO `ad` VALUES(null,'{$_POST['name']}','1')";
    $conn->query($sql);
  }
  if(isset($_POST['a2_1'])){
    for($i=0;$i<count($_POST['id']);$i++){
      $sql="UPDATE `ad` SET name='{$_POST['name'][$i]}',display='0' WHERE id='{$_POST['id'][$i]}'";
      $conn->query($sql);
    }
    for($i=0;$i<count($_POST['display']);$i++){
      $sql="UPDATE `ad` SET display='1' WHERE id='{$_POST['display'][$i]}'";
      $conn->query($sql);
    }
    if(isset($_POST['del'])){
      for($i=0;$i<count($_POST['del']);$i++){
        $sql="DELETE FROM `ad` WHERE id='{$_POST['del'][$i]}'";
        $conn->query($sql);
      }
    }
  }
?>
<p class="t cent botli">動態文字廣告管理</p>
<form method="post" action="">
<table width="100%">
<tbody>
  <tr class="yel">
    <td width="89%">動態文字廣告</td>
    <td width="5%">顯示</td>
    <td width="6%">刪除</td>
    </tr>
  <?php
    $sql="SELECT * FROM `ad` ";
    $result=$conn->query($sql);
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      ?>
        <tr class="yel">
          <td width="89%">
            <input type="text" name="name[]" value="<?=$row['name']?>" style="width:80%;"/>
            <input type="hidden" name="id[]" value="<?=$row['id']?>">
          </td>
          <td width="5%"><input type="checkbox" name="display[]" value="<?=$row['id']?>" <?=$row['display']==1?'checked':'';?>/></td>
          <td width="6%"><input type="checkbox" name="del[]" value="<?=$row['id']?>" /></td>
        </tr>
      <?php
    }
  ?>
</tbody></table>
<table style="margin-top:40px; width:70%;">
<tbody>
<tr>
<td width="200px">
<input type="button" onclick="op('#cover','#cvr','a2_2.php')" value="新增動態文字廣告"></td><td class="cent">
<input type="submit" value="修改確定" name="a2_1">
<input type="reset" value="重置">
</td>
</tr>
</tbody></table>   
</form>
