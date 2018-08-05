<?php
  if(isset($_GET['redo']) && $_GET['redo']=='order2' && isset($_GET['no'])){
    $sql="select * from p_order where no='{$_GET['no']}'";
    $row=$conn->query($sql)->fetchAll();
    //print_r($row);
  }
?>
<form action="api.php" method="post">
<table width="80%" border="0" align="center">
<caption><h1>填寫資料</h1></caption>
  <tr>
    <td class="tt ct">登入帳號</td>
    <td colspan="4" class="pp"><?=$row[0]['acc']?></td>
    </tr>
  <tr>
    <td class="tt ct">姓名</td>
    <td colspan="4" class="pp"><?=$row[0]['name']?></td>
    </tr>
  <tr>
    <td class="tt ct">電子信箱</td>
    <td colspan="4" class="pp"><?=$row[0]['mail']?></td>
    </tr>
  <tr>
    <td class="tt ct">聯絡地址</td>
    <td colspan="4" class="pp"><?=$row[0]['address']?></td>
    </tr>
  <tr>
    <td class="tt ct">聯絡電話</td>
    <td colspan="4" class="pp"><?=$row[0]['tel']?></td>
    </tr>
  <tr>
    <td class="tt ct">商品名稱</td>
    <td class="tt ct">編號</td>
    <td class="tt ct">數量</td>
    <td class="tt ct">單價</td>
    <td class="tt ct">小記</td>
  </tr>
  <?php
    for($i=0;$i<count($row);$i++){
        ?>
  <tr class="pp ct">
    <td><?=$row[$i]['p_name']?></td><!-- -->
    <td><?=$row[$i]['p_no']?></td><!-- -->
    <td><?=$row[$i]['p_qt']?></td><!-- *** -->
    <td><?=$row[$i]['p_price']?></td><!-- -->
    <td><?=$row[$i]['p_subtotal']?></td><!-- *** -->
  </tr>
        <?php
      }
  ?>
  <tr class="tt ct">
    <td colspan="5">總價:<?=$row[0]['p_total']?></td>
  </tr>
  <tr class="ct">
    <td colspan="5">
      <input type="button" value="返回" onclick="document.location.href='admin.php?redo=order1'"/>
    </td>
  </tr>
</table>
</form>
