<?php
  $sql="SELECT * FROM article WHERE display=1";
  $artArr=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  // print_r($artArr);
  $p=1;
  if(!empty($_GET['p'])){
    $p=$_GET['p'];
  }
  $start=($p-1)*5;
  $end=count($artArr);  
?>
目前位置：首頁 > 最新文章區
<table width="100%" border="1" align="center">
  <tr>
    <td width="20%">標題</td>
    <td width="70%">內容</td>
    <td width="10%">&nbsp;</td>
  </tr>
<?php
  for($i=$start;$i<$start+5;$i++){
    if($i<$end){
      ?>
  <tr>
    <td><?=$artArr[$i]['name']?></td>
    <td>
      <?php
        if(!empty($_GET['id']) && $_GET['id']==$artArr[$i]['id']){
          ?><?=$artArr[$i]['content']?><?php
        }else{
          ?><a href="?do=news&p=<?=$p?>&id=<?=$artArr[$i]['id']?>"><?=mb_substr($artArr[$i]['content'],0,30)?>...</a><?php
        }
      ?>
    </td>
    <td><!-- *************** -->
        <?php
          if($utype>0){
            $goodSql="SELECT * FROM log_good where acc='{$_SESSION['acc']}' and art='{$artArr[$i]['id']}'";
            $good=$conn->query($goodSql)->fetch(PDO::FETCH_ASSOC);
            if($good){
              // print_r($good);
              ?><a onclick="good('<?=$artArr[$i]['id']?>','2','<?=$_SESSION['acc']?>')" id='good<?=$artArr[$i]['id']?>'>回收讚</a><?php
            }else{
              ?><a onclick="good('<?=$artArr[$i]['id']?>','1','<?=$_SESSION['acc']?>')" id='good<?=$artArr[$i]['id']?>'>讚</a><?php
            }
          }
        ?>
    </td>
  </tr>
      <?php
    }
  }
?>

</table>
<?php
  $last=$p-1;
  $next=$p+1;
  $totalp=ceil($end/5);
  ?><a href="?do=news&p=<?=$last>0?$last:1;?>" style="font-size:30px;"><</a><?php
  for($i=1;$i<=$totalp;$i++){
    if($i==$p){
      ?><a href="?do=news&p=<?=$i?>" style="font-size:30px;"><?=$i?></a><?php
    }else{
      ?><a href="?do=news&p=<?=$i?>" style="font-size:10px;"><?=$i?></a><?php
    }
  }
  ?><a href="?do=news&p=<?=$next<=$totalp?$next:$totalp;?>" style="font-size:30px;">></a><?php
?>
