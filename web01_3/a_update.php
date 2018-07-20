<?php
if (isset($_GET['id'])) {
    include_once '_config.php';
    $sql = "select * from titles where id='{$_GET['id']}'";
    $result = $conn->query($sql);
    $row=$result->fetch(PDO::FETCH_ASSOC);
}

?>

<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 0px solid;">
<p class="t cent botli">更新標題區圖片</p>
<form method="post" enctype="multipart/form-data" name="form1"><!--  target="back" action="?do=tii"> -->
<table width="100%">
  <tbody>
  <tr>
    <td width="40%">標題區圖片</td>
    <td width="60%"><input type="file" name="new_title" required></td>
    <td></td>
  </tr>
    <tr>
      <td width="200px"><input type="submit" value="更新" />
        <input type="reset" value="重置" /></td>
    </tr>
  </tbody>
</table>
<input type="hidden" name="action" value="title_update">
<input type="hidden" name="id" value="<?=$row['id']?>">
<input type="hidden" name="o_title" value="<?=$row['title']?>">
</form>
</div>
