<?php
    include_once 'head.php';
    if(isset($_POST['chkout'])){
      foreach ($_POST as $key => $value) {
          $$key = $value;
      }
      $sql="select * from morder where mdate='{$mdate}' and mid='{$mid}'";// 訂單編號有規定指定電影的訂購日期
      $cnt=$conn->query($sql)->rowCount()+1;
      $no=date('Ymd',strtotime($mdate)).str_pad($cnt,4,'0',STR_PAD_LEFT);
      foreach($chair as $value){
        $sql="insert into morder value(null,'{$no}','{$mid}','{$mname}','{$mdate}','{$msess}','{$value}')";
        $conn->query($sql);
      }
    }
?>
<div id="mm">
  <div class="rb tab" style="width:95%;">
<table width="80%" border="1" align="center">
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
        foreach($chair as $value){
          $arr=str_split($value);
          echo $arr[0] . '排' . $arr[1] . '號' . '<br>';
        }
      ?>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="button" name="morder" id="button" value="送出" /></td>
  </tr>
</table>
</div></div>
<?php
  include_once 'footer.php';

?>
