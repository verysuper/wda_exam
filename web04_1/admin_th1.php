<?php
  if(isset($_POST['cat1button'])&&$_POST['cat1button']=='新增'){
    if(isset($_POST['cat1text'])){
      $sql="insert into p_cat values(null,'{$_POST['cat1text']}', 0)";
      $conn->query($sql);
    }
  }
  if(isset($_POST['cat2button'])&&$_POST['cat2button']=='新增'){
    if(isset($_POST['cat2text']) && isset($_POST['select'])){
      $sql="insert into p_cat values(null,'{$_POST['cat2text']}', '{$_POST['select']}')";
      $conn->query($sql);
    }
  }
  //api
  if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['parent']))
    echo $_POST['id'].",".$_POST['name'].",".$_POST['parent'];
?>
<table width="80%" border="0" align="center">
  <tr>
    <td colspan="2">
      商品分類　<a href="?do=admin&redo=th2">商品管理</a>
    </td>
  </tr>
  <tr><td><h1>商品分類</h1></td></tr>
  <tr>
  <form action="" method="post"><!--新增大類-->
    <td colspan="2">新增大類
    <input type="text" name="cat1text" id="textfield" required/>
    <input type="submit" name="cat1button" id="button2" value="新增" /></td>
  </form>
  </tr>
  <tr>
  <form action="" method="post"><!--新增中類-->
    <td colspan="2">新增中類
      <select name="select" id="select" required><!-- select name="select" -->
        <option value='' selected>請選擇</option><!-- value='' effect required -->
    <?php 
      //read
      $result = $conn->query("select * from p_cat");
      $cat = $result->fetchAll();
      for ($i = 0; $i < count($cat); $i++) {
        if ($cat[$i]['parent'] == 0) {
          ?><option value="<?=$cat[$i]['id']?>"><?=$cat[$i]['name']?></option><?php
        }
      }
    ?>
      </select>
      <input type="text" name="cat2text" id="textfield" required/>
      <input type="submit" name="cat2button" id="button2" value="新增" />
    </td>
  </form>
  </tr>
<?php
  for ($i = 0; $i < count($cat); $i++) {
      if ($cat[$i]['parent'] == 0) {
          //echo $cat[$i]['name'];
          ?>
            <tr  class="tt ct">
    <td><?=$cat[$i]['name']?></td>
    <td>
      <input type="button" value="修改" onclick="categore_api('<?=$cat[$i]['id']?>','1')" />
      <input type="button" value="刪除" onclick="categore_api('<?=$cat[$i]['id']?>','2')" />
    </td>
  </tr>
          <?php
          for ($j = 0; $j < count($cat); $j++) {
            if($cat[$j]['parent'] == $cat[$i]['id']){
              ?>
                <tr  class="pp ct">
    <td><?=$cat[$j]['name']?></td>
    <td>
      <input type="button" value="修改" onclick="categore_api('<?=$cat[$j]['id']?>','1')" />
      <input type="button" value="刪除" onclick="categore_api('<?=$cat[$j]['id']?>','2')" />
    </td>
  </tr>
              <?php
            }
          }
      }
  }
?>
</table>
<script>
function categore_api(id,action){
  if(action==1){
    if(name=prompt()){
      $.post('api.php',{'to':'categore_api',id,name,action},function(callback){
        //alert(callback);
        document.location.href='admin.php?do=admin&redo=th1';
      });
    }
  }
  if(action==2){
    $.post('api.php',{'to':'categore_api',id,action},function(callback){
      document.location.href='admin.php?do=admin&redo=th1';
    });
  }
}
</script>
