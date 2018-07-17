<?php
  $now_menu = $_GET['list'];
//====================================上傳=====================================================
  if(!empty($_POST["myword"])){
    $sql="insert into a_1_12_2 value(Null,'".$_POST["myword"]."','".$_POST["myword2"]."','$now_menu')";
    mysqli_query($link,$sql);
    ?><script>document.location.href="admin.php?do=admin&redo=menu2&list=<?=$now_menu?>"</script><?php
  }
//====================================上傳=====================================================
//====================================修改內容=====================================================
  if(isset($_POST["my_name"][0])){
    for($i=0;$i<count($_POST["my_no"]);$i++){
      $sql = "update a_1_12_2 set a_1_12_2_look = 0 where a_1_12_2_seq = '".$_POST["my_no"][$i]."'";
      mysqli_query($link,$sql);
    }
    for($i=0;$i<count($_POST["my_no"]);$i++){
      $sql = "update a_1_12_2 set a_1_12_2_name = '".$_POST["my_name"][$i]."' , a_1_12_2_url = '".$_POST["my_url"][$i]."' where a_1_12_2_seq = '".$_POST["my_no"][$i]."'";
      mysqli_query($link,$sql);                                                  
      //**************************刪除**************************
      if(!empty($_POST["mydelete"][$i])){
        $sql = "delete from a_1_12_2 where a_1_12_2_seq = '".$_POST["mydelete"][$i]."'";
        mysqli_query($link,$sql);
      }
      //**************************刪除**************************
	    //是否顯示修改第二步驟:偵測點選的對象，直接修改資料庫的內容
      if(!empty($_POST["myupdate"][$i])){
        $sql = "update a_1_12_2 set a_1_12_2_look = 1 where a_1_12_2_seq = '".$_POST["myupdate"][$i]."'";
        mysqli_query($link,$sql);
      }
    }
    ?><script>document.location.href="admin.php?do=admin&redo=menu2&list=<?=$now_menu?>"</script><?php
  }
//====================================修改內容=====================================================
    $sql="select * from a_1_12_2 where a_1_12_2_a_1_12_1 = '$now_menu'";
    $or =mysqli_query($link,$sql);
    $oo = mysqli_fetch_assoc($or);
    $ox = mysqli_num_rows($or);
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">次選單管理</p>
  <form method="post">
    <table width="100%">
        <tr class="yel">
          <td width="45%" align="center">主選單名稱</td>
          <td width="45%" align="center">選單連結網址</td>
          <td width="10%" align="center">刪除</td>
        </tr>
<?php
if($ox == 0){
?>
        <tr>
          <td align="center" colspan="3">查無資料</td>
        </tr>

<?php 
}else{
  do{
?>
        <tr>
          <td>
            <input name="my_name[]" value="<?=$oo["a_1_12_2_name"]?>">
            <input type ="hidden" name="my_no[]" value="<?=$oo["a_1_12_2_seq"]?>">
          </td>
          <td>
            <input name="my_url[]" value="<?=$oo["a_1_12_2_url"]?>">
          </td>
          <td align="center"><input type="checkbox" name="mydelete[]" value="<?=$oo["a_1_12_2_seq"]?>"></td>
        </tr>
<?php
  }while($oo = mysqli_fetch_assoc($or));
}
?>
    </table>
    <table style="width:70%;">
      <tbody>
        <tr>
          <td width="200px"><input type="button" onclick="op('#cover','#cvr','admin_1_12_2_add.php')" value="更多次選單"></td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>    
  </form>
</div>