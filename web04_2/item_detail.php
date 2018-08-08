<?php
  if(!empty($_GET['id'])){
    $row=$conn->query("select * from p_item where id='{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);
  }
?>
<form action="api.php" method="post">
<table width="80%" border="0" align="center">
<caption><h1><?=$row['name']?></h1></caption>
  <tr class="pp ct">
    <td rowspan="5"><img src="assets/<?=$row['pic']?>" alt="" width="300"></td>
    <td>分類:<?=$row['c1']?>><?=$row['c2']?></td>
  </tr>
  <tr class="pp ct">
    <td>編號:<?=$row['no']?></td>
  </tr>
  <tr class="pp ct">
    <td>價格:<?=$row['price']?></td>
  </tr>
  <tr class="pp ct">
    <td>詳細說明:<?=$row['info']?></td>
  </tr>
  <tr class="pp ct">
    <td>庫存量:<?=$row['qt']?></td>
  </tr>
  <tr class="tt ct">
    <td colspan="2">購買數量:
      <input type="text" name="qt" value="1"/>
      <input type="submit" name="do" value="chklogin"  style="background-image:url(assets/0402.jpg); width:57px;height:18px;"/></td>
      <input type="hidden" name="id" value="<?=$row['id']?>">
    </tr>
  <tr class="ct">
    <td colspan="2"><input type="button" value="返回" onclick="history.go(-1)"/></td>
    </tr>
</table>

</form>
