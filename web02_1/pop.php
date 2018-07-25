<style>
  #artAll{
    display:none;
    width:350px;
    height:200px; /* 越小越好，若超出 fieldset 產生scroll 造成一直抖現象 */
    overflow:auto;
    background-color:#333333e3;
    color:#fff;
    position:absolute;
  }
  #artLimit:hover #artAll{
    display:block;
  }
</style>
<fieldset><legend>目前位置：首頁 > 人氣文章區</legend>
<table width="100%" border="0">
  <tr>
    <td>標題</td>
    <td>內容</td>
    <td>人氣</td>
  </tr>
<?php
    $result=$conn->query("select * from article where display=1");
    $amount=$result->rowCount();
    $pItems=5;
    
    $pCurr=1;
    if(!empty($_GET['p'])){
      $pCurr=$_GET['p'];
    }
    $start=$pCurr*$pItems-$pItems;
    $sql="select * from article where display=1  ORDER BY ilike DESC limit {$start},{$pItems}";
    $result=$conn->query($sql);
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
?>
  <tr>
    <td width='30%' bgcolor='#ccc'><?=$row['title']?></td>
    <td>      
      <div id='artLimit'>
        <?=mb_substr($row['content'],0,20)?>...
        <div id='artAll'>
          <span style="color:#a9f4ff;"><?=$row["title"]?></span>
          <?=$row['content']?>
        </div>
      </div>      
    </td>
    <td width='20%'>
      <?=$row['ilike']?>個人說<img src="icon/02B03.jpg" width='20'>
    <?php
      if($uType>0){
        // 檢查使用者有沒有給這個文章讚
        // 使用素材js.js附的good function，值為文章id、讚(1)或收回(2)、使用者帳號
        // 超連結id必須是good加文章id
        $sql2="select * from ilike where acc='{$_SESSION['acc']}' and a_id='{$row['id']}'";
        $result2=$conn->query($sql2);
        if($result2->rowCount()>0){
          ?>-<a onclick="good('<?=$row['id']?>', '2', '<?=$_SESSION["acc"]?>')" id="good<?=$row['id']?>">收回讚</a><?php
        }else{
          ?>-<a onclick="good('<?=$row['id']?>', '1', '<?=$_SESSION["acc"]?>')" id="good<?=$row['id']?>">讚</a><?php
        }
      }
    ?>
    </td>
  </tr>
<?php
    }
?>
    <tr>
    <td colspan="3">
<?php
    $pTotal=ceil($amount/$pItems);
    $last=$pCurr-1;
    $next=$pCurr+1;
    if($last >= 1){
      echo "<a href='?do=pop&p={$last}' style='font-size:30px'><</a>";
    }
    for($i=1;$i<=$pTotal;$i++){
        echo "<a href='?do=pop&p={$i}' style='font-size:".($i==$pCurr?'50px':'30px').";'>{$i}</a>";
    }
    if ($next <= $pTotal) {
      echo "<a href='?do=pop&p={$next}' style='font-size:30px'>></a>";
    }
?>
    </td>
    </tr>
</table>
</fieldset>
