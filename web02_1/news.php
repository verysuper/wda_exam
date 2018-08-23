<fieldset><legend>目前位置：首頁 > 最新文章區</legend>
<table width="100%" border="0">
  <tr>
    <td width='30%'>標題</td>
    <td>內容</td>
    <td></td>
  </tr>
  <?php
    $result=$conn->query("select * from article where display=1");
    $amount=$result->rowCount();
    $pItems=5;
    $pTotal=ceil($amount/$pItems);
    $pCurr=1;
    if(!empty($_GET['p'])){
      $pCurr=$_GET['p'];
    }
    $start=$pCurr*$pItems-$pItems;
    $result=$conn->query("select * from article where display=1 limit {$start},{$pItems}");
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
    ?>
  <tr>
    <td width='30%' bgcolor='#ccc'><?=$row['title']?></td>
    <td>
    <?php 
    if(!empty($_GET['id']) && $_GET["id"] == $row["id"]){
      ?>
      <pre><?=$row['content']?></pre>      
      <?php
    }else{?>
      <a href="?do=news&p=<?=$pCurr?>&id=<?=$row['id']?>"><?=mb_substr($row['content'],0,20)?>...</a>
    <?php }
    ?>
    </td>
    <td>
    <?php
      if($uType>0){
        // 檢查使用者有沒有給這個文章讚
        // 使用素材js.js附的good function，值為文章id、讚(1)或收回(2)、使用者帳號
        // 超連結id必須是good加文章id
        $sql2="select * from ilike where acc='{$_SESSION['acc']}' and a_id='{$row['id']}'";
        $result2=$conn->query($sql2);
        if($result2->rowCount()>0){
          ?>
            <a onclick="good('<?=$row['id']?>', '2', '<?=$_SESSION['acc']?>')" id="good<?=$row['id']?>">收回讚</a>
          <?php
        }else{
          ?>
            <a onclick="good('<?=$row['id']?>', '1', '<?=$_SESSION['acc']?>')" id="good<?=$row['id']?>">讚</a>
          <?php
        }
      }
    ?>
    </td>
  </tr>
    <?php }?>
    <tr>
    <td colspan="3">
<?php
    $last=$pCurr-1;
    $next=$pCurr+1;
    if($last >= 1){
      echo "<a href='?do=news&p={$last}' style='font-size:30px'><</a>";
    }
    for($i=1;$i<=$pTotal;$i++){
        echo "<a href='?do=news&p={$i}' style='font-size:".($i==$pCurr?'50px':'30px').";'>{$i}</a>";
    }
    if ($next <= $pTotal) {
      echo "<a href='?do=news&p={$next}' style='font-size:30px'>></a>";
    }
?>
    </td>
    </tr>
</table>

</fieldset>
