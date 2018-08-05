<?php
  if(isset($_POST['footer'])){
    $sql="update footer set text='{$_POST['text']}'";
    $conn->query($sql);
    header('location:?redo=admin_bot');
  }
  $sql="select * from footer where id=1";
  $row=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
?>
<form action="" method="post">
<table width="80%" border="0" align="center">
<caption><h1>編輯頁尾版權區</h1></caption>
  <tr>
    <td class="tt ct">頁尾宣告內容</td>
    <td class="pp">
      <input type="text" name="text" value="<?=$row['text']?>" id="text1"/>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" name="footer" id="button" value="送出" />
      <input type="button" value="重設" onclick="clear1()"/>
    </td>
  </tr>
</table>
</form>
<script>
  function clear1(){
    document.getElementById('text1').value="";
  }
</script>
