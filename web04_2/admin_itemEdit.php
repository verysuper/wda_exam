<?php

  if(isset($_POST['admin_itemEdit'])){
    foreach($_POST as $key => $value){
      $$key = $value;
    }
    if(!empty($_FILES['pic']['name'])){
      $pic_name=$no.".".explode('.',$_FILES['pic']['name'])[1];
      copy($_FILES['pic']['tmp_name'],'assets/'.$pic_name);
    }
    if(!empty($_POST['cat1'])){
      $c1=$_POST['cat1'];
    }
    if(!empty($_POST['cat2'])){
      $c2=$_POST['cat2'];
    }
    $sql="update p_item set
          c1='{$c1}',
          c2='{$c2}',
          name='{$name}',
          price='{$price}',
          type='{$type}',
          qt='{$qt}',
          pic='{$pic_name}',
          info='{$info}'
          where id='{$id}'";
    echo $sql;
    $conn->query($sql);
  }
  if(isset($_GET['id'])){
    $sql="select * from p_item where id = '{$_GET['id']}'";
    $item=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
    //echo $row['name'];
  }
?>
<form action="" method="post" enctype="multipart/form-data">
<table width="80%" border="0" align="center">
<caption><h1>修改商品</h1></caption>
  <tr>
    <td class="tt ct">所屬大類</td>
    <td class="pp"><select name="cat1" id="cat1" onchange="dropdown_api()">
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
    <td class="pp"><select name="cat2" id="cat2" >
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
    <td class="pp"><input type="file" name="pic" /><font color="red">可不選擇</font color></td>
  </tr>
  <tr>
    <td class="tt ct">商品介紹</td>
    <td class="pp"><textarea name="info" id="info" cols="45" rows="5"><?=$item['info']?></textarea></td>
  </tr>
  <tr class="ct">
    <td colspan="2"><input type="submit" name="admin_itemEdit" id="button" value="送出" />
      <input type="reset" name="button2" id="button2" value="重設" />
      <a href="?redo=admin_th2"><input type="button" name="button3" id="button3" value="返回" /></a></td>
    </tr>
    <input type="hidden" name="c1" value="<?=$item['c1']?>">
    <input type="hidden" name="c2" value="<?=$item['c2']?>">
    <input type="hidden" name="id" value="<?=$item['id']?>">
    <input type="hidden" name="pic_name" value="<?=$item['pic']?>">
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
