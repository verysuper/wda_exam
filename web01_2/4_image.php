<?php
//add
if ((isset($_POST["images"])) && ($_POST["images"] == "add")) {
    if (!empty($_FILES['image'])) {
        $image = time() . "." . end(explode('.', $_FILES['image']['name']));
        $sql = "insert into image value(NULL,'{$image}','0');";
        $result = $conn->query($sql);
        copy($_FILES['image']['tmp_name'], 'upload/' . $image);
    }
}
//update_image
if ((isset($_POST["images"])) && ($_POST["images"] == "update_image")) {
    if (!empty($_FILES['image']) && !empty($_POST['id'])) {
// section 1
        $image = time() . "." . end(explode('.', $_FILES['image']['name']));
        copy($_FILES['image']['tmp_name'], 'upload/' . $image);
        $sql = "update image set image='{$image}' where id='{$_POST['id']}';";
        $result = $conn->query($sql);
// section 2
        if (file_exists("upload/" . $_POST['o_image'])) {
            unlink("upload/" . $_POST['o_image']);
        }
    }
}
//update_alt
if ((isset($_POST["images"])) && ($_POST["images"] == "update_all")) {
// section 1
    for ($i = 0; $i < count($_POST['id']); $i++) {
        $sql = "update image set display='0' where id='{$_POST['id'][$i]}';";
        $conn->query($sql);
    }
// section 2
    foreach ($_POST['display'] as $key) {
        $sql = "update image set display='1' where id='{$key}';";
        $conn->query($sql);
    }
// section 3
    if (!empty($_POST['delete'])) {
        for ($i = 0; $i < count($_POST['delete']); $i++) {
            $sql = "select * from image where id='{$_POST['delete'][$i]}'";
            $result = $conn->query($sql);
            $row = $result->fetch();
            if ($row['display'] == '0') {
                unlink("upload/" . $row['image']);
                $sql = "delete from image where id='{$_POST['delete'][$i]}'";
                $conn->query($sql);
            }
        }
    }
    header('location:admin.php?redo=image');
}
//read
$sql = "select * from image";
$result = $conn->query($sql);
//part page
$denom = $result->rowCount(); //total rows
$numer = 3;
$start_page = 1; // start page
$current_page = 1;
if(!empty($_GET['current'])){
    $current_page = $_GET['current'];
}
$all_page = ceil($denom / $numer); //total page

$set_limit = ($current_page - 1) * $numer;
$sql="select * from image limit $set_limit,$numer";
$result = $conn->query($sql);
// while($part=$stmt->fetch(PDO::FETCH_ASSOC)){
//    echo "<pre>".print_r($row,true)."</pre>";
// }

?>
<style type="text/css">
a {
	text-decoration: none;
}
.current_page{
  font-size: 38px;
}
</style>

<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">校園映象資料管理</p>
  <form method="post">
    <table width="100%">
      <tbody>
        <tr class="yel">
          <td width="50%">校園映象資料圖片</td>
          <td width="15%">顯示</td>
          <td width="15%">刪除</td>
          <td></td>
        </tr>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);?>
        <tr class="yel">
          <td width="50%">
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
            <input type="button" onclick="op('#cover','#cvr','4_imageUpdate.php?id=<?=$id?>')" value="更換圖片">
          </td>
        </tr>
        <?php }?>
      </tbody>
  </table>
  <table style="width:70%;">
    <tbody>
<!-- 頁碼區 -->
        <tr>
            <td width="200px"></td>
            <td class="cent" style="font-size:30px; text-decoration: none;">
<?php 
    $last = $start_page - 1;
    $next = $start_page + 1;
    echo "<a href='?redo=image&current=" . ($last > 0 ? $last : 1) . "'> ＜ </a> ";
    for($x=1;$x<=$all_page;$x++){
?> 
        <a href='?redo=image&current=<?=$x?>' <?php if($current_page == $x){echo "class=current_page";}?>><?=$x?></a>
<?php 
    }
    echo " <a href='?redo=image&current=" . ($next <= $all_page ? $next : $all_page) . "'> ＞ </a>";
?>
            </td>
        </tr>
      <tr>
        <td width="200px">
          <input type="button" onclick="op('#cover','#cvr','4_imageAdd.php')" value="新增校園映象圖片">
        </td>
        <td class="cent">
          <input type="submit" value="修改確定"><input type="reset" value="重置">
        </td>
      </tr>
      </tbody>
  </table>
  <input type="hidden" name="images" value="update_all" /><!-- note:specify action -->
  </form>
</div>
