<?php
  $sql="select * from user where acc='{$_SESSION["user"]}'";
  $row=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
?>
<form action="" method="post">
<table width="80%" border="0" align="center">
<caption><h1>填寫資料</h1></caption>
  <tr>
    <td class="tt ct">登入帳號</td>
    <td colspan="4" class="pp"><?=$row['acc']?></td>
    </tr>
  <tr>
    <td class="tt ct">姓名</td>
    <td colspan="4" class="pp"><input type="text" name="name" value="<?=$row['name']?>" /></td>
    </tr>
  <tr>
    <td class="tt ct">電子信箱</td>
    <td colspan="4" class="pp"><input type="text" name="mail" value="<?=$row['mail']?>" /></td>
    </tr>
  <tr>
    <td class="tt ct">聯絡地址</td>
    <td colspan="4" class="pp"><input type="text" name="address" value="<?=$row['address']?>" /></td>
    </tr>
  <tr>
    <td class="tt ct">聯絡電話</td>
    <td colspan="4" class="pp"><input type="text" name="tel" value="<?=$row['tel']?>" /></td>
    </tr>
  <tr>
    <td class="tt ct">商品名稱</td>
    <td class="tt ct">編號</td>
    <td class="tt ct">數量</td>
    <td class="tt ct">單價</td>
    <td class="tt ct">小記</td>
  </tr>
  <?php
    for($i=0;$i<count($_SESSION['itemid']);$i++){
      if(!empty($_SESSION['itemid'])){
        $itemid=$_SESSION['itemid'][$i];
        $buy_qty=$_SESSION['buy_qty'][$i];
        $sql="select * from p_item where id='{$itemid}'";//迴圈做查詢資料庫 非常可能發生lag
        $row=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
        ?>
  <tr class="pp ct">
    <td><?=$row['name']?></td>
    <td><?=$row['no']?></td>
    <td><?=$buy_qty?></td>
    <td><?=$row['price']?></td>
    <td><?=$row['price']*$buy_qty?></td>
  </tr>
        <?php
      }
    }
  ?>

  <tr class="tt ct">
    <td colspan="5">總價</td>
  </tr>
  <tr class="ct">
    <td colspan="5">
      <input type="button" value="確定送出" onclick="document.location.href='api.php?buycheckout'"/>
      <input type="button" value="返回修改訂單" onclick="document.location.href='?do=buycart'"/>
    </td>
  </tr>
</table>
</form>
