<?php
  if($_GET['redo']=='admin_orderDetail'){
    $sql="select * from p_order where o_no = '{$_GET['no']}'";
    $result=$conn->query($sql)->fetchAll();
    // print_r($result);
  }
?>
<form action="" method="post">
<table width="80%" border="0" align="center">
<caption>
<h2>訂單編號<?=$_GET['no']?>的詳細資料</h2></caption>
  <tr>
    <td class="tt ct">登入帳號</td>
    <td colspan="4" class="pp"><?=$result[0]['acc']?><input type="hidden" name="acc" value="<?=$result[0]['acc']?>" /></td>
    </tr>
  <tr>
    <td class="tt ct">姓名</td>
    <td colspan="4" class="pp"><input type="text" name="name" value="<?=$result[0]['name']?>" /></td>
    </tr>
  <tr>
    <td class="tt ct">電子信箱</td>
    <td colspan="4" class="pp"><input type="text" name="mail" value="<?=$result[0]['mail']?>" /></td>
    </tr>
  <tr>
    <td class="tt ct">聯絡地址</td>
    <td colspan="4" class="pp"><input type="text" name="addr" value="<?=$result[0]['addr']?>" /></td>
    </tr>
  <tr>
    <td class="tt ct">聯絡電話</td>
    <td colspan="4" class="pp"><input type="text" name="tel" value="<?=$result[0]['tel']?>" /></td>
    </tr>
  <tr>
    <td class="tt ct">商品名稱</td>
    <td class="tt ct">編號</td>
    <td class="tt ct">數量</td>
    <td class="tt ct">單價</td>
    <td class="tt ct">小計</td>
  </tr>
<?php
$total="";
    for($i=0;$i<count($result);$i++){
      ?>
  <tr>
    <td class="pp"><?=$result[$i]['p_name']?></td>
    <td class="pp"><?=$result[$i]['p_no']?></td>
    <td class="pp"><?=$result[$i]['p_qt']?></td>
    <td class="pp"><?=$result[$i]['p_price']?></td>
    <td class="pp"><?=$result[$i]['sub']?></td>
  </tr>
      <?php
    }
?>
  <tr>
    <td colspan="5" class="tt ct">總價:<?=$total?></td><input type="hidden" name="total" value="<?=$total?>">
    </tr>
  <tr>
    <td colspan="5" class="ct">
      <!-- <input type="submit" name="chkout" id="button" value="確定送出" />
      <a href="?do=user_buycart"><input type="button" value="返回修改訂單" /></a> -->
      <input type="button" value="返回" onclick="history.go(-1)">
    </td>
  </tr>
</table>
</form>
