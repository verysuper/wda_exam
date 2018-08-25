<?php
  foreach($_GET as $key => $value){
    $$key=$value;
  }
  $sql="SELECT * FROM que where parent='{$id}'";
  $que = $conn->query($sql);
?>
<p>目前位置：首頁 > 問卷調查 > <?=$topic?></p>

<table width="100%" border="0" align="center">
  <tr>
    <td colspan="2"><?=$topic?></td>
  </tr>
<?php
  while($row=$que->fetch(PDO::FETCH_ASSOC)){
    $voteWid=round(($row['vote']/$sum)*10000)/100;
    ?>
  <tr>
    <td width=40%><?=$row['topic']?></td>
    <td>
      <div style="width: <?=$voteWid?>px;	height: 20px;	display: inline-block;	background: #000;"></div>
      <?=$row['vote']?>票(<?=$voteWid?>%)
    </td>
  </tr>
    <?php
  }
?>
  <tr>
    <td colspan="2" align="center"><a href="?do=que"><input type="button" value="返回""></a></td>
  </tr>
</table>
