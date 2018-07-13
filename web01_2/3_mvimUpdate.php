<?php
include_once '0_config.php';
$sql = "select * from mvim where id={$_GET['id']};";
$result = $conn->query($sql);
$row = $result->fetch();
//extract($row);
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto;">
  <p class="t cent botli">更新動畫圖片</p>
  <form method="post" enctype="multipart/form-data">
    <table width="100%">
      <tbody>
        <tr>
          <td width="40%" align="right">動畫圖片</td>
          <td width="60%" align="left"><input name="image" type="file" required/></td>
        </tr>
        <!-- <tr>
          <td width="40%" align="right">標題區替代文字</td>
          <td width="60%" align="left"><input name="alt" type="text" value="" required/></td>
        </tr> -->
        <tr>
          <td width="40%" align="right">
            <input type="submit" value="更新"><input type="reset" value="重置">
          </td>
          <td width="60%" align="left"></td>
        </tr>
      </tbody>
  </table>
  <input type="hidden" name="mvim" value="update_image" /><!-- note:specify action -->
  <input type="hidden" name="id" value="<?=$row['id']?>" /><!-- note:specify Affected id -->
  <input type="hidden" name="o_image" value="<?=$row['image']?>"><!-- note:specify file name -->
  </form>
</div>
