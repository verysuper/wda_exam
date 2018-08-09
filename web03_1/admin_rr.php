

<div class="mm">
<form action="" method="post">
<table width="80%" border="0" align="center">
  <tr>
    <td colspan="4">預告片清單</td>
    </tr>
  <tr>
    <td>預告片海報</td>
    <td>預告片片名</td>
    <td>預告片排序</td>
    <td>操作</td>
  </tr>
  <?php
  $sql="select * from rr";
  $result=$conn->query($sql)->fetchAll();
  //print_r($result);
  for($i=0;$i<count($result);$i++){
    
  }
  ?>
  <tr>
    <td><img src="imgs/" alt=""></td>
    <td><input type="text" name="textfield" id="textfield" /></td>
    <td><input type="text" name="textfield2" id="textfield2" /></td>
    <td>
      <input type="checkbox" name="checkbox" id="checkbox" />顯示
      <input type="checkbox" name="checkbox2" id="checkbox2" />刪除
    </td>
  </tr>
  <tr>
    <td colspan="4"><input type="submit" name="button" id="button" value="送出" />
      <input type="reset" name="button2" id="button2" value="重設" /></td>
    </tr>
</table>

</form>

</div>

