<?php
  if(isset($_GET['id'])){
    $sql="select * from p_item where id = '{$_GET['id']}'";
    $item=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
    //echo $row['name'];
  }
?>
<form action="" method="post" enctype="multipart/form-data">
<table width="80%" border="0" align="center">
<caption修改商品</caption>
  <tr>
    <td class="tt ct">所屬大類</td>
    <td class="pp"><select name="cat1" id="cat1" required onchange="dropdown_api()">
<?php
  $sql="select * from p_cat where parent = '0'";
  $result=$conn->query($sql);
  ?><option value="">請選擇一項</option><?php
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    ?><option value="<?=$row['id']?>"><?=$row['name']?></option><?php
  }
?>
    </select><font color="red">可不選擇，原為'<?=$item['name']?>'</font color>
    </td>
  </tr>
  <tr>
    <td class="tt ct">所屬中類</td>
    <td class="pp"><select name="cat2" id="cat2" required>
    <option value="">請先選擇大項</option>
    </select><font color="red">可不選擇，原為'<?=$item['name']?>'</font color>
    </td>
  </tr>
  <tr>
    <td class="tt ct">商品編號</td>
    <td class="pp">完成分類後自動分配</td>
  </tr>
  <tr>
    <td class="tt ct">商品名稱</td>
    <td class="pp"><input type="text" name="name" required value="<?=$item['name']?>"/></td>
  </tr>
  <tr>
    <td class="tt ct">商品價格</td>
    <td class="pp"><input type="text" name="price" required value="<?=$item['price']?>"/></td>
  </tr>
  <tr>
    <td class="tt ct">規格</td>
    <td class="pp"><input type="text" name="type" required value="<?=$item['type']?>"/></td>
  </tr>
  <tr>
    <td class="tt ct">庫存量</td>
    <td class="pp"><input type="text" name="qt" required value="<?=$item['qt']?>"/></td>
  </tr>
  <tr>
    <td class="tt ct">商品圖片</td>
    <td class="pp"><input type="file" name="pic" required /></td><font color="red">可不選擇</font color>
  </tr>
  <tr>
    <td class="tt ct">商品介紹</td>
    <td class="pp"><textarea name="textarea" id="info" cols="45" rows="5"><?=$item['info']?></textarea></td>
  </tr>
  <tr class="ct">
    <td colspan="2"><input type="submit" name="button" id="button" value="送出" />
      <input type="reset" name="button2" id="button2" value="重設" />
      <input type="button" name="button3" id="button3" value="返回" /></td>
    </tr>
    <!-- input:待 -->
</table>
</form>
<script>
function dropdown_api(){
  $('#cat2').html('');
  var parent=$('#cat1').val();
  $.post('api.php',{'do':'dropdown_api',parent},function(aa){
    $('#cat2').append(aa);
  });
}
</script>
