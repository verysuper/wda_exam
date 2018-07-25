<?php
  if(!empty($_GET['id']) && !empty($_GET['sum']) && !empty($_GET['topic'])){
    $id=$_GET['id'];
    $sum=$_GET['sum'];
    $topic=$_GET['topic'];
  }else{
    ?><script>document.location.href='?do=que'</script><?php
  }
    $sql="select * from que where parent={$id}";
    $result=$conn->query($sql);
    
?>
<fieldset><legend>目前位置：首頁 > 問卷調查 > <?=$topic?></legend>
<form action="" method="post">
<table width="100%" border="0">
  <tr>
    <td colspan="2"><h3><?=$topic?></h3></td>
  </tr>
  <?php
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      $pollWidth=round(($row['poll']/$sum)*10000)/100;
  ?>
  <tr>
    <td width='50%'><?=$row['topic']?></td>
    <td>
      <div style="width:<?=$pollWidth?>px;height:15px;background-color:#ccc;display:inline-block; "></div>
      <?php echo $row['poll']."票(".$pollWidth."%)";?>
    </td>
  </tr>
  <?php 
    }
  ?>
  <tr>
    <td colspan="2">
      <input type="button" value="返回" onclick="document.location.href='?do=que';">
    </td>
  </tr>
</table>
</form>
</fieldset>
