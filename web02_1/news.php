<?php
  $result=$conn->query("select * from article where display= 1 ");
  $pEvery=5;
  $pTotal=ceil($result->rowCount()/$pEvery);
  $pCurrent=1;
  if(!empty($_GET['p'])){
    $pCurrent=$_GET['p'];
  }
  $pStart=($pCurrent-1)*$pEvery;
  $result=$conn->query("select * from article where display = 1 limit {$pStart},{$pEvery}")
?>
<fieldset><legend>目前位置:首頁 > 最新文章區</legend>
<table width="600" border="0" align="center">
  <tr>
    <td width="40%">標題</td>
    <td>內容</td>
  </tr>
  <?php
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
  ?>
  <tr>
    <td width="40%"><?=$row['title']?></td>
    <td><?=mb_substr($row['content'],0,10)?></td>
  </tr>
  <?php
    }
  ?>
</table>

</fieldset>
