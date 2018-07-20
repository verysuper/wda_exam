<?php
//___________update
if (isset($_POST['action']) && $_POST['action'] == 'title_update') {
    if (!empty($_POST['id']) && !empty($_FILES['new_title'])) {
        $title = strtotime('now') . "." . end(explode(".", $_FILES['new_title']['name']));
        echo $title;
    }
}
//___________read
$sql = "select * from titles";
$result = $conn->query($sql);
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
<p class="t cent botli">網站標題管理</p>
<form method="post"><!--  target="back" action="?do=tii"> -->
<table width="100%">
  <tbody>
  <tr class="yel">
    <td width="45%">網站標題</td>
    <td width="23%">替代文字</td>
    <td width="7%">顯示</td>
    <td width="7%">刪除</td>
    <td></td>
  </tr>
  <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) {?>
  <tr class="yel">
    <td width="45%"><img src="upload/<?=$row['title']?>" alt="<?=$ow['alt']?>" width='300px' hight='30px'></td>
    <td width="23%"><input name="alt" type="text" value="<?=$row['alt']?>"/></td>
    <td width="7%"><input name="display" type="radio" value="<?=$row['id']?>" <?=($row['display'] == 1 ? 'checked' : '')?>/></td>
    <td width="7%"><input name="del" type="checkbox" value="<?=$row['id']?>" /></td>
    <td><input type="button" value="更新圖片" onclick="op('#cover','#cvr','a_update.php?id=<?=$row['id']?>')"></td>
  </tr>
  <?php }?>
  </tbody>
</table>
<table style="margin-top:40px; width:70%;">
  <tbody>
    <tr>
      <td width="200px"><input type="button" onclick="op('#cover','#cvr','a_add.php?do=title')" value="新增網站標題圖片"></td>
      <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
    </tr>
  </tbody>
</table>
</form>
</div>
