<?php
  if(isset($_POST['delOne'])){
    $sql="DELETE FROM `morder` WHERE no = '{$_POST['no']}'";
    $conn->query($sql);
  }
?>
<div id="mm">
  <div class="rb tab" style="width:95%;">
  <table width="100%" border="1" align="center">
  <tr>
    <td colspan="7" align="center">訂單清單</td>
    </tr>
<form action="" method="post">  <tr>
    <td colspan="7">快速刪除:
      <input type="radio" name="radio" id="radio" value="radio" />
      依日期
      <input type="text" name="textfield" id="textfield" />
      <input type="radio" name="radio" id="radio2" value="radio" />
依電影
<select name="select" id="select">
</select>
<input type="submit" name="button2" id="button2" value="刪除" /></td>
    </tr></form>
  <tr>
    <td>訂單編號</td>
    <td>電影名稱</td>
    <td>日期</td>
    <td>場次時間</td>
    <td>訂購數量</td>
    <td>訂購位子</td>
    <td>操作</td>
  </tr>
<?php
  $sql="select * from morder order by no desc";
  $result=$conn->query($sql);
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    ?>
    <form action="" method="post">  <tr>
    <td><?=$row['no']?></td>
    <td><?=$row['mname']?></td>
    <td><?=$row['mdate']?></td>
    <td><?=$row['msess']?></td>
    <td>1</td>
    <td><?=$row['chair']?></td>
    <td>
    <input type="hidden" name="no" value="<?=$row['no']?>">
    <input type="submit" name="delOne" id="button" value="刪除" />
    </td>
    </tr></form>
    <?php
  }
?>
</table>

  </div>
</div>
