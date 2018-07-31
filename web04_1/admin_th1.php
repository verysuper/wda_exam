<?php

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
    <input type="text" name="textfield" id="textfield" />
    <input type="submit" name="button2" id="button2" value="新增" /></td>
  </form>
  </tr>
  <tr>
  <form action="" method="post"><!--新增中類-->
    <td colspan="2">新增中類
      <select name="select" id="select">
        <option>test</option>
        <option value="1">option1</option>
      </select>
      <input type="text" name="textfield" id="textfield" />
      <input type="submit" name="button2" id="button2" value="新增" />
    </td>
  </form>
  </tr>
<?php
  //read
  $result = $conn->query("select * from p_cat");
  $cat = $result->fetchAll();
  //echo count($cat);
  for ($i = 0; $i < count($cat); $i++) {
      if ($cat[$i]['parent'] == 0) {
          //echo $cat[$i]['name'];
          ?>
            <tr  class="tt ct">
    <td><?=$cat[$i]['name']?></td>
    <td><input type="submit" name="button" id="button" value="修改" />
    <input type="submit" name="button2" id="button2" value="刪除" /></td>
  </tr>
          <?php
          for ($j = 0; $j < count($cat); $j++) {
            if($cat[$j]['parent'] == $cat[$i]['id']){
              ?>
                <tr  class="pp ct">
    <td><?=$cat[$j]['name']?></td>
    <td><input type="submit" name="button3" id="button3" value="修改" />
    <input type="submit" name="button4" id="button4" value="刪除" /></td>
  </tr>
              <?php
            }
          }
      }
  }
?>


</table>
