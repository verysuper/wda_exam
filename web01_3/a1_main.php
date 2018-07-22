<?php
//___________add
if (isset($_POST['action']) && $_POST['action'] == 'title_add') {
  if (!empty($_POST['alt']) && !empty($_FILES['new_title'])) {
    $title = strtotime('now') . "." . end(explode(".", $_FILES['new_title']['name']));
    $sql="insert into titles values(NULL,  '{$title}','{$_POST['alt']}', 0)";
    $conn->query($sql);
    copy($_FILES['new_title']['tmp_name'],'upload/'.$title);
  }  
}
//___________updateOne
if (isset($_POST['action']) && $_POST['action'] == 'title_update') {
  if (!empty($_POST['id']) && !empty($_FILES['new_title'])) {
    $title = strtotime('now') . "." . end(explode(".", $_FILES['new_title']['name']));
    if(copy($_FILES['new_title']['tmp_name'],'upload/'.$title)){
      $sql="update titles set title='{$title}' where id='{$_POST['id']}'";
      $conn->query($sql);      
    }
    if(file_exists("upload/".$_POST['old_title'])){ //refresh page bug, avoid err notify **********
      unlink("upload/".$_POST['old_title']);
    }
  }
}
//___________updateAll
if ((isset($_POST["action"])) && ($_POST["action"] == "title_main")){
  // section 1
  if(!empty($_POST['alt'])){
    for($i=0;$i<count($_POST['id']);$i++){
      $sql="update titles set alt='{$_POST['alt'][$i]}',display=0 where id='{$_POST['id'][$i]}'";
      $conn->query($sql);
    }
  }
  // section 2
  $sql="update titles set display='1' where id='{$_POST['display']}';";
  $conn->query($sql);
  // section 3
  if(!empty($_POST['del'])){
    for($i=0;$i<count($_POST['del']);$i++){
      $sql="select * from titles where id='{$_POST['del'][$i]}'";
      $result = $conn->query($sql);
      $row=$result->fetch();
      if($row['display']=='0'){
        unlink("upload/".$row['title']);
        $sql="delete from titles where id='{$_POST['del'][$i]}'";
        $conn->query($sql);
      }
    }
  }
  header('location:admin.php');
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
    <td width="23%">
      <input type="text" name="alt[]" value="<?=$row['alt']?>"/>
      <input type="hidden" name="id[]" value="<?=$row['id']?>"/><!-- note -->
    </td>
    <td width="7%"><input name="display" type="radio" value="<?=$row['id']?>" <?=($row['display'] == 1 ? 'checked' : '')?>/></td>
    <td width="7%"><input name="del[]" type="checkbox" value="<?=$row['id']?>" /></td>
    <td><input type="button" value="更新圖片" onclick="op('#cover','#cvr','a1_update.php?id=<?=$row['id']?>')"></td>
  </tr>
  <?php }?>
  </tbody>
</table>
<table style="margin-top:40px; width:70%;">
  <tbody>
    <tr>
      <td width="200px"><input type="button" onclick="op('#cover','#cvr','a1_add.php?do=title')" value="新增網站標題圖片"></td>
      <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
    </tr>
  </tbody>
</table>
<input type="hidden" name="action" value="title_main">
</form>
</div>
