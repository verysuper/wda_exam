<?php
$sql = "select * from item_1";
$ro = mysqli_query($link,$sql);
$list_i1 = mysqli_fetch_assoc($ro);

$sql = "select * from item_3 where i3_seq = '".$_GET["no"]."'";
$ror = mysqli_query($link,$sql);
$rr = mysqli_fetch_assoc($ror);

if(!empty($_POST["select_i1"])){
  $i3_i1 =  $_POST["select_i1"];
  $i3_i2 =  $_POST["select_i7"];
  $i3_name =  $_POST["i3_name"];
  $i3_sell =  $_POST["i3_sell"];
  $i3_type =  $_POST["i3_type"];
  $i3_cnt =  $_POST["i3_cnt"];
  $i3_con =  $_POST["i3_con"];
  if(!empty($_FILES["i3_pic"]["name"])){
    $i3_pic =  $tt.".jpg";
    copy($_FILES["i3_pic"]["tmp_name"],"images/item/".$i3_pic);
  }else{
    $i3_pic = $rr["i3_pic"];
  }
  $sql="insert into item_3 value( null,'$i3_name','$i3_sell','$i3_type','$i3_cnt','$i3_pic','$i3_con','$i3_i1','$i3_i2','0')";
  mysqli_query($link,$sql);
  $sql = "delete from item_3 where i3_seq = '".$_GET["no"]."'";
  mysqli_query($link,$sql);
?><script>document.location.href="/admin.php?do=admin&redo=admin_item"</script><?php
}




?>
<form method="post" enctype="multipart/form-data">
<table width="95%" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td colspan="2" align="center">修改商品</td>
  </tr>
  <tr>
    <td width="300" align="center">所屬大類</td>
    <td align="left">
            <select name="select_i1" id="select_i1" onchange="gg()">
              <option >請選擇大類</option>
<?php do{?>
              <option value="<?=$list_i1["i1_seq"]?>"
              <?php if( (!empty($_GET["dala"])) && ($_GET["dala"] == $list_i1["i1_seq"])){ echo "selected='selected'" ;}?>>
                <?=$list_i1["i1_name"]?>
              </option>
<?php }while($list_i1 = mysqli_fetch_assoc($ro));?>
            </select>
    </td>
  </tr>
  <tr>
    <td align="center">所屬中類</td>
    <td align="left">
<?php

if(!empty($_GET["dala"])){
  $sql = "select * from item_2 where i2_i1 ='".$_GET["dala"]."'";
  $ro0 = mysqli_query($link,$sql);
  $list_i1l = mysqli_fetch_assoc($ro0);
?>
            <select name="select_i7" onchange="read_big_type()">
              <option >請選擇中類</option>
<?php do{?>
              <option value="<?=$list_i1l["i2_seq"]?>"><?=$list_i1l["i2_name"]?></option>
<?php }while($list_i1l = mysqli_fetch_assoc($ro0));?>
            </select>
<?php
}else{
?>
          <input type="hidden" name="select_i7" value="<?=$rr["i3_i2"]?>"/>
<?php
}
?>
    </td>
  </tr>
  <tr>
    <td align="center">商品編號</td>
    <td align="left">完成後自動分配"原本為<?=$rr["i3_seq"]?>"</td>
  </tr>
  <tr>
    <td align="center">商品名稱</td>
    <td align="left">
      <input type="text" name="i3_name" value="<?=$rr["i3_name"]?>"/>
    </td>
  </tr>
  <tr>
    <td align="center">商品價格</td>
    <td align="left">
    <input type="text" name="i3_sell" value="<?=$rr["i3_sell"]?>"/></td>
  </tr>
  <tr>
    <td align="center">規格</td>
    <td align="left">
      <input type="text" name="i3_type" value="<?=$rr["i3_type"]?>"/>
    </td>
  </tr>
  <tr>
    <td align="center">庫存</td>
    <td align="left">
      <input type="text" name="i3_cnt" value="<?=$rr["i3_cnt"]?>"/>
    </td>
  </tr>
  <tr>
    <td align="center">商品圖片</td>
    <td align="left">
      <input type="file" name="i3_pic"/>
    </td>
  </tr>
  <tr>
    <td align="center">商品介紹</td>
    <td align="left">
      <textarea name="i3_con" cols="50" rows="5"> <?=$rr["i3_con"]?></textarea>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="送出"/></td>
  </tr>
</table>
</form>
<script>
function read_big_type(){
  var tb = document.getElementById("select_i1").value;
  $.post("add_item_list_api.php",{tb},function(jola){
    document.getElementById("i2").innerHTML = jola;
  });
}
function gg(){
  var tb = document.getElementById("select_i1").value;
  document.location.href="admin.php?do=admin&redo=update_item&no=<?=$_GET["no"]?>&dala="+tb;
}
</script>