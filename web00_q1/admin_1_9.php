<?php
//====================================上傳=====================================================
  if(!empty($_POST["myword"])){
    $sql="insert into a_1_9_news value(Null,'".$_POST["myword"]."','0')";
    mysqli_query($link,$sql);
    ?><script>document.location.href="admin.php?do=admin&redo=news"</script><?php
  }
//====================================上傳=====================================================
//====================================修改內容=====================================================
  if(isset($_POST["my_alt"][0])){
  //是否顯示修改第一步驟:先全部歸0
    for($i=0;$i<count($_POST["my_no"]);$i++){
      $sql = "update a_1_9_news set a_1_4_m_look = 0 where a_1_4_m_seq = '".$_POST["my_no"][$i]."'";
      mysqli_query($link,$sql);
    }
    for($i=0;$i<count($_POST["my_no"]);$i++){
      $sql = "update a_1_9_news set a_1_4_m_word = '".$_POST["my_alt"][$i]."' where a_1_4_m_seq = '".$_POST["my_no"][$i]."'";
      mysqli_query($link,$sql);
      //**************************刪除**************************
      if(!empty($_POST["mydelete"][$i])){
        $sql = "delete from a_1_9_news where a_1_4_m_seq = '".$_POST["mydelete"][$i]."'";
        mysqli_query($link,$sql);
      }
      //**************************刪除**************************
	    //是否顯示修改第二步驟:偵測點選的對象，直接修改資料庫的內容
      if(!empty($_POST["myupdate"][$i])){
        $sql = "update a_1_9_news set a_1_4_m_look = 1 where a_1_4_m_seq = '".$_POST["myupdate"][$i]."'";
        mysqli_query($link,$sql);
      }
    }
    ?><script>document.location.href="admin.php?do=admin&redo=news"</script><?php
  }
//====================================修改內容=====================================================

    $sql="select * from a_1_9_news";
    $or =mysqli_query($link,$sql);
    $all_date = mysqli_num_rows($or);//所有資料筆數

    $now_page = 1;//開始頁數
    if(!empty($_GET["page"])){ $now_page = $_GET["page"];}
    $page_cnt = 5;//每頁撈取的資料筆數

    $all_page = ceil($all_date/$page_cnt);//計算總頁數
    $pp = $now_page - 1;//上一頁的頁碼
    $np = $now_page + 1;//下一頁的頁碼

    $open_page = ($now_page-1)*$page_cnt;//計算LIMIT的開始位置
    $sql="select * from a_1_9_news limit $open_page,$page_cnt";//把計算完的結果帶入SQL語法中
    $or =mysqli_query($link,$sql);
    $oo = mysqli_fetch_assoc($or);
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">最新消息管理</p>
  <form method="post">
    <table width="100%">
        <tr class="yel">
          <td width="80%" align="center">最新消息</td>
          <td width="10%" align="center">顯示</td>
          <td width="10%" align="center">刪除</td>
        </tr>
<?php do{?>
        <tr>
          <td>
            <textarea name="my_alt[]" cols="100" rows="5" style="width:100%;"><?=$oo["a_1_4_m_word"]?></textarea>
            <input type ="hidden" name="my_no[]" value="<?=$oo["a_1_4_m_seq"]?>">
          </td>
          <td align="center">
            <input name="myupdate[]" type="checkbox" value="<?=$oo["a_1_4_m_seq"]?>" <?php if($oo["a_1_4_m_look"]==1){echo "checked"; }?>>
          </td>
          <td align="center"><input type="checkbox" name="mydelete[]" value="<?=$oo["a_1_4_m_seq"]?>"></td>
        </tr>
<?php }while($oo = mysqli_fetch_assoc($or));?>
        <tr>
          <td colspan="3" align="center">
<?php
            if($now_page >1){
              echo "<a href='admin.php?do=admin&redo=news&page=".$pp."'><</a>";
            }
  for($x=1;$x<=$all_page;$x++){
    ?> <a href='admin.php?do=admin&redo=news&page=<?=$x?>' <?php if($now_page == $x){?>class="now_page"<?php }?>><?=$x?></a> <?php
  }
            if($now_page < $all_page){
              echo "<a href='admin.php?do=admin&redo=news&page=".$np."'>></a>";
            }
?>
          </td>
        </tr>
    </table>
    <table style="width:70%;">
      <tbody>
        <tr>
          <td width="200px"><input type="button" onclick="op('#cover','#cvr','admin_1_9_add.php')" value="新增最新消息"></td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>    
  </form>
</div>