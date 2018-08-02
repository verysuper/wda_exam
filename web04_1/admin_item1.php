<?php
  if(isset($_POST['item1']) && $_POST['item1']=='新增'){
    foreach($_POST as $key => $value){
      $$key = $value;      
    }
    $no=substr(time('now'),-6);//商品編號<-隨便定6字碼，因無任何關聯
    $pic_name = time('now') . "." . end(explode(".", $_FILES['pic']['name']));//圖片名稱+副檔名<-使用time('now')防重複
    if(copy($_FILES['pic']['tmp_name'],'assets/'.$pic_name)){
      $sql="insert into p_item value(null,'{$cat1}','{$cat2}','{$no}','{$name}','{$type}','{$qt}','{$price}','{$info}','{$pic_name}','1')";
      $conn->query($sql);      
    }
  }
?>

<form action="" method="post" enctype="multipart/form-data">
<table width="80%" border="0" align="center">
<caption><h1>新增商品</h1></caption>
  <tr>
    <td class="tt ct">所屬大類</td>
    <td class="pp">
      <select name="cat1" id="cat1" required onchange="dropDownList_api()">
        <option value="">請選擇一項</option>
      <?php
        $result=$conn->query("select * from p_cat where parent=0");
        while($row=$result->fetch(PDO::FETCH_ASSOC)){
          ?><option value="<?=$row['id']?>"><?=$row['name']?></option><?php
        }
      ?>
      </select>
    </td>
  </tr>
  <tr>
    <td class="tt ct">所屬中類</td>
    <td class="pp">
      <select name="cat2" id="cat2" required>
        <option value="">請先選擇大類</option>
      </select>
    </td>
  </tr>
  <tr>
    <td class="tt ct">商品編號</td>
    <td class="pp">完成分類後自動分配</td>
  </tr>
  <tr>
    <td class="tt ct">商品名稱</td>
    <td class="pp"><input type="text" name="name" id="textfield3" required/></td>
  </tr>
  <tr>
    <td class="tt ct">商品價格</td>
    <td class="pp"><input type="text" name="price" id="textfield4" required/></td>
  </tr>
  <tr>
    <td class="tt ct">規格</td>
    <td class="pp"><input type="text" name="type" id="textfield" required/></td>
  </tr>
  <tr>
    <td class="tt ct">庫存類</td>
    <td class="pp"><input type="text" name="qt" id="textfield2" required/></td>
  </tr>
  <tr>
    <td class="tt ct">商品圖片</td>
    <td class="pp"><input type="file" name="pic" id="fileField" required/></td>
  </tr>
  <tr>
    <td class="tt ct">商品介紹</td>
    <td class="pp"><textarea name="info" id="textarea" cols="45" rows="5" required></textarea></td>
  </tr>
  <tr>
    <td colspan="2">
    <input type="submit" name="item1" id="button" value="新增" />
    <input type="reset" name="button2" id="button2" value="重置" />
    <input type="button" value="返回" onclick='history.go(-1);'>
    </td>
  </tr>
</table>
</form>
<script>
  function dropDownList_api(){
    $('#cat2').html("");
    var parent =$('#cat1').val();
    $.post('api.php',{'to':'dropDownList_api',parent},function(optionList){
      $('#cat2').append(optionList);
    });
  }
</script>
