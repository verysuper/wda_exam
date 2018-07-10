<?php
//====================================上傳=====================================================
  if(!empty($_POST["myword"])){
    $sql="insert into admin value(Null,'".$_POST["myword"]."','".$_POST["mypassword"]."','0')";
    mysqli_query($link,$sql);
    ?><script>document.location.href="admin.php?do=admin&redo=admin"</script><?php
  }
//====================================上傳=====================================================
//====================================修改內容=====================================================
  if(isset($_POST["my_id"][0])){
    for($i=0;$i<count($_POST["my_no"]);$i++){
      $sql = "update admin set a_id = '".$_POST["my_id"][$i]."',a_pw ='".$_POST["my_pw"][$i]."' where a_seq = '".$_POST["my_no"][$i]."'";
      mysqli_query($link,$sql);
      //**************************刪除**************************
      if(!empty($_POST["mydelete"][$i])){
        $sql = "delete from admin where a_seq = '".$_POST["mydelete"][$i]."'";
        mysqli_query($link,$sql);
      }
      //**************************刪除**************************

    }
    ?><script>document.location.href="admin.php?do=admin&redo=admin"</script><?php
  }
//====================================修改內容=====================================================

    $sql="select * from admin";
    $or =mysqli_query($link,$sql);
    $oo = mysqli_fetch_assoc($or);
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">管理者帳號管理</p>
  <form method="post">
    <table width="100%">
        <tr class="yel">
          <td width="45%">帳號</td>
          <td width="45%">密碼</td>
          <td width="10%">刪除</td>
        </tr>
<?php do{?>
        <tr>
          <td>
            <input name="my_id[]" value="<?=$oo["a_id"]?>" style="width:100%;">
            <input type ="hidden" name="my_no[]" value="<?=$oo["a_seq"]?>">
          </td>
          <td>
            <input name="my_pw[]" value="<?=$oo["a_pw"]?>" style="width:100%;" type="password">
          </td>
          <td><input type="checkbox" name="mydelete[]" value="<?=$oo["a_seq"]?>"></td>
        </tr>
<?php }while($oo = mysqli_fetch_assoc($or));?>
    </table>
    <table style="margin-top:40px; width:70%;">
      <tbody>
        <tr>
          <td width="200px">
            <input type="button" onclick="op('#cover','#cvr','admin_1_11_add.php')" value="新增管理者帳號">
          </td>
          <td class="cent">
            <input type="submit" value="修改確定"><input type="reset" value="重置">
          </td>
        </tr>
      </tbody>
    </table>    
  </form>
</div>