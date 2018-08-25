<?php
if (isset($_POST['aque']) && !empty($_POST['topic']) && !empty($_POST['item'])) {
    $sql = "insert into que values(null,'{$_POST['topic']}',0,0)";
    $result = $conn->query($sql);
    $parent = $conn->lastInsertId();//*************** */
    for($i=0;$i<count($_POST['item']);$i++){
      $sql = "insert into que values(null,'{$_POST['item']}','{$parent}',0)";
      $result = $conn->query($sql);
    }
}

?>
<fieldset><legend>問卷管理</legend>
<form action="" method="post">
<table width="100%" border="0">
  <tr>
    <td width='20%'>問卷名稱<input name="topic" ></td>
  </tr>
  <tr>
    <td>
      <sn id="addItem">選項<input name='item[]' /></sn>
      <input type="button" value="更多" onclick="addItem()"/>
    </td>
  </tr>
  <tr>
    <td>
    <input name="" type="submit" value='新增'/>
    <input name="" type="reset" value='清空'/>
    </td>
  </tr>
</table>
<input type="hidden" name="aque">
</form>
</fieldset>
<script>
function addItem(){
  $('#addItem').append('<br>選項<input name="item[]" />');
}
</script>
