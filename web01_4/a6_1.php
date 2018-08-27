<?php
  if(isset($_POST['a6_1'])){
    for($i=0;$i<count($_POST['bottom']);$i++){
      $sql="UPDATE `bottom` SET bottom='{$_POST['bottom'][$i]}' WHERE id='1'";
      $conn->query($sql);
    }
  }
?>
<p class="t cent botli">頁尾版權區管理</p>
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
    $sql="SELECT * FROM `bottom` ";
    $result=$conn->query($sql);
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      ?>
        <tr class="yel">
          <td width="45%">頁尾版權資料:</td>
          <td width="23%">
            <input type="text" name="bottom[]" value="<?=$row['bottom']?>" style="width:80%;"/>            
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
<input type="submit" value="修改確定" name="a6_1">
<input type="reset" value="重置">
</td>
</tr>
</tbody></table>   
</form>
