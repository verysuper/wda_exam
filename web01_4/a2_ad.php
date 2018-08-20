<?php
  //allTitle
  if(isset($_POST['allAd'])){
    for($i=0;$i<count($_POST['id']);$i++){
      $sql="UPDATE ads SET ad='{$_POST['ad'][$i]}',display='0' WHERE id='{$_POST['id'][$i]}'";
      $conn->query($sql);      
    }
    if(!empty($_POST['display'])){
      for($i=0;$i<count($_POST['display']);$i++){
        $sql="UPDATE ads SET display='1' WHERE id='{$_POST['display'][$i]}'";
        $conn->query($sql);
      }
    }
    if(!empty($_POST['del'])){
      for($i=0;$i<count($_POST['del']);$i++){
        $sql="DELETE FROM ads WHERE id='{$_POST['del'][$i]}'";
        $conn->query($sql);
      }
    }
    header('location:admin.php?redo=a2_ad');
  }
  //add
  if(isset($_POST['addAds'])){
    $sql="INSERT INTO ads VALUES(null,'{$_POST['ad']}','1')";
    $conn->query($sql);
  }
  //read
  $sql="SELECT * FROM ads";
  $titles=$conn->query($sql);
?>
<p class="t cent botli">動態文字廣告管理</p>
<form method="post" action="">
<table width="100%">
<tbody>
<tr class="yel">
<td width="80%">動態文字廣告區</td>
<td width="10%">顯示</td>
<td width="10%">刪除</td>
</tr>
<?php
  while($row=$titles->fetch(PDO::FETCH_ASSOC)){
    ?>
      <tr class="yel">
        <td width="80%">
          <input type="text" name="ad[]" value="<?=$row['ad']?>" style="width:90%;"/>
          <input type="hidden" name="id[]" value="<?=$row['id']?>">
        </td>
        <td width="10%"><input type="checkbox" name="display[]" value="<?=$row['id']?>" <?=$row['display']==1?'checked':'';?>/></td>
        <td width="10%"><input type="checkbox" name="del[]" value="<?=$row['id']?>"/></td>
      </tr>
    <?php
  }
?>
</tbody></table>
<table style="margin-top:40px; width:70%;">
<tbody><tr>
<td width="200px"><input type="button" onclick="op('#cover','#cvr','a2_ad_add.php')" value="新增動態文字廣告" /></td><td class="cent">
<input type="submit" value="修改確定" name="allAd">
<input type="reset" value="重置"></td>
</tr>
</tbody></table>    

</form>
