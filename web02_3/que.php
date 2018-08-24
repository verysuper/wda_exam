目前位置：首頁   >  問卷調查

<table width="100%" border="0" align="center">
  <tr>
    <td width="6%">編號</td>
    <td width="62%">問卷題目</td>
    <td width="11%">投票總數</td>
    <td width="6%">結果</td>
    <td width="15%">狀態</td>
  </tr>
  <?php
    $sql="SELECT * FROM que WHERE parent='0'";
    $result=$conn->query($sql);
    $no=0;
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      $no++;
      $sql2="SELECT sum(vote) as sum FROM que WHERE parent='{$row['id']}'";
      $vote=$conn->query($sql2)->fetch(PDO::FETCH_ASSOC);
      ?>
  <tr>
    <td><?=$no?></td>
    <td><?=$row['topic']?></td>
    <td><?=$vote['sum']?></td>
    <td>
      <a href="?do=que1&id=<?=$row['id']?>&topic=<?=$row['topic']?>&sum=<?=$vote['sum']?>">
      結果
      </a>
    </td>
    <td>
      <?php
        if(!$utype>0){
          echo "請先登入";
        }else{
          ?><a href="?do=que2&id=<?=$row['id']?>&topic=<?=$row['topic']?>">參與投票</a><?php
        }
      ?>
    </td>
  </tr>
      <?php
    }
  ?>

</table>
