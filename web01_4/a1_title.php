<?php
  //allTitle
  if(isset($_POST['allTitle'])){
    for($i=0;$i<count($_POST['id']);$i++){
      $sql="UPDATE titles SET alt='{$_POST['alt'][$i]}',display='0' WHERE id='{$_POST['id'][$i]}'";
      $conn->query($sql);      
    }
    $sql="UPDATE titles SET display='1' WHERE id='{$_POST['display']}'";
    $conn->query($sql);
    if(!empty($_POST['del'])){
      for($i=0;$i<count($_POST['del']);$i++){
        $sql="DELETE FROM titles WHERE id='{$_POST['del'][$i]}'";
        $conn->query($sql);
      }
    }
    header('location:admin.php');
  }
  //update_pic
  if(isset($_POST['updateTitle'])){
    $name=time().'.'.explode('.',$_FILES['title']['name'])[1];
    if(copy($_FILES['title']['tmp_name'],"imgs/{$name}")){
      $sql="UPDATE titles SET title='{$name}' WHERE id='{$_POST['id']}'";      
      $conn->query($sql);
    }   
  }
  //add
  if(isset($_POST['addTitle'])){
    $name=time().'.'.explode('.',$_FILES['title']['name'])[1];
    if(copy($_FILES['title']['tmp_name'],"imgs/{$name}")){
      $sql="INSERT INTO titles VALUES(null,'{$name}',{$_POST['alt']},'0')";
      $conn->query($sql);
    }    
  }
  //read
  $sql="SELECT * FROM titles WHERE 1";
  $titles=$conn->query($sql);
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
<td>&nbsp;</td>
</tr>
<?php
  while($row=$titles->fetch(PDO::FETCH_ASSOC)){
    ?>
      <tr class="yel">
        <td width="45%">
          <img src="imgs/<?=$row['title']?>" style="width:300px;height:30px;">
          <input type="hidden" name="id[]" value="<?=$row['id']?>">
        </td>
        <td width="23%"><input type="text" name="alt[]" value="<?=$row['alt']?>"/></td>
        <td width="7%"><input type="radio" name="display" value="<?=$row['id']?>" <?=$row['display']==1?'checked':'';?>/></td>
        <td width="7%"><input type="checkbox" name="del[]" value="<?=$row['id']?>"/></td>
        <td>
          <input type="button" onclick="op('#cover','#cvr','a1_title_update.php?id=<?=$row['id']?>')" name="update" value="更新圖片" />
        </td>
      </tr>
    <?php
  }
?>
</tbody></table>
<table style="margin-top:40px; width:70%;">
<tbody><tr>
<td width="200px"><input type="button" onclick="op('#cover','#cvr','a1_title_add.php')" value="新增網站標題圖片" /></td><td class="cent">
<input type="submit" value="修改確定" name="allTitle">
<input type="reset" value="重置"></td>
</tr>
</tbody></table>    

</form>
