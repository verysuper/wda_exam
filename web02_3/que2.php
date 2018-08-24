<?php
  if(isset($_POST['poll'])){
  $sql="UPDATE que SET vote=vote+1 WHERE id='{$_POST['radio']}'";
  $conn->query($sql);
  header('location:index1.php?do=que');
  }
  foreach($_GET as $key => $value){
    $$key=$value;
  }
  $sql="SELECT * FROM que where parent='{$id}'";
  $que = $conn->query($sql);
?>
<p>目前位置：首頁 > 問卷調查 > <?=$topic?></p>
<form action="" method="post">
<table width="100%" border="0" align="center">
  <tr>
    <td colspan="2"><?=$topic?></td>
    </tr>
  <?php
  while($row=$que->fetch(PDO::FETCH_ASSOC)){
?>
  <tr>
    <td width="8%">
      <input type="radio" name="radio" value="<?=$row['id']?>" />
    </td>
    <td width="92%">
      <?=$row['topic']?>
    </td>
  </tr>
<?php
  }
  ?>

  <tr>
    <td colspan="2" align="center">
      <input type="hidden" name="">
      <input type="submit" name="poll" value="我要投票" />
    </td>
  </tr>
</table>

</form>
