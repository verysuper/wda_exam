<?php
  if(!empty($_POST['content'])){
    $sql="update bottom set content = '{$_POST['content']}' ;";
    $result = $conn->query($sql);
    header("location:admin.php?redo=bottom");
  } 
?>
<p class="t cent botli">頁尾版權資料管理</p>
<form action="" method="post">
<table align='center'>
<tr class="yel">
  <td>頁尾版權資料</td>
  <td><input type="text" name="content" value="<?=$bottom['content']?>"></td>
</tr>
</table>
  <table style="margin-top:40px; width:70%;">
    <tbody>
      <tr>
        <td width="200px">
          <!-- <input type="button" onclick="op('#cover','#cvr','3_mvimAdd.php')" value="新增動畫圖片"> -->
        </td>
        <td class="cent">
          <input type="submit" value="修改確定"><input type="reset" value="重置">
        </td>
      </tr>
      </tbody>
  </table>
</form>
