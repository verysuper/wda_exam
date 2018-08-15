<?php
  if(isset($_POST['delOne'])){
    $sql="DELETE FROM `morder` WHERE no = '{$_POST['no']}'";
    $conn->query($sql);
  }
  if (isset($_POST['delSelect'])) {
    if(isset($_POST['radio1'])){
      $sql = "DELETE FROM morder WHERE mdate = '{$_POST['mdate']}'";
      $conn->query($sql);
    }
    if (isset($_POST['radio2'])) {
      $sql = "DELETE FROM morder WHERE mid = '{$_POST['mid']}'";
      $conn->query($sql);
    }
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
      <input type="radio" name="radio1" id="radio1" value="radio1" />
      依日期
      <input type="text" name="mdate" value="" />
      <input type="radio" name="radio2" id="radio2" value="radio2" />
      依電影
      <select name="mid" id="select">
        <option value="">請選擇電影</option>
      <?php
        $sql = "select * from vv where display = 1 and ondate > curdate()-3"; //***** ondate > curdate()-3
        $vvArr = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($vvArr as $row) {
            ?><option value="<?=$row['id']?>"><?=$row['name']?></option><?php
        }
      ?>
      </select>
<input type="submit" name="delSelect" id="button2" value="刪除" /></td>
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
