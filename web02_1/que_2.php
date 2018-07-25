<?php
  if(!empty($_POST['vote'])){
    $sql="update que set poll = poll+1 where id={$_POST['vote']}";
    $result=$conn->query($sql);
    header('location:index1.php?do=que');
  }
  if(!empty($_GET['id']) && !empty($_GET['topic'])){
    $id=$_GET['id'];
    $topic=$_GET['topic'];

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
  ?>
  <tr>
    <td><input type="radio" name="vote" value="<?=$row['id']?>"></td>
    <td><?=$row['topic']?></td>
  </tr>
  <?php 
    }
  ?>
  <tr>
    <td colspan="2">
      <input type="submit" value="我要投票">
    </td>
  </tr>
</table>
</form>
</fieldset>

<?php
    }else{
    ?><script>document.location.href='?do=que'</script><?php
  }
?>
