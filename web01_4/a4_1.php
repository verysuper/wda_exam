<?php
  if(isset($_POST['a4_2'])){
    $name=time().'.'.explode('.',$_FILES['file']['name'])[1];
    if(copy($_FILES['file']['tmp_name'],"imgs/{$name}")){
      $sql="INSERT INTO `image` VALUES(null,'{$name}','1')";
      $conn->query($sql);
    }
  }
  if(isset($_POST['a4_3'])){
    copy($_FILES['file']['tmp_name'],"imgs/{$_POST['name']}");
  }
  if(isset($_POST['a4_1'])){
    for($i=0;$i<count($_POST['id']);$i++){
      $sql="UPDATE `image` SET display='0' WHERE id='{$_POST['id'][$i]}'";
      $conn->query($sql);
    }
    if(isset($_POST['display'])){
      for($i=0;$i<count($_POST['display']);$i++){
        $sql="UPDATE `image` SET display='1' WHERE id='{$_POST['display'][$i]}'";
        $conn->query($sql);
      }
    }
    if(isset($_POST['del'])){
      for($i=0;$i<count($_POST['del']);$i++){
        $sql="DELETE FROM `image` WHERE id='{$_POST['del'][$i]}'";
        $conn->query($sql);
      }
    }
  }
?>
<p class="t cent botli">校園映像區管理</p>
<form method="post" action="">
<table width="100%">
<tbody>
  <tr class="yel">
    <td width="70%">校園映像區圖片</td>
    <td width="8%">顯示</td>
    <td width="7%">刪除</td>
    <td width="15%"></td>
  </tr>
  <?php
    $sql="SELECT * FROM `image` ";
    $imgArr=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $p=1;
    if(isset($_GET['p'])){
      $p=$_GET['p'];
    }
    $start=($p-1)*3;
    $end=count($imgArr);
    for($i=$start;$i<$start+3;$i++){
      if($i<$end){
      ?>
        <tr class="yel">
          <td width="70%">
            <embed src="imgs/<?=$imgArr[$i]['name']?>" type="" style="width:100px; height:68px;">
            <input type="hidden" name="id[]" value="<?=$imgArr[$i]['id']?>">
          </td>
          <td width="8%"><input type="checkbox" name="display[]" value="<?=$imgArr[$i]['id']?>" <?=$imgArr[$i]['display']==1?'checked':'';?>/></td>
          <td width="7%"><input type="checkbox" name="del[]" value="<?=$imgArr[$i]['id']?>" /></td>
          <td><input type="button" onclick="op('#cover','#cvr','a3_3.php?name=<?=$imgArr[$i]['name']?>')" value="更新圖片" /></td>
        </tr>
      <?php
      }
    }
      ?>
</tbody></table>
<?php
  $totalp=ceil($end/3);
  $last=$p-1;
  $next=$p+1;
  ?><a href="?redo=a4_1&p=<?=$last>0?$last:1;?>" style="font-size:30px;"><</a><?php
  for($i=1;$i<=$totalp;$i++){
    if($i==$p){
      ?><a href="?redo=a4_1&p=<?=$i?>" style="font-size:30px;"><?=$i?></a><?php
    }else{
      ?><a href="?redo=a4_1&p=<?=$i?>" style="font-size:20px;"><?=$i?></a><?php
    }    
  }
  ?><a href="?redo=a4_1&p=<?=$next<=$totalp?$next:$totalp;?>" style="font-size:30px;">></a><?php
?>
<table style="margin-top:40px; width:70%;">
<tbody>
<tr>
<td width="200px">
<input type="button" onclick="op('#cover','#cvr','a4_2.php')" value="新增動畫圖片"></td><td class="cent">
<input type="submit" value="修改確定" name="a4_1">
<input type="reset" value="重置">
</td>
</tr>
</tbody></table>   
</form>
