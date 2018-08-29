<?php
  if(isset($_POST['a7_2'])){
    $sql="INSERT INTO `news` VALUES(null,'{$_POST['name']}','1')";
    $conn->query($sql);
  }
  if(isset($_POST['a7_1'])){
    for($i=0;$i<count($_POST['id']);$i++){
      $sql="UPDATE `news` SET name='{$_POST['name'][$i]}',display='0' WHERE id='{$_POST['id'][$i]}'";
      $conn->query($sql);
    }
    for($i=0;$i<count($_POST['display']);$i++){
      $sql="UPDATE `news` SET display='1' WHERE id='{$_POST['display'][$i]}'";
      $conn->query($sql);
    }
    if(isset($_POST['del'])){
      for($i=0;$i<count($_POST['del']);$i++){
        $sql="DELETE FROM `news` WHERE id='{$_POST['del'][$i]}'";
        $conn->query($sql);
      }
    }
  }
?>
<p class="t cent botli">最新消息區管理</p>
<form method="post" action="">
<table width="100%">
<tbody>
  <tr class="yel">
    <td width="89%">最新消息</td>
    <td width="5%">顯示</td>
    <td width="6%">刪除</td>
    </tr>
  <?php
    $sql="SELECT * FROM `news` ";
    $newsArr=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $p=1;
    if(isset($_GET['p'])){
      $p=$_GET['p'];
    }
    $start=($p-1)*5;
    $end=count($newsArr);
    for($i=$start;$i<$start+5;$i++){
      if($i<$end){
      ?>
        <tr class="yel">
          <td width="89%">            
            <textarea name="name[]" id="textarea" cols="45" rows="5"><?=$newsArr[$i]['name']?></textarea>
            <input type="hidden" name="id[]" value="<?=$newsArr[$i]['id']?>">
          </td>
          <td width="5%"><input type="checkbox" name="display[]" value="<?=$newsArr[$i]['id']?>" <?=$newsArr[$i]['display']==1?'checked':'';?>/></td>
          <td width="6%"><input type="checkbox" name="del[]" value="<?=$newsArr[$i]['id']?>" /></td>
        </tr>  
      <?php
      }
    }
      ?>
</tbody></table>
<?php
  $totalp=ceil($end/5);
  $last=$p-1;
  $next=$p+1;
  ?><a href="?redo=a7_1&p=<?=$last>0?$last:1;?>" style="font-size:30px;"><</a><?php
  for($i=1;$i<=$totalp;$i++){
    if($i==$p){
      ?><a href="?redo=a7_1&p=<?=$i?>" style="font-size:30px;"><?=$i?></a><?php
    }else{
      ?><a href="?redo=a7_1&p=<?=$i?>" style="font-size:20px;"><?=$i?></a><?php
    }    
  }
  ?><a href="?redo=a7_1&p=<?=$next<=$totalp?$next:$totalp;?>" style="font-size:30px;">></a><?php
?>
<table style="margin-top:40px; width:70%;">
<tbody>
<tr>
<td width="200px">
<input type="button" onclick="op('#cover','#cvr','a7_2.php')" value="新增動態文字廣告"></td><td class="cent">
<input type="submit" value="修改確定" name="a7_1">
<input type="reset" value="重置">
</td>
</tr>
</tbody></table>   
</form>
