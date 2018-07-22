
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 0px solid;">
<p class="t cent botli">新增標題區圖片</p>
<form method="post" enctype="multipart/form-data" name="form1"><!--  target="back" action="?do=tii"> -->
<table width="100%">
  <tbody>
  <tr>
    <td width="40%">標題區圖片</td>
    <td width="60%"><input type="file" name="new_title" required></td>
    <td></td>
  </tr>
  <tr>
    <td width="40%">標題區替代文字</td>
    <td width="60%"><input type="text" name="alt" required></td>
    <td></td>
  </tr>
    <tr>
      <td width="200px"><input type="submit" value="新增" />
        <input type="reset" value="重置" /></td>
    </tr>
  </tbody>
</table>
<input type="hidden" name="action" value="title_add">
</form>
</div>
