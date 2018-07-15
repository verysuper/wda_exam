<?php
  if(!empty($_POST['count'])){
    $sql="update total set count = '{$_POST['count']}' ;";
    $result = $conn->query($sql);
    header("location:admin.php?redo=total");
  } 
?>
<p class="t cent botli">進站總人數管理</p>
<form action="" method="post">
<table align='center'>
<tr class="yel">
  <td>進佔總人數</td>
  <td><input type="text" name="count" value="<?=$total['count']?>"></td>
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
