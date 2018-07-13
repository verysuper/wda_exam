<?php
//add
if ((isset($_POST["mvim"])) && ($_POST["mvim"] == "add")) {
    if (!empty($_FILES['image'])) {
        $image = time() . "." . end(explode('.', $_FILES['image']['name']));
        $sql = "insert into mvim value(NULL,'{$image}','0');";
        $result = $conn->query($sql);
        copy($_FILES['image']['tmp_name'], 'upload/' . $image);
    }
}
//update_image
if ((isset($_POST["mvim"])) && ($_POST["mvim"] == "update_image")) {
    if (!empty($_FILES['image']) && !empty($_POST['id'])) {
// section 1
        $image = time() . "." . end(explode('.', $_FILES['image']['name']));
        copy($_FILES['image']['tmp_name'], 'upload/' . $image);
        $sql = "update mvim set image='{$image}' where id='{$_POST['id']}';";
        $result = $conn->query($sql);
// section 2
        if (file_exists("upload/" . $_POST['o_image'])) {
            unlink("upload/" . $_POST['o_image']);
        }
    }
}
//update_alt
if ((isset($_POST["mvim"])) && ($_POST["mvim"] == "update_all")) {
// section 1
    for ($i = 0; $i < count($_POST['id']); $i++) {
        $sql = "update mvim set display='0' where id='{$_POST['id'][$i]}';";
        $conn->query($sql);
    }
// section 2
    foreach ($_POST['display'] as $key) {
        $sql = "update mvim set display='1' where id='{$key}';";
        $conn->query($sql);
    }
// section 3
    if (!empty($_POST['delete'])) {
        for ($i = 0; $i < count($_POST['delete']); $i++) {
            $sql = "select * from mvim where id='{$_POST['delete'][$i]}'";
            $result = $conn->query($sql);
            $row = $result->fetch();
            if ($row['display'] == '0') {
                unlink("upload/" . $row['image']);
                $sql = "delete from mvim where id='{$_POST['delete'][$i]}'";
                $conn->query($sql);
            }
        }
    }
    header('location:admin.php?redo=mvim');
}
//read
$sql = "select * from mvim";
$result = $conn->query($sql);
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">動畫圖片管理管理</p>
  <form method="post">
    <table width="100%">
      <tbody>
        <tr class="yel">
          <td width="50%">動畫圖片</td>
          <td width="15%">顯示</td>
          <td width="15%">刪除</td>
          <td></td>
        </tr>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);?>
        <tr class="yel">
          <td width="50%">
            <!-- <img src="upload/<?=$pic?>" width="300" height="30" title="<?=$pic?>">  -->
            <embed src="upload/<?=$image?>" width="120" height="90"></embed>
            <input type="hidden" name="id[]" value="<?=$id?>">
          </td>
          <td width="15%">
            <input type="checkbox" name="display[]" value="<?=$id?>" <?php if ($display == 1) {echo 'checked';}?>>
          </td>
          <td width="15%">
            <input type="checkbox" name="delete[]" value="<?=$id?>">
          </td>
          <td>
            <input type="button" onclick="op('#cover','#cvr','3_mvimUpdate.php?id=<?=$id?>')" value="更換動畫">
          </td>
        </tr>
        <?php }?>
      </tbody>
  </table>
  <table style="margin-top:40px; width:70%;">
    <tbody>
      <tr>
        <td width="200px">
          <input type="button" onclick="op('#cover','#cvr','3_mvimAdd.php')" value="新增動畫圖片">
        </td>
        <td class="cent">
          <input type="submit" value="修改確定"><input type="reset" value="重置">
        </td>
      </tr>
      </tbody>
  </table>
  <input type="hidden" name="mvim" value="update_all" /><!-- note:specify action -->
  </form>
</div>
