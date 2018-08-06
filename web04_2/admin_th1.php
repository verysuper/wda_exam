<table width="80%" border="0">
  <tr>
    <td colspan="2">
      商品分類 | <a href="">商品管理</a>
    </td>
  </tr>
  <tr>
    <td colspan="2"><h1>商品分類</h1></td>
  </tr>
  <tr>
    <td colspan="2">
      新增大類
      <input type="text" name="c1" id="">
      <input type="submit" value="新增">
    </td>
  </tr>
  <tr>
    <td colspan="2">
      新增中類
      <select name="" id="">
        <option value="">test</option>
      </select>
      <input type="text" name="c1" id="">
      <input type="submit" value="新增">
    </td>
  </tr>
  <?php
    $sql="select * from p_cat";
    $catAll=$conn->query($sql)->fetchAll();
    // print_r($catAll);
    for($i=0;$i<count($catAll);$i++){
      if($catAll[$i]['parent']==0){
?>
        <tr class="tt">
          <td><?=$catAll[$i]['name']?></td>
          <td class="ct">
            <input type="button" value="修改" onclick="cat_api('<?=$catAll[$i]['id']?>','1')">
            <input type="button" value="刪除" onclick="cat_api('<?=$catAll[$i]['id']?>','2')">
          </td>
        </tr>
          <?php
            for($j=0;$j<count($catAll);$j++){
              if($catAll[$i]['id']==$catAll[$j]['parent']){
                ?>
                  <tr class="pp">
                    <td><?=$catAll[$j]['name']?></td>
                    <td class="ct">
                      <input type="button" value="修改" onclick="cat_api('<?=$catAll[$j]['id']?>','1')">
                      <input type="button" value="刪除" onclick="cat_api('<?=$catAll[$j]['id']?>','2')">
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
  function cat_api(id,action){
    if(action==1){
      if(name=prompt()){
        $.post('api.php',{'to':'categore','id':id,name,action},function(aa){
          document.location.href='admin.php?redo=admin_th1';
        });
      }
    }
    if(action==2){
        $.post('api.php',{'to':'categore',id,action},function(aa){
          document.location.href='admin.php?redo=admin_th1';
        });
    }
  }
</script>
