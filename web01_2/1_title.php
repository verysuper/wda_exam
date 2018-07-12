<?php  
//add
  if ((isset($_POST["title"])) && ($_POST["title"] == "add")){
    if(!empty($_FILES['pic']) && !empty($_POST['alt'])){
      $pic=time().".".end(explode('.', $_FILES['pic']['name']));
      $sql="insert into title value(NULL,'{$pic}','{$_POST['alt']}','0');";
      $result = $conn->query($sql);
      copy($_FILES['pic']['tmp_name'],'upload/'.$pic);
    }
  }
//update_pic
  if ((isset($_POST["title"])) && ($_POST["title"] == "update_pic")){
    if(!empty($_FILES['pic']) && !empty($_POST['id'])){
      // section 1
      $pic=time().".".end(explode('.', $_FILES['pic']['name']));
      copy($_FILES['pic']['tmp_name'],'upload/'.$pic);
      $sql="update title set pic='{$pic}' where id='{$_POST['id']}';";
      $result = $conn->query($sql);
      // section 2
      if(file_exists("upload/".$_POST['o_pic'])){
        unlink("upload/".$_POST['o_pic']);
      }
    }
  }
//update_alt
  if ((isset($_POST["title"])) && ($_POST["title"] == "update_alt")){
    // section 1
    for($i=0;$i<count($_POST['id']);$i++){
      $sql="update title set alt='{$_POST['alt'][$i]}',display='0' where id='{$_POST['id'][$i]}';";
      $conn->query($sql);      
    }
    // section 2
    $sql="update title set display='1' where id='{$_POST['display']}';";
    $conn->query($sql);
    // section 3
    if(!empty($_POST['delete'])){
      for($i=0;$i<count($_POST['delete']);$i++){
        $sql="select * from title where id='{$_POST['delete'][$i]}'";
        $result = $conn->query($sql);
        $row=$result->fetch();
        if($row['display']=='0'){
          unlink("upload/".$row['pic']);
          $sql="delete from title where id='{$_POST['delete'][$i]}'";
          $conn->query($sql);
        }
      }
    }
    header('location:admin.php');
  }
//read
  $sql="select * from title";
  $result = $conn->query($sql);    
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">網站標題管理</p>
  <form method="post">
    <table width="100%">
      <tbody>
        <tr class="yel">
          <td width="45%">網站標題</td>
          <td width="23%">替代文字</td>
          <td width="7%">顯示</td>
          <td width="7%">刪除</td>
          <td></td>
        </tr>
        <?php while($row=$result->fetch(PDO::FETCH_ASSOC)){
          extract($row);?>
        <tr class="yel">
          <td width="45%">
            <img src="upload/<?=$pic?>" width="300" height="30" title="<?=$pic?>">            
          </td>
          <td width="23%">
            <input type="text" name="alt[]" value="<?=$alt?>">
            <input type="hidden" name="id[]" value="<?=$id?>">            
          </td>
          <td width="7%">
            <input type="radio" name="display" value="<?=$id?>" <?php if($display==1){echo "checked";}?>>
          </td>
          <td width="7%">
            <input type="checkbox" name="delete[]" value="<?=$id?>">
          </td>
          <td>
            <input type="button" onclick="op('#cover','#cvr','1_titleUpdate.php?id=<?=$id?>')" value="更新圖片">
          </td>
        </tr>
        <?php }?>
      </tbody>
  </table>
  <table style="margin-top:40px; width:70%;">
    <tbody>
      <tr>
        <td width="200px">
          <input type="button" onclick="op('#cover','#cvr','1_titleAdd.php')" value="新增網站標題圖片">
        </td>
        <td class="cent">
          <input type="submit" value="修改確定"><input type="reset" value="重置">
        </td>
      </tr>
      </tbody>
  </table>
  <input type="hidden" name="title" value="update_alt" /><!-- note:specify action -->
  </form>
</div>
