<?php
  if(isset($_POST['item2']) && $_POST['item2']=='修改'){
    // foreach($_POST as $key => $value){
    //   $$key = $value;      
    // }
    if(!empty($_POST['cat1'])){
      $c1=$_POST['cat1'];
    }else{
      $c1=$_POST['c1'];
    }
    if(!empty($_POST['cat2'])){
      $c2=$_POST['cat2'];
    }else{
      $c2=$_POST['c2'];
    }
    if(!empty($_FILES['pic']['name'])){ //upload 判斷必須是 !empty($_FILES['pic']['name'])
      $pic_name = time('now') . "." . end(explode(".", $_FILES['pic']['name']));//圖片名稱+副檔名<-使用time('now')防重複
      copy($_FILES['pic']['tmp_name'],'assets/'.$pic_name);
    }else{
      $pic_name=$_POST['oldfile'];
    }
    $sql="update p_item set c1='{$c1}',c2='{$c2}',name='{$_POST['name']}',
     type='{$_POST['type']}',qt='{$_POST['qt']}',price='{$_POST['price']}',
     info='{$_POST['info']}',img='{$pic_name}',sell='1' WHERE id='{$_POST['id']}'";
    // echo $sql;
     $conn->query($sql);
  }
  if(isset($_GET['edit_id'])){
    $sql="select * from p_item where id = '{$_GET['edit_id']}'";
    $item=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
    $result=$conn->query("select * from p_cat");
    $cat=$result->fetchAll();
    echo $item['img'];
  }
?>

<form action="" method="post" enctype="multipart/form-data">
<table width="80%" border="0" align="center">
<caption><h1>修改商品</h1></caption>
  <tr>
    <td class="tt ct">所屬大類</td>
    <td class="pp">
      <select name="cat1" id="cat1" onchange="dropDownList_api()">
        <option value="">請選擇一項</option>
      <?php
        $result=$conn->query("select * from p_cat where parent=0");
        while($row=$result->fetch(PDO::FETCH_ASSOC)){
          ?><option value="<?=$row['id']?>"><?=$row['name']?></option><?php
        }
      ?>
      </select><font color="red">可不選擇，原為"<?=$cat[$item['c1']-1]['name']?>"</font>
    </td>
  </tr>
  <tr>
    <td class="tt ct">所屬中類</td>
    <td class="pp">
      <select name="cat2" id="cat2" >
        <option value="">請先選擇大類</option>
      </select><font color="red">可不選擇，原為"<?=$cat[$item['c2']-1]['name']?>"</font>
    </td>
  </tr>
  <tr>
    <td class="tt ct">商品編號</td>
    <td class="pp">完成分類後自動分配<font color="red">原為"<?=$item['no']?>"</font></td>
  </tr>
  <tr>
    <td class="tt ct">商品名稱</td>
    <td class="pp"><input type="text" name="name" value="<?=$item['name']?>" required/></td>
  </tr>
  <tr>
    <td class="tt ct">商品價格</td>
    <td class="pp"><input type="text" name="price" value="<?=$item['price']?>" required/></td>
  </tr>
  <tr>
    <td class="tt ct">規格</td>
    <td class="pp"><input type="text" name="type" value="<?=$item['type']?>" required/></td>
  </tr>
  <tr>
    <td class="tt ct">庫存類</td>
    <td class="pp"><input type="text" name="qt" value="<?=$item['qt']?>" required/></td>
  </tr>
  <tr>
    <td class="tt ct">商品圖片</td>
    <td class="pp"><input type="file" name="pic"/><font color="red">可不選擇</font></td>
  </tr>
  <tr>
    <td class="tt ct">商品介紹</td>
    <td class="pp"><textarea name="info" id="textarea" cols="45" rows="5" required><?=$item['info']?></textarea></td>
  </tr>
  <tr>
    <td colspan="2">
    <input type="submit" name="item2" id="button" value="修改" />
    <input type="reset" name="button2" id="button2" value="重置" />
    <input type="button" value="返回" onclick='history.go(-1);'>
    </td>
  </tr>
</table>
<input type="hidden" name="id" value="<?=$item['id']?>"><!--補原資料-->
<input type="hidden" name="c1" value="<?=$item['c1']?>"><!--補原資料-->
<input type="hidden" name="c2" value="<?=$item['c2']?>"><!--補原資料-->
<input type="hidden" name="oldfile" value="<?=$item['img']?>"><!--補原資料-->
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
