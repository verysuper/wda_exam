<div style="width:99%; height:87%; margin:auto; overflow:auto;">
  <p class="t cent botli">新增標題區圖片</p>
  <form method="post" enctype="multipart/form-data">
    <table width="100%">
      <tbody>
        <tr>
          <td width="40%" align="right">標題區圖片</td>
          <td width="60%" align="left"><input name="pic" type="file" required/></td>
        </tr>
        <tr>
          <td width="40%" align="right">標題區替代文字</td>
          <td width="60%" align="left"><input name="alt" type="text" required/></td>
        </tr>
        <tr>
          <td width="40%" align="right">
            <input type="submit" value="新增"><input type="reset" value="重置">
          </td>
          <td width="60%" align="left"></td>
        </tr>
      </tbody>
  </table>
  <input type="hidden" name="title" value="add" /><!-- note -->
  </form>
</div>
