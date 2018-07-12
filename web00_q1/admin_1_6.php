<?php
//====================================上傳圖片=====================================================
  if(!empty($_FILES["mypic"]["tmp_name"])){
    $tt = date("YmdHis");//設定檔名
    $fd= strchr($_FILES["mypic"]["name"],"."); //抓副檔名
    $sql="insert into a_1_6_pic value(Null,'".$tt.$fd."','0')";
    mysqli_query($link,$sql);
    copy($_FILES["mypic"]["tmp_name"],"jnbnbiuer9utw50/".$tt.$fd);
    ?><script>document.location.href="admin.php?do=admin&redo=image"</script><?php
  }
//====================================上傳圖片=====================================================
//====================================修改內容=====================================================
  if(isset($_POST["my_no"][0])){
    $sql = "update a_1_6_pic set a_1_5_m_p_look = 0";
    mysqli_query($link,$sql);
    for($i=0;$i<count($_POST["my_no"]);$i++){
      //**************************刪除**************************
      if(!empty($_POST["mydelete"][$i])){
        $sql = "select * from a_1_6_pic where a_1_5_m_p_seq = '".$_POST["mydelete"][$i]."'";
        $or = mysqli_query($link,$sql);
        $oo = mysqli_fetch_assoc($or);
        unlink("jnbnbiuer9utw50/".$oo["a_1_5_m_p_pic"]);
        $sql = "delete from a_1_6_pic where a_1_5_m_p_seq = '".$_POST["mydelete"][$i]."'";
        mysqli_query($link,$sql);
      }
      //**************************刪除**************************

      if(!empty($_POST["myupdate"][$i])){
        $sql = "update a_1_6_pic set a_1_5_m_p_look = 1 where a_1_5_m_p_seq = '".$_POST["myupdate"][$i]."'";
        mysqli_query($link,$sql);
      }
    }

    ?><script>document.location.href="admin.php?do=admin&redo=image"</script><?php
  }
//====================================修改內容=====================================================
//====================================修改圖片=====================================================
  if(!empty($_POST["update_pic_no"])){
    $tt = date("YmdHis");//設定檔名
    $fd= strchr($_FILES["update_pic"]["name"],"."); //抓副檔名
    copy($_FILES["update_pic"]["tmp_name"],"jnbnbiuer9utw50/".$tt.$fd);
    $sql="update a_1_6_pic set a_1_5_m_p_pic = '".$tt.$fd."' where a_1_5_m_p_seq = '".$_POST['update_pic_no']."'";
    mysqli_query($link,$sql);
    ?><script>document.location.href="admin.php?do=admin&redo=image"</script><?php  
  }
//====================================修改圖片=====================================================

    $sql="select * from a_1_6_pic";
    $or =mysqli_query($link,$sql);
    $oo = mysqli_fetch_assoc($or);


?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">校園映像資料管理</p>
  <form method="post">
    <table width="100%">
        <tr class="yel">
          <td width="60%">校園映像圖片</td>
          <td width="7%">顯示</td>
          <td width="7%">刪除</td>
          <td></td>
        </tr>
<?php do{?>
        <tr>
          <td>
            <embed loop=true src="jnbnbiuer9utw50/<?=$oo["a_1_5_m_p_pic"]?>" width="120" height="90"></embed>
            <input type ="hidden" name="my_no[]" value="<?=$oo["a_1_5_m_p_seq"]?>">
          </td>
          <td>
            <input name="myupdate[]" type="checkbox" value="<?=$oo["a_1_5_m_p_seq"]?>" <?php if($oo["a_1_5_m_p_look"]==1){echo "checked"; }?>>
          </td>
          <td><input type="checkbox" name="mydelete[]" value="<?=$oo["a_1_5_m_p_seq"]?>"></td>
          <td><input type="button" onclick="op('#cover','#cvr','admin_1_6_update_pic.php?pic=<?=$oo["a_1_5_m_p_seq"]?>')" value="更換圖片"></td>
        </tr>
<?php }while($oo = mysqli_fetch_assoc($or));?>
    </table>
    <table style="margin-top:40px; width:70%;">
      <tbody>
        <tr>
          <td width="200px">
            <input type="button" onclick="op('#cover','#cvr','admin_1_6_add_pic.php')" value="新增校園映像圖片">
          </td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>    
  </form>
</div>