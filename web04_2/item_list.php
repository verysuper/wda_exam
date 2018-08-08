<?php
  if(!empty($_GET['c1'])){
    if(!empty($_GET['c2'])){
      $sql="select * from p_item where c1={$_GET['c1']} and c2={$_GET['c2']} and sell=1";      
    }else{
      $sql = "select * from p_item where c1={$_GET['c1']} and sell=1";
    }    
  }else{
    $sql = "select * from p_item where sell=1";
  }
?>

<table width="80%" border="0" align="center">
  <?php
    $result=$conn->query($sql);
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      ?>
          <tr>
    <td rowspan="4" class="pp ct">
      <a href="?do=item_detail&id=<?=$row['id']?>">
        <img src="assets/<?=$row['pic']?>" alt="" width="200"></a></td>
    <td class="tt ct"><?=$row['name']?></td>
  </tr>
  <tr>
    <td class="pp">價錢:<?=$row['price']?>
    <!-- ****************偵測登入狀態****************** -->
    <span style="float:right;">
      <form action="api.php" method="post">
        <input type="submit" name="do" value="chklogin" style="background-image:url(assets/0402.jpg); width:57px;height:18px;">
        <input type="hidden" name="id" value="<?=$row['id']?>">
        <input type="hidden" name="qt" value="1">
      </form>
    </span>
    </td>
  </tr>
  <tr>
    <td class="pp">規格:<?=$row['type']?></td>
  </tr>
  <tr>
    <td class="pp">簡介:<?=$row['info']?></td>
  </tr>
      <?php
    }
  ?>

</table>
