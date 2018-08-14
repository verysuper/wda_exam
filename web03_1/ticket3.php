<?php
    include_once 'head.php';
    if(isset($_POST['morder'])){
      foreach ($_POST as $key => $value) {
          $$key = $value;
      }
      $sql2="insert into morder value(null,'{$no}','{$mname}','{$mdate}','{$msess}','{$qt}','{$chair}')";
      $conn->query($sql2);
      // header('location:index1.php');
    }
    foreach($_POST as $key=>$value){
      $$key=$value;
    }
    $sql="select * from morder where odate='{$mdate}'";
    // echo $sql;
    $cnt=$conn->query($sql)->rowCount()+1;
    $no=$mdate.str_pad($cnt,4,'0',STR_PAD_LEFT);
?>
<form action="" method="post">
<table width="80%" border="0" align="center">
  <tr>
    <td colspan="2">感謝你的訂購，你的訂單編號是:<?=$no?></td>
  </tr>
  <tr>
    <td width="20%">電影名稱:</td>
    <td><?=$mname?></td>
  </tr>
  <tr>
    <td>日期:</td>
    <td><?=$mdate?></td>
  </tr>
  <tr>
    <td>場次時間:</td>
    <td><?=$msess?></td>
  </tr>
  <tr>
    <td>座位</td>
    <td>
      <?php
        $str="";
        foreach($chair as $value){
          $arr=str_split($value);
          echo $arr[0] . '排' . $arr[1] . '號' . '<br>';
          $str .= $value;
        }
      ?>
    </td>
  </tr>
  <tr>
    <input type="hidden" name="no" value="<?=$no?>">
    <input type="hidden" name="mname" value="<?=$mname?>">
    <input type="hidden" name="mdate" value="<?=$mdate?>">
    <input type="hidden" name="msess" value="<?=$msess?>">
    <input type="hidden" name="chair" value="<?=$str?>">
    <input type="hidden" name="qt" value="<?=$qt?>">
    <td colspan="2" align="center"><input type="submit" name="morder" id="button" value="送出" /></td>
  </tr>
</table>
</form>

<?php
  include_once 'footer.php';

?>
