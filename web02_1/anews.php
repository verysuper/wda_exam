<?php
//uptata
if (isset($_POST['anews'])) {
    for ($i = 0; $i < count($_POST['id']); $i++) {
        $sql = "update article set display = 0 where id='{$_POST['id'][$i]}'";
        $result = $conn->query($sql);
    }
    if (!empty($_POST['display'])) {
        for ($i = 0; $i < count($_POST['display']); $i++) {
            $sql = "update article set display = 1 where id = '{$_POST['display'][$i]}'";
            $result = $conn->query($sql);
        }
    }
    if (!empty($_POST['del'])) {
        for ($i = 0; $i < count($_POST['del']); $i++) {
            $sql = "delete from article where id = '{$_POST['del'][$i]}'";
            $result = $conn->query($sql);
        }
    }
}
//read
$sql = "select * from article";
$result = $conn->query($sql);
$amount = $result->rowCount();
$pItems = 3;
$pCurr = 1;
if (!empty($_GET['p'])) {
    $pCurr = $_GET['p'];
}
$start = $pCurr * $pItems - $pItems;
$sql2 = "select * from article limit {$start},{$pItems}";
$result2 = $conn->query($sql2);
?>
<form action="" method="post">
<table width="100%" border="0">
  <tr>
    <td width='5%'>編號</td>
    <td width='85%'>標題</td>
    <td width='5%'>顯示</td>
    <td width='5%'>刪除</td>
  </tr>
  <?php
while ($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
    ?>
  <tr>
    <td><?=$row2['id']?><input type="hidden" name="id[]" value="<?=$row2['id']?>"></td>
    <td><?=$row2['title']?></td>
    <td><input type="checkbox" name="display[]" value="<?=$row2['id']?>" <?=($row2['display'] > 0 ? 'checked' : '')?>/></td>
    <td><input type="checkbox" name="del[]" value="<?=$row2['id']?>" /></td>
  </tr>
    <?php }?>
  <tr>
    <td colspan="4">
      <?php
$pTotal = ceil($amount / $pItems);
$last = $pCurr - 1;
$next = $pCurr + 1;
if ($pCurr > 1) {
    ?><a href="?do=anews&p=<?=$last?>"><</a><?php
}
for ($i = 1; $i <= $pTotal; $i++) {
    ?><a href="?do=anews&p=<?=$i?>" style="font-size:<?=($i == $pCurr ? "50px" : "20px")?>;"><?=$i?></a><?php
}
if ($pCurr < $pTotal) {
    ?><a href="?do=anews&p=<?=$next?>">></a><?php
}
?>
    </td>
  </tr>
  <tr>
    <td colspan="4"><input type="submit" value="確定修改"/></td>
  </tr>
</table>
<input type="hidden" name="anews">
</form>
