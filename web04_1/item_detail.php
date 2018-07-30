<?php
  if(isset($_GET['i'])){
    $sql="select * from p_item where id='{$_GET['i']}'";
    $row=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
  }
  echo time('now');
?>

<table width="100%" border="0">
<caption><h1><?=$row['name']?></h1></caption>
  <tr>
    <td rowspan="5" class="pp ct">
      <img src="assets/<?=$row['img']?>" width="400">
    </td>
    <td  class="pp ct">分類:<?php echo $cat[$row['c1']-1]['name'].">".$cat[$row['c2']-1]['name']?></td><!-- mapping index 的 cat array -->
  </tr>
  <tr>
    <td class="pp ct">編號:107070<?=$row['id']?></td><!-- 隨便 -->
  </tr>
  <tr>
    <td class="pp ct">價格:<?=$row['price']?></td>
  </tr>
  <tr>
    <td class="pp ct">詳細說明:<?=$row['info']?></td>
  </tr>
  <tr>
    <td class="pp ct">庫存量:<?=$row['qt']?></td>
  </tr>
  <tr>
    <td colspan="2"  class="tt ct">
      購買數量:<input type="text" />
      <img src="assets/0402.jpg"  onclick="lof('?do=buycart&i=<?=$row["id"]?>')">
    </td>
  </tr>
    <tr>
    <td colspan="2" align='center'>
      <input type="button" value="返回" onclick='history.go(-1);'>
    </td>
  </tr>
</table>

