
<?php
  if(isset($_POST['set_footer']) && $_POST['set_footer']=='送出'){
    $sql="update footer set footer='{$_POST['content']}'";
    $conn->query($sql);
  }
  $row=$conn->query("select * from footer")->fetch(PDO::FETCH_ASSOC);
?>
<form action="" method="post">
<table width="100%" border="0" align="center">
<caption><h1>編輯頁尾版權區</h1></caption>
  <tr>
    <td class="tt ct">頁尾宣告內容</td>
    <td class="pp"><input type="text" name="content" value="<?=$row['footer']?>" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" name="set_footer" id="button" value="送出" />
      <input type="reset" name="button2" id="button2" value="重設" />
    </td>
  </tr>
</table>
</form>
