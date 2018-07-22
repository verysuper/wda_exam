<?php
if(!empty($_GET['id']))
{
  $parent=$_GET['id']; // ********** all process must have on a parent
  //___________add sub
  if (isset($_POST['action']) && $_POST['action'] == 'menu2_add') {
    if (!empty($_POST['menu']) && !empty($_POST['href'])) {
      $sql="insert into menus values(NULL,'{$_POST['menu']}','{$_POST['href']}',1,'{$parent}')";
      $conn->query($sql);
    }
  }
  //___________updateAll sub
  if ((isset($_POST["action"])) && ($_POST["action"] == "menu2_main")){
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
        $sql="delete from menus where id='{$_POST['del'][$i]}'";
        $conn->query($sql);
      }
    }
    //header('location:admin.php?redo=menu1');
    ?><script>document.location.href="admin.php?do=admin&redo=menu2&id=<?=$parent?>"</script><?php
  }
  //___________read sub
  $sql = "select * from menus where parent = '{$parent}'"; //次選單
  $result = $conn->query($sql);
}
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
<p class="t cent botli">選單管理</p>
<form method="post"><!--  target="back" action="?do=tii"> -->
<table width="100%">
  <tbody>
  <tr class="yel">
    <td width="30%">次選單名稱</td>
    <td width="30%">次選單連結網址</td>
    <td width="10%"></td>
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
    </td>
    <td><input type="checkbox" name="display[]" value="<?=$row['id']?>" <?=($row['display'] == 1 ? 'checked' : '')?>></td> <!-- checked -->
    <td><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
    <td></td>
  </tr>
  <?php }?>
  </tbody>
</table>
<table style="margin-top:40px; width:70%;">
  <tbody>
    <tr>
      <td width="200px"><input type="button" onclick="op('#cover','#cvr','a92_add.php?do=nume2')" value="新增次選單"></td> <!--  -->
      <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
    </tr>
  </tbody>
</table>
<input type="hidden" name="action" value="menu2_main"> <!--  -->
</form>
</div>
