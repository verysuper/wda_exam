<?php
  if(isset($_POST['a5_1'])){
    for($i=0;$i<count($_POST['total']);$i++){
      $sql="UPDATE `total` SET total='{$_POST['total'][$i]}' WHERE id='1'";
      $conn->query($sql);
    }
  }
?>
<p class="t cent botli">進站總人數管理</p>
<form method="post" action="">
<table width="100%">
<tbody>
  <tr class="yel">
    <td width="45%">&nbsp;</td>
    <td width="23%">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td></td>
  </tr>
  <?php
    $sql="SELECT * FROM `total` ";
    $result=$conn->query($sql);
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      ?>
        <tr class="yel">
          <td width="45%">進站總人數:</td>
          <td width="23%">
            <input type="text" name="total[]" value="<?=$row['total']?>" style="width:80%;"/>            
          </td>
          <td width="7%">&nbsp;</td>
          <td width="7%">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      <?php
    }
  ?>
</tbody></table>
<table style="margin-top:40px; width:70%;">
<tbody>
<tr>
<td width="200px">&nbsp;</td><td class="cent">
<input type="submit" value="修改確定" name="a5_1">
<input type="reset" value="重置">
</td>
</tr>
</tbody></table>   
</form>
