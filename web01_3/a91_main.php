<?php
//___________add
if (isset($_POST['action']) && $_POST['action'] == 'menu1_add') {
  if (!empty($_POST['menu']) && !empty($_POST['href'])) {
    $sql="insert into menus values(NULL,'{$_POST['menu']}','{$_POST['href']}',1,0)";
    $conn->query($sql);
  }
}
//___________updateAll
if ((isset($_POST["action"])) && ($_POST["action"] == "menu1_main")){
  // section 1
  if(!empty($_POST['id'])){
    for($i=0;$i<count($_POST['id']);$i++){
      $sql="update menus set menu='{$_POST['menu'][$i]}',href='{$_POST['href'][$i]}',display=0 where id='{$_POST['id'][$i]}'";
      $conn->query($sql);
    }
  }
  // section 2
  if(!empty($_POST['display'])){
    for($i=0;$i<count($_POST['display']);$i++){
        $sql="update menus set display='1' where id='{$_POST['display'][$i]}';";
        $conn->query($sql);
    }
  }
  // section 3
  if(!empty($_POST['del'])){
    for($i=0;$i<count($_POST['del']);$i++){
      $sql="select * from menus where parent='{$_POST['del'][$i]}'"; //檢查有無子選單存在
      $result = $conn->query($sql);
      if($result->rowCount()==0){
        $sql="delete from menus where id='{$_POST['del'][$i]}'";
        $conn->query($sql);
      }else{
        echo "<script>alert('請先刪除子選單')</script>";
      }
    }
  }
  //header('location:admin.php?redo=menu1');
  ?><script>document.location.href="admin.php?do=admin&redo=menu1"</script><?php
}
//___________read
$sql = "select * from menus where parent = 0"; //主選單
$result = $conn->query($sql);
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
<p class="t cent botli">選單管理</p>
<form method="post"><!--  target="back" action="?do=tii"> -->
<table width="100%">
  <tbody>
  <tr class="yel">
    <td width="30%">主選單名稱</td>
    <td width="30%">主選單連結網址</td>
    <td width="10%">次選單數</td>
    <td width="7%">顯示</td>
    <td width="7%">刪除</td>
    <td></td>
  </tr>
  <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) {?>
  <tr class="yel">
    <td>
      <input name="menu[]" type="text" value="<?=$row['menu']?>" style="width: 90%;" required>
      <input name="id[]" type="hidden" value="<?=$row['id']?>">
    </td>
    <td><input name="href[]" type="text" value="<?=$row['href']?>" style="width: 90%;" required></td>
    <td>
<?php
  $sql2 = "select * from menus where parent = '{$row['id']}'"; //次選單
  $result2 = $conn->query($sql2);
  echo $result2->rowCount();
?>
    </td>
    <td><input type="checkbox" name="display[]" value="<?=$row['id']?>" <?=($row['display'] == 1 ? 'checked' : '')?>></td> <!-- checked -->
    <td><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
    <td><input type="button" value="編輯次選單" onclick="document.location.href='admin.php?do=admin&redo=menu2&id=<?=$row['id']?>'"></td> <!-- js href -->
  </tr>
  <?php }?>
  </tbody>
</table>
<table style="margin-top:40px; width:70%;">
  <tbody>
    <tr>
      <td width="200px"><input type="button" onclick="op('#cover','#cvr','a91_add.php?do=nume1')" value="新增主選單"></td>
      <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
    </tr>
  </tbody>
</table>
<input type="hidden" name="action" value="menu1_main">
</form>
</div>
