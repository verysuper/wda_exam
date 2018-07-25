
<fieldset><legend>目前位置：首頁 > 問卷調查</legend>
<table width="100%" border="0">
  <tr>
    <td width='5%'>編號</td>
    <td>問卷題目</td>
    <td width='10%'>投票總數</td>
    <td width='5%'>結果</td>
    <td width='10%'>狀態</td>
  </tr>
<?php
  $sql="select * from que where parent = 0;";
  $result=$conn->query($sql);
  $no=1;
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    $sql2="select sum(poll) as sum from que where parent = {$row['id']};";
    $result2=$conn->query($sql2);
    $row2=$result2->fetch(PDO::FETCH_ASSOC);
?>
  <tr>
    <td><?=$no++?></td>
    <td><?=$row['topic']?></td>
    <td><?=$row2['sum']?></td>
    <td><a href='?do=que_1&id=<?=$row["id"]?>&sum=<?=$row2['sum']?>&topic=<?=$row['topic']?>'>結果</a></td>
    <td>
      <?php
        if($uType>0){
          ?><a href='?do=que_2&id=<?=$row["id"]?>&topic=<?=$row['topic']?>'>參與投票</a><?php
        }else{
          ?>請先登入<?php
        }
      ?>
    </td>
  </tr>
<?php
  }
?>
</table>

</fieldset>
