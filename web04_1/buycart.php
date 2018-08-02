<?php
  if(!isset($_SESSION['user'])){
    ?><script>document.location.href="?do=userLogin";</script><?php
  }else{
    if(empty($_GET['i'])){
      echo '<h1>未選任何商品</h1>';
    }else{
      @$cart->add_item($_GET['i'], 1, '100', 'aaa');
      print_r($cart->get_contents());
      ?>
<form action="" method="post">
<table width="80%" border="0" align="center">
  <tr class="tt ct">
    <td>編號</td>
    <td>商品名稱</td>
    <td>數量</td>
    <td>庫存量</td>
    <td>單價</td>
    <td>小記</td>
    <td>刪除</td>
  </tr>
  <tr class="pp ct">

    <td></td>
    <td>&nbsp;</td>
    <td><input type="text" name="textfield" value="" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <img src="./assets/0415.jpg" alt="" onclick="document.location.href='?do=checkout'">
    </td>
    
  </tr>
  <tr class="pp ct">
    <td colspan="7">
      <img src="./assets/0411.jpg" alt="" onclick="document.location.href='index1.php'">
      <img src="./assets/0412.jpg" alt="" onclick="document.location.href='?do=checkout'">
    </td>
    </tr>
</table>
</form>
      <?php
    }
  }
?>
