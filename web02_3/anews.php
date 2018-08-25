<?php
  if(isset($_POST['anewsEdit'])){ 
    foreach($_POST['id'] as $id){
      $sql="UPDATE article SET display='0' where id='{$id}'" ;
      $conn->query($sql);
    }   
    if(isset($_POST['display'])){ 
      foreach($_POST['display'] as $id){
        $sql="UPDATE article SET display='1' where id='{$id}'" ;
        $conn->query($sql);
      }
    }   
    if(isset($_POST['del'])){
      foreach($_POST['del'] as $id){
        $sql="DELETE FROM article WHERE id='{$id}'" ;
        $conn->query($sql);
      }  
    } 
  }
  $sql="SELECT * FROM article";
  $artArr=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  // print_r($artArr);
  $p=1;
  if(!empty($_GET['p'])){
    $p=$_GET['p'];
  }
  $start=($p-1)*3;
  $end=count($artArr);  
?>
<form action="" method="post"><table width="100%" border="1" align="center">
  <tr>
    <td width="20%">編號</td>
    <td width="60%">標題</td>
    <td width="10%">顯示</td>
    <td width="10%">刪除</td>
  </tr>
<?php
  for($i=$start;$i<$start+3;$i++){
    if($i<$end){
      ?>
  <tr>
    <td><?=$i?></td>
    <td><?=$artArr[$i]['name']?><input type="hidden" name="id[]" value="<?=$artArr[$i]['id']?>"></td>
    <td><input type="checkbox" name="display[]" value="<?=$artArr[$i]['id']?>" <?=$artArr[$i]['display']==1?'checked':'';?>/></td>
    <td><input type="checkbox" name="del[]" value="<?=$artArr[$i]['id']?>" /></td>
  </tr>
      <?php
    }
  }
?>
<tr>
  <td colspan="4">
    <input type="submit" name="anewsEdit" id="button" value="確定修改" />
  </td>
  </tr>
</table></form>
<?php
  $last=$p-1;
  $next=$p+1;
  $totalp=ceil($end/3);
  ?><a href="?do=anews&p=<?=$last>0?$last:1;?>" style="font-size:30px;"><</a><?php
  for($i=1;$i<=$totalp;$i++){
    if($i==$p){
      ?><a href="?do=anews&p=<?=$i?>" style="font-size:30px;"><?=$i?></a><?php
    }else{
      ?><a href="?do=anews&p=<?=$i?>" style="font-size:10px;"><?=$i?></a><?php
    }
  }
  ?><a href="?do=anews&p=<?=$next<=$totalp?$next:$totalp;?>" style="font-size:30px;">></a><?php
?>
