<?php
  if(isset($_POST['aqueAdd'])){
    $sql="INSERT INTO que VALUES(null,'{$_POST['topic']}','0','0')";
    $conn->query($sql);
    $parent=$conn->lastInsertId();
    foreach($_POST['item'] as $item){
      $sql="INSERT INTO que VALUES(null,'{$item}','{$parent}','0')";
      $conn->query($sql);
    }
  }
?>
新增問卷
<form action="" method="post">
<table width="80%" border="0" align="center">
  <tr>
    <td>問卷名稱:
      <input type="text" name="topic" required /></td>
  </tr>
  <tr>
    <td>
      <span id="item">選項:<input type="text" name="item[]" /></span>
      <input type="button" name="button3" value="更多" onclick="addItem()"/></td>
  </tr>
  <tr>
    <td><input type="submit" name="aqueAdd" value="新增" />
      <input type="reset" name="button2" value="清空" /></td>
  </tr>
</table>

</form>
<script>
  function addItem(){
    $('#item').append("<br>選項:<input type='text' name='item[]' />")
  }
</script>
