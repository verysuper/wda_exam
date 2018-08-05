<?php
  //from product list (index.php)
  $title = "";
  if(isset($_GET['c1'])){
    $c1=$_GET['c1'];
    $title .= $cat[$c1-1]['name'];
    $result=$conn->query("select * from p_item where c1={$c1}");
  }else{
    $title .= "全部商品";
    $result=$conn->query("select * from p_item where sell=1");
  }
  if(isset($_GET['c2'])){
    $c2=$_GET['c2'];
    $title .= ">".$cat[$c2-1]['name'];
    $result=$conn->query("select * from p_item where c2={$c2}");
  }
  echo "<h2>".$title."</h2>";
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
?>
<table class="all" width="100%" border="0">
  <tr>
    <td rowspan="4" class="pp ct" width="40%">
      <a href="index1.php?do=item_detail&i=<?=$row["id"]?>">
        <img src="assets/<?=$row["img"]?>" width="200"/>
      </a>
    </td>
    <td class="tt ct"><?=$row["name"]?></td>
  </tr>
  <tr>
    <td class="pp ct">
      價錢:<?=$row["price"]?>
      <span style="float:right">        
      <form action="api.php" method="post"><!--note:購物車偵測登入狀態，當點選購物車時，進入購物車的管理頁面，此頁面需偵測是否處於登入狀態
	如果未登入的話則跳頁到會員登入頁面，會員登入成功時把剛購買的資料新增購物車	如果有登入的話則新增資料到購物車-->
        <input type="hidden" name="buy_qty" value="1"/>
        <input type="hidden" name="itemid" value="<?=$row['id']?>">
        <input type="submit" name="to" value="check_login"
         style="width:60px;height:20px;background-image:url(assets/0402.jpg);border-style: none;">
      </form>
      </span>
    </td>
  </tr>
  <tr>
    <td class="pp ct">規格:<?=$row["type"]?></td>
  </tr>
  <tr>
    <td class="pp ct">簡介:<?=$row["info"]?></td>
  </tr>
</table>
<?php }?>
