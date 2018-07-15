<?php  
//add
    if ((isset($_POST["news"])) && ($_POST["news"] == "add")){
    if(!empty($_POST['content'])){
      $sql="insert into news value(NULL,'{$_POST['content']}','0');";
      $result = $conn->query($sql);
    }
  }
//update_alt
  if ((isset($_POST["news"])) && ($_POST["news"] == "update_all")){
    // section 1
    for($i=0;$i<count($_POST['id']);$i++){
      $sql="update news set content='{$_POST['content'][$i]}',display='0' where id='{$_POST['id'][$i]}';";
      $conn->query($sql);      
    }
    // section 2
    for($i=0;$i<count($_POST['display']);$i++){
      $sql="update news set display='1' where id='{$_POST['display'][$i]}';";
      $conn->query($sql);
    }
    // section 3
    if(!empty($_POST['delete'])){
      for($i=0;$i<count($_POST['delete']);$i++){
        $sql="select * from news where id='{$_POST['delete'][$i]}'";
        $result = $conn->query($sql);
        $row=$result->fetch();
        if($row['display']=='0'){
          $sql="delete from news where id='{$_POST['delete'][$i]}'";
          $conn->query($sql);
        }
      }
    }
    header('location:admin.php?redo=news');
  }
//read
  $sql="select * from news";
  $result = $conn->query($sql);    
  //part page
  $denom = $result->rowCount(); //total rows
  $numer = 4;
  $start_page = 1; // start page
  $current_page = 1;
  if(!empty($_GET['current'])){
      $current_page = $_GET['current'];
  }
  $all_page = ceil($denom / $numer); //total page

  $set_limit = ($current_page - 1) * $numer;
  $sql="select * from news limit $set_limit,$numer";
  $result = $conn->query($sql);
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
  <p class="t cent botli">最新消息資料管理</p>
  <form method="post">
    <table width="100%">
      <tbody>
        <tr class="yel">
          <td width="80%">最新消息資料內容</td>
          <td width="10%">顯示</td>
          <td width="10%">刪除</td>
        </tr>
        <?php while($row=$result->fetch(PDO::FETCH_ASSOC)){extract($row);?>
        <tr class="yel">
          <td width="80%">
            <textarea name="content[]" cols="100" rows="3" style="width:90%;" required><?=$content?></textarea>
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
<!-- 頁碼區 -->
        <tr>
            <td width="200px"></td>
            <td class="cent" style="font-size:30px; text-decoration: none;">
<?php 
    $last = $current_page - 1;
    $next = $current_page + 1;
    echo "<a href='?redo=news&current=" . ($last > 0 ? $last : 1) . "'> ＜ </a> ";
    for($x=1;$x<=$all_page;$x++){
?> 
        <a href='?redo=news&current=<?=$x?>' <?php if($current_page == $x){echo "class=current_page";}?>><?=$x?></a>
<?php 
    }
    echo " <a href='?redo=news&current=" . ($next <= $all_page ? $next : $all_page) . "'> ＞ </a>";
?>
      <tr>
        <td width="200px">
          <input type="button" onclick="op('#cover','#cvr','7_newsAdd.php')" value="新增最新消息資料">
        </td>
        <td class="cent">
          <input type="submit" value="修改確定"><input type="reset" value="重置">
        </td>
      </tr>
      </tbody>
  </table>
  <input type="hidden" name="news" value="update_all" /><!-- note:specify action -->
  </form>
</div>
