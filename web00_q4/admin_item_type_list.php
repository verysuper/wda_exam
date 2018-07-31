<?php
if(!empty($_POST["my_i1"])){
  $sql = "insert into item_1 value(null,'".$_POST["my_i1"]."')";
  mysqli_query($link,$sql);
  ?><script>document.location.href="admin.php?do=admin&redo=th";</script><?php
}
if(!empty($_POST["my_i2"])){
  $sql = "insert into item_2 value(null,'".$_POST["my_i2"]."','".$_POST["select_i1"]."')";
  mysqli_query($link,$sql);
  ?><script>document.location.href="admin.php?do=admin&redo=th";</script><?php
}
$sql = "select * from item_1";
$ro = mysqli_query($link,$sql);
$list_i1 = mysqli_fetch_assoc($ro);

$sql = "select * from item_1";
$ro2 = mysqli_query($link,$sql);
$list_i1_2 = mysqli_fetch_assoc($ro2);
?>
<table width="95%" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td>
      <table width="95%" border="0" align="center" cellpadding="3" cellspacing="0">
        <tr>
          <td align="center">商品分類　<A href="admin.php?do=admin&redo=admin_item">商品管理</A></td>
        </tr>
<form method="post">
        <tr>
          <td align="center">新增大類
            <input name="my_i1"/>
            <input type="submit" value="新增" />
          </td>
        </tr>
</form>
<form method="post">
        <tr>
          <td align="center">新增中類
            <select name="select_i1">
<?php do{?>
              <option value="<?=$list_i1["i1_seq"]?>"><?=$list_i1["i1_name"]?></option>
<?php }while($list_i1 = mysqli_fetch_assoc($ro));?>
            </select>
            <input name="my_i2" />
            <input type="submit" value="新增" />
          </td>
        </tr>
</form>      
      </table>
    </td>
  </tr>
  <tr>
    <td>

      <table width="95%" border="0" cellspacing="1" cellpadding="3">
<?php
do{
  $sql = "select * from item_2 where i2_i1 = '".$list_i1_2["i1_seq"]."'";
  $ro3 = mysqli_query($link,$sql);
  $list_i2 = mysqli_fetch_assoc($ro3);
?>
        <tr>
          <td align="left" bgcolor="#FF9900" width="400"><?=$list_i1_2["i1_name"];?></td>
          <td align="center" bgcolor="#FF9900">
            <input type="button" value="修改" onclick="update_item('<?=$list_i1_2["i1_seq"];?>','1','<?=$list_i1_2["i1_name"];?>')">
            <input type="button" value="刪除" onclick="document.location.href='item_del_api.php?del=<?=$list_i1_2["i1_seq"];?>'">
          </td>
        </tr>
  <?php do{?>
        <tr>
          <td align="center" bgcolor="#FFFF99"><?=$list_i2["i2_name"];?></td>
          <td align="center" bgcolor="#FFFF99">
            <input type="button" value="修改" onclick="update_item('<?=$list_i2["i2_seq"];?>','2','<?=$list_i2["i2_name"];?>')">
            <input type="button" value="刪除" onclick="document.location.href='item2_del_api.php?del=<?=$list_i2["i2_seq"];?>'">
          </td>
        </tr>
  <?php }while($list_i2 = mysqli_fetch_assoc($ro3));?>
<?php }while($list_i1_2 = mysqli_fetch_assoc($ro2));?>
      </table>
    </td>
  </tr>
</table>
<script>
  function update_item(i1,i2,i3){
    if(i2 == 1){ gg = "update_item_api.php" ;tw="修改大類內容"}
    if(i2 == 2){ gg = "update_item2_api.php" ;tw="修改中類內容"}
  
    if(ii = prompt(tw,i3)){
      $.post(gg,{i1,ii},function(dd){document.location.href="admin.php?do=admin&redo=th";});
    }
  }
</script>