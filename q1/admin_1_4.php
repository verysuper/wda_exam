<?php
//====================================上傳=====================================================
  if(!empty($_POST["myword"])){
    $sql="insert into a_1_4_marquee value(Null,'".$_POST["myword"]."','0')";
    mysqli_query($link,$sql);
    ?><script>document.location.href="admin.php?do=admin&redo=ad"</script><?php
  }
//====================================上傳=====================================================
//====================================修改內容=====================================================
  if(isset($_POST["my_alt"][0])){
  //是否顯示修改第一步驟:先全部歸0
    $sql = "update a_1_4_marquee set a_1_4_m_look = '0'";
    mysqli_query($link,$sql);
    for($i=0;$i<count($_POST["my_no"]);$i++){
      $sql = "update a_1_4_marquee set a_1_4_m_word = '".$_POST["my_alt"][$i]."' where a_1_4_m_seq = '".$_POST["my_no"][$i]."'";
      mysqli_query($link,$sql);
      //**************************刪除**************************
      if(!empty($_POST["mydelete"][$i])){
        $sql = "delete from a_1_4_marquee where a_1_4_m_seq = '".$_POST["mydelete"][$i]."'";
        mysqli_query($link,$sql);
      }
      //**************************刪除**************************
	    //是否顯示修改第二步驟:偵測點選的對象，直接修改資料庫的內容
      if(!empty($_POST["myupdate"][$i])){
        $sql = "update a_1_4_marquee set a_1_4_m_look = 1 where a_1_4_m_seq = '".$_POST["myupdate"][$i]."'";
        mysqli_query($link,$sql);
      }
    }
    ?><script>document.location.href="admin.php?do=admin&redo=ad"</script><?php
  }
//====================================修改內容=====================================================

    $sql="select * from a_1_4_marquee";
    $or =mysqli_query($link,$sql);
    $oo = mysqli_fetch_assoc($or);
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">網站標題管理</p>
  <form method="post">
    <table width="100%">
        <tr class="yel">
          <td width="80%">動態文字廣告</td>
          <td width="10%">顯示</td>
          <td width="10%">刪除</td>
        </tr>
<?php do{?>
        <tr>
          <td>
            <input name="my_alt[]" value="<?=$oo["a_1_4_m_word"]?>" style="width:100%;">
            <input type ="hidden" name="my_no[]" value="<?=$oo["a_1_4_m_seq"]?>">
          </td>
          <td>
            <input name="myupdate[]" type="checkbox" value="<?=$oo["a_1_4_m_seq"]?>" <?php if($oo["a_1_4_m_look"]==1){echo "checked"; }?>>
          </td>
          <td><input type="checkbox" name="mydelete[]" value="<?=$oo["a_1_4_m_seq"]?>"></td>
        </tr>
<?php }while($oo = mysqli_fetch_assoc($or));?>
    </table>
    <table style="margin-top:40px; width:70%;">
      <tbody>
        <tr>
          <td width="200px"><input type="button" onclick="op('#cover','#cvr','admin_1_4_add.php')" value="新增動態文字廣告"></td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>    
  </form>
</div>