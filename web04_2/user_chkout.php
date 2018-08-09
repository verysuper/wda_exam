<?php
  if(isset($_POST['chkout'])){
    foreach($_POST as $key => $value){
      $$key = $value;
    }
    $o_no=date('YmdHis',time());
    $o_date=date('Y/m/d',time());
    $str="";
    for($i=0;$i<count($_SESSION['buyItem']);$i++){
      $id=$_SESSION['buyItem'][$i];
      $qt=$_SESSION['buyQt'][$i];
      $sql="select * from p_item where id='{$id}'";
      $row=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
      $subtotal=$row['price']*$qt;
      $str .= "insert into p_order value(
                null,
                '{$acc}',
                '{$name}',
                '{$mail}',
                '{$addr}',
                '{$tel}',
                '{$row['name']}',
                '{$row['no']}',
                '{$qt}',
                '{$row['price']}',
                '{$subtotal}',
                '{$total}',
                '{$o_no}',
                '{$o_date}');";
    }
    //echo $str;
    $conn->query($str);
    unset($_SESSION['buyItem']);
    unset($_SESSION['buyQt']);
    ?>
    <script>
      alert('訂購成功,感謝您的選購');
      document.location.href='index1.php';
    </script>
    <?php
    //header('location:index1.php');
  }
  if(!isset($_SESSION['user'])){
    header('location:index1.php?do=user_login');
  }else{
    $sql="select * from user where acc='{$_SESSION['user']}'";
    // echo $sql;
    $row=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);  
  }
?>
<form action="" method="post">
<table width="80%" border="0" align="center">
<caption><h1>填寫資料</h1></caption>
  <tr>
    <td class="tt ct">登入帳號</td>
    <td colspan="4" class="pp"><?=$row['acc']?><input type="hidden" name="acc" value="<?=$row['acc']?>" /></td>
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
    <td colspan="4" class="pp"><input type="text" name="addr" value="<?=$row['addr']?>" /></td>
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
    <td class="tt ct">小計</td>
  </tr>
<?php
$total="";
    for($i=0;$i<count($_SESSION['buyItem']);$i++){
      $id=$_SESSION['buyItem'][$i];
      $qt=$_SESSION['buyQt'][$i];
      $sql="select * from p_item where id='{$id}'";
      $row=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
      $subtotal=$row['price']*$qt;
      $total = $total+$subtotal;
      ?>
  <tr>
    <td class="pp"><?=$row['name']?></td>
    <td class="pp"><?=$row['no']?></td>
    <td class="pp"><?=$qt?></td>
    <td class="pp"><?=$row['price']?></td>
    <td class="pp"><?=$subtotal?></td>
  </tr>
      <?php
    }
?>
  <tr>
    <td colspan="5" class="tt ct">總價:<?=$total?></td><input type="hidden" name="total" value="<?=$total?>">
    </tr>
  <tr>
    <td colspan="5" class="ct">
      <input type="submit" name="chkout" id="button" value="確定送出" />
      <a href="?do=user_buycart"><input type="button" value="返回修改訂單" /></a>
    </td>
  </tr>
</table>

</form>
