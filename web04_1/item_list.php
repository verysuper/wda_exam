<?php
  //from product list (index.php)
  $title = "";
  if(isset($_GET['c1'])){
    $c1=$_GET['c1'];
    $title .= $cat[$c1-1]['name'];
    $result=$conn->query("select * from p_item where c1={$c1}");
  }else{
    $title .= "全部商品";
    $result=$conn->query("select * from p_item");
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
        <img src="assets/0402.jpg" onclick="lof('?do=buycart&i=<?=$row["id"]?>')">
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
