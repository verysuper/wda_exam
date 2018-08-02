<?php
  if(isset($_GET['i'])){
    $sql="select * from p_item where id='{$_GET['i']}'";
    $row=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
  }
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
    <td class="pp ct">編號:<?=$row['no']?></td><!-- 隨便 -->
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
      <!-- 購買數量:<input type="text" />
      <img src="assets/0402.jpg"  onclick="lof('?do=buycart&i=<?=$row["id"]?>')"> -->
      <form action="api.php" method="post"><!--note:購物車偵測登入狀態，當點選購物車時，進入購物車的管理頁面，此頁面需偵測是否處於登入狀態
	如果未登入的話則跳頁到會員登入頁面，會員登入成功時把剛購買的資料新增購物車	如果有登入的話則新增資料到購物車-->
        購買數量:
        <input type="text" name="buy_qty" value="1"/>
        <input type="hidden" name="itemid" value="<?=$row['id']?>">
        <input type="submit" name="to" value="check_login"
         style="width:60px;height:20px;background-image:url(assets/0402.jpg);border-style: none;">
      </form>
    </td>
  </tr>
    <tr>
    <td colspan="2" align='center'>
      <input type="button" value="返回" onclick='history.go(-1);'>
    </td>
  </tr>
</table>

