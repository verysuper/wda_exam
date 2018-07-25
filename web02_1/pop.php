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
    $pTotal=ceil($amount/$pItems);
    $pCurr=1;
    if(!empty($_GET['p'])){
      $pCurr=$_GET['p'];
    }
    $start=$pCurr*$pItems-$pItems;
    $sql="select * from article where display=1  ORDER BY ilike ASC limit {$start},{$pItems}";
    $result=$conn->query($sql);
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
?>
  <tr>
    <td width='30%' bgcolor='#ccc'><?=$row['title']?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
<?php
    }
?>
    <tr>
    <td colspan="3">&nbsp;</td>
    </tr>
</table>
</fieldset>
