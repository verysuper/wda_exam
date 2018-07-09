<?php
  if(!empty($_POST["myalt"])){
    $tt = date("YmdHis");
    $sql="insert into a_1_3_title_pic value(Null,'".$tt.".jpg','".$_POST["myalt"]."','0')";
    mysqli_query($link,$sql);
    copy($_FILES["mypic"]["tmp_name"],"nfgkjewqrhto3ty23984rh9fh32f/".$tt.".jpg");
    ?><script>document.location.href="admin.php"</script><?php
  }
  if(isset($_POST["my_alt"][0])){
    for($i=0;$i<count($_POST["my_no"]);$i++){
      $sql = "update a_1_3_title_pic set a_1_3_t_p_alt = '".$_POST["my_alt"][$i]."', a_1_3_t_p_look = 0 where a_1_3_t_p_seq = '".$_POST["my_no"][$i]."'";
      mysqli_query($link,$sql);
      
      if(!empty($_POST["mydelete"][$i])){
        $sql = "select * from a_1_3_title_pic where a_1_3_t_p_seq = '".$_POST["mydelete"][$i]."'";
        $or = mysqli_query($link,$sql);
        $oo = mysqli_fetch_assoc($or);
        unlink("nfgkjewqrhto3ty23984rh9fh32f/".$oo["a_1_3_t_p_title"]);
        $sql = "delete from a_1_3_title_pic where a_1_3_t_p_seq = '".$_POST["mydelete"][$i]."'";
        mysqli_query($link,$sql);
      }
    }
    if(!empty($_POST["myupdate"])){
      $sql = "update a_1_3_title_pic set a_1_3_t_p_look = 1 where a_1_3_t_p_seq = '".$_POST["myupdate"]."'";
      mysqli_query($link,$sql);
    }
    ?><script>document.location.href="admin.php"</script><?php
  }
  if(!empty($_POST["update_pic_no"])){
    copy($_FILES["update_pic"]["tmp_name"],"nfgkjewqrhto3ty23984rh9fh32f/".$_POST["update_pic_name"]);
    ?><script>document.location.href="admin.php"</script><?php  
  }
    $sql="select * from a_1_3_title_pic";
    $or =mysqli_query($link,$sql);
    $oo = mysqli_fetch_assoc($or);
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">網站標題管理</p>
  <form method="post">
    <table width="100%">
        <tr class="yel">
          <td width="45%">網站標題</td>
          <td width="23%">替代文字</td>
          <td width="7%">顯示</td>
          <td width="7%">刪除</td>
          <td></td>
        </tr>
<?php do{?>
        <tr>
          <td width="45%"><img src="nfgkjewqrhto3ty23984rh9fh32f/<?=$oo["a_1_3_t_p_title"]?>" width="300" height="30"></td>
          <td width="23%">
            <input name="my_alt[]" value="<?=$oo["a_1_3_t_p_alt"]?>">
            <input type ="hidden" name="my_no[]" value="<?=$oo["a_1_3_t_p_seq"]?>">
          </td>
          <td width="7%">
            <input name="myupdate" type="radio" value="<?=$oo["a_1_3_t_p_seq"]?>" <?php if($oo["a_1_3_t_p_look"]==1){echo "checked"; }?>>
          </td>
          <td width="7%"><input type="checkbox" name="mydelete[]" value="<?=$oo["a_1_3_t_p_seq"]?>"></td>
          <td><input type="button" onclick="op('#cover','#cvr','admin_1_3_update_pic.php?pic=<?=$oo["a_1_3_t_p_seq"]?>')" value="更新圖片"></td>
        </tr>
<?php }while($oo = mysqli_fetch_assoc($or));?>
    </table>
    <table style="margin-top:40px; width:70%;">
      <tbody>
        <tr>
          <td width="200px"><input type="button" onclick="op('#cover','#cvr','admin_1_3_add_pic.php')" value="新增網站標題圖片"></td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>    
  </form>
</div>