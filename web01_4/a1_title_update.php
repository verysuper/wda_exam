<?php
  if(isset($_GET['id'])){
    include_once '_config.php';
    $sql="SELECT * FROM titles WHERE id='{$_GET['id']}'";
    $title=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);    
  }
?>

<p class="t cent botli">更新標題區圖片</p>
<form action="" method="post" enctype="multipart/form-data">
<table width="50%" border="0" align="center">
  <tr>
    <td>標題區圖片:
      <input type="file" name="title" required/></td>
  </tr>
  <tr>
    <td>
      <input type="hidden" name="id" value="<?=$title['id']?>">
      <input type="submit" name="updateTitle" value="更新" />
      <input type="reset" value="重設" /></td>
  </tr>
</table>
</form>
