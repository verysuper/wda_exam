<p class="t cent botli">新增次選單</p>
<form action="" method="post" enctype="multipart/form-data">
<table width="100%" border="0">
  <tr>
    <td>次選單名稱</td>
    <td><input type="text" name="name" id="textfield2" required/></td>
  </tr>
  <tr>
    <td>次選單連結</td>
    <td><input type="text" name="href" id="textfield3" required/></td>
  </tr>
  <tr>
    <td colspan="2">
      <input type="hidden" name="parent" value='<?=$_GET['parent']?>'>
      <input type="submit" name="a9_21" id="button" value="新增" />
      <input type="reset" name="button2" id="button2" value="重設" />
    </td>
    </tr>
</table>
</form>
