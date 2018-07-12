<?php  
//add
    if ((isset($_POST["ad"])) && ($_POST["ad"] == "add")){
    if(!empty($_POST['content'])){
      $sql="insert into ad value(NULL,'{$_POST['content']}','0');";
      $result = $conn->query($sql);
    }
  }
//update_alt
  if ((isset($_POST["ad"])) && ($_POST["ad"] == "update_all")){
    // section 1
    for($i=0;$i<count($_POST['id']);$i++){
      $sql="update ad set content='{$_POST['content'][$i]}',display='0' where id='{$_POST['id'][$i]}';";
      $conn->query($sql);      
    }
    // section 2
    for($i=0;$i<count($_POST['display']);$i++){
      $sql="update ad set display='1' where id='{$_POST['display'][$i]}';";
      $conn->query($sql);
    }
    // section 3
    if(!empty($_POST['delete'])){
      for($i=0;$i<count($_POST['delete']);$i++){
        $sql="select * from ad where id='{$_POST['delete'][$i]}'";
        $result = $conn->query($sql);
        $row=$result->fetch();
        if($row['display']=='0'){
          $sql="delete from ad where id='{$_POST['delete'][$i]}'";
          $conn->query($sql);
        }
      }
    }
    header('location:admin.php?redo=ad');
  }
//read
  $sql="select * from ad";
  $result = $conn->query($sql);    
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">動態文字廣告管理</p>
  <form method="post">
    <table width="100%">
      <tbody>
        <tr class="yel">
          <td width="80%">動態文字廣告</td>
          <td width="10%">顯示</td>
          <td width="10%">刪除</td>
        </tr>
        <?php while($row=$result->fetch(PDO::FETCH_ASSOC)){extract($row);?>
        <tr class="yel">
          <td width="80%">
            <input type="text" name="content[]" value="<?=$content?>" style="width:90%;" required>
            <input type="hidden" name="id[]" value="<?=$id?>">
          </td>
          <td width="7%">
            <input type="checkbox" name="display[]" value="<?=$id?>" <?php if($display==1){echo "checked";}?>>
          </td>
          <td width="7%">
            <input type="checkbox" name="delete[]" value="<?=$id?>">
          </td>
        </tr>
        <?php }?>
      </tbody>
  </table>
  <table style="margin-top:40px; width:70%;">
    <tbody>
      <tr>
        <td width="200px">
          <input type="button" onclick="op('#cover','#cvr','2_adAdd.php')" value="新增動態文字廣告">
        </td>
        <td class="cent">
          <input type="submit" value="修改確定"><input type="reset" value="重置">
        </td>
      </tr>
      </tbody>
  </table>
  <input type="hidden" name="ad" value="update_all" /><!-- note:specify action -->
  </form>
</div>
