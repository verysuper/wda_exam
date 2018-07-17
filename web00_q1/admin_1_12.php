<?php
//====================================上傳=====================================================
  if(!empty($_POST["myword"])){
    $sql="insert into a_1_12_1 value(Null,'".$_POST["myword"]."','".$_POST["myword2"]."','0')";
    mysqli_query($link,$sql);
    ?><script>document.location.href="admin.php?do=admin&redo=menu"</script><?php
  }
//====================================上傳=====================================================
//====================================修改內容=====================================================
  if(isset($_POST["my_name"][0])){
    for($i=0;$i<count($_POST["my_no"]);$i++){
      $sql = "update a_1_12_1 set a_1_12_1_look = 0 where a_1_12_1_seq = '".$_POST["my_no"][$i]."'";
      mysqli_query($link,$sql);
    }
    for($i=0;$i<count($_POST["my_no"]);$i++){
      $sql = "update a_1_12_1 set a_1_12_1_name = '".$_POST["my_name"][$i]."' , a_1_12_1_url = '".$_POST["my_url"][$i]."' where a_1_12_1_seq = '".$_POST["my_no"][$i]."'";
      mysqli_query($link,$sql);                                                  
      //**************************刪除**************************
      if(!empty($_POST["mydelete"][$i])){
        $sql = "delete from a_1_12_1 where a_1_12_1_seq = '".$_POST["mydelete"][$i]."'";
        mysqli_query($link,$sql);
      }
      //**************************刪除**************************
	    //是否顯示修改第二步驟:偵測點選的對象，直接修改資料庫的內容
      if(!empty($_POST["myupdate"][$i])){
        $sql = "update a_1_12_1 set a_1_12_1_look = 1 where a_1_12_1_seq = '".$_POST["myupdate"][$i]."'";
        mysqli_query($link,$sql);
      }
    }
    ?><script>document.location.href="admin.php?do=admin&redo=menu"</script><?php
  }
//====================================修改內容=====================================================
    $sql="select * from a_1_12_1";
    $or =mysqli_query($link,$sql);
    $oo = mysqli_fetch_assoc($or);
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">選單管理</p>
  <form method="post">
    <table width="100%">
        <tr class="yel">
          <td width="30%" align="center">主選單名稱</td>
          <td width="30%" align="center">選單連結網址</td>
          <td width="10%" align="center">次選單數</td>
          <td width="5%" align="center">顯示</td>
          <td width="5%" align="center">刪除</td>
          <td width="20%" align="center"></td>
        </tr>
<?php do{?>
        <tr>
          <td>
            <input name="my_name[]" value="<?=$oo["a_1_12_1_name"]?>">
            <input type ="hidden" name="my_no[]" value="<?=$oo["a_1_12_1_seq"]?>">
          </td>
          <td>
            <input name="my_url[]" value="<?=$oo["a_1_12_1_url"]?>">
          </td>
          <td>
<?php
  $sql = "select * from a_1_12_2 where a_1_12_2_a_1_12_1 = '".$oo["a_1_12_1_seq"]."'";
  $cc =mysqli_query($link,$sql);
  $qq = mysqli_num_rows($cc);
  echo $qq; 
?>
          </td>
          <td align="center">
            <input name="myupdate[]" type="checkbox" value="<?=$oo["a_1_12_1_seq"]?>" <?php if($oo["a_1_12_1_look"]==1){echo "checked"; }?>>
          </td>
          <td align="center"><input type="checkbox" name="mydelete[]" value="<?=$oo["a_1_12_1_seq"]?>"></td>
          <td align="center"><input type="button" value="編輯次選單" onclick="document.location.href='admin.php?do=admin&redo=menu2&list=<?=$oo["a_1_12_1_seq"]?>'"></td>
        </tr>
<?php }while($oo = mysqli_fetch_assoc($or));?>
    </table>
    <table style="width:70%;">
      <tbody>
        <tr>
          <td width="200px"><input type="button" onclick="op('#cover','#cvr','admin_1_12_add.php')" value="新增主選單"></td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>    
  </form>
</div>