<?php
  if(isset($_POST['admin_itemAdd'])){
    foreach($_POST as $key => $value){
      $$key = $value;
    }
    $pic=$no.".".explode('.',$_FILES['pic']['name'])[1];
    if(copy($_FILES['pic']['tmp_name'],$pic)){
      $sql="insert into p_item value(null,'{$cat1}','{$cat2}','{$no}','{$name}','{$type}','{$qt}','{$price}','{$pic}','{$info}','0')";
      $conn->query($sql);
      echo $sql;
    }
  }
?>
<form action="" method="post" enctype="multipart/form-data">
<table width="80%" border="0" align="center">
<caption><h1>新增商品</h1></caption>

  <tr>
    <td class="tt ct">所屬大類</td>
    <td class="pp"><select name="cat1" id="cat1" required onchange="dropdown_api()">
    <option value="">請選擇一項</option>
    <?php
      $sql="select * from p_cat where parent=0";
      $result=$conn->query($sql);
      while($row=$result->fetch(PDO::FETCH_ASSOC)){
        ?><option value="<?=$row['id']?>"><?=$row['name']?></option><?php
      }
    ?>
    </select></td>
  </tr>
  <tr>
    <td class="tt ct">所屬中類</td>
    <td class="pp"><select name="cat2" id="cat2" required>
    <option value="">請先選擇大項</option>
    </select></td>
  </tr>
  <tr>
    <td class="tt ct">商品編號</td>
    <td class="pp">完成分類後自動分配</td>
    <input type="hidden" name="no" value="<?=substr(time(),-6)?>">
  </tr>
  <tr>
    <td class="tt ct">商品名稱</td>
    <td class="pp"><input type="text" name="name" required/></td>
  </tr>
  <tr>
    <td class="tt ct">商品價格</td>
    <td class="pp"><input type="text" name="price" required /></td>
  </tr>
  <tr>
    <td class="tt ct">規格</td>
    <td class="pp"><input type="text" name="type" required /></td>
  </tr>
  <tr>
    <td class="tt ct">庫存量</td>
    <td class="pp"><input type="text" name="qt" required /></td>
  </tr>
  <tr>
    <td class="tt ct">商品圖片</td>
    <td class="pp"><input type="file" name="pic" required /></td>
  </tr>
  <tr>
    <td class="tt ct">商品介紹</td>
    <td class="pp"><textarea name="info" required cols="45" rows="5"></textarea></td>
  </tr>
  <tr class="ct">
    <td colspan="2"><input type="submit" name="admin_itemAdd" id="button" value="送出" />
      <input type="reset" name="button2" id="button2" value="重設" />
      <input type="button" name="button3" id="button3" value="返回" /></td>
    </tr>
</table>

</form>
<script>
function dropdown_api(){
    $('#cat2').html("");
    var parent =$('#cat1').val();
    $.post('api.php',{'do':'dropdown_api',parent},function(aa){
      $('#cat2').append(aa);
    });
  }
</script>

