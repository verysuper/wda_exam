<div style="width:99%; height:87%; margin:auto; overflow:auto;">
  <p class="t cent botli">新增最新消息資料</p>
  <form method="post" enctype="multipart/form-data">
    <table width="100%">
      <tbody>
        <!-- <tr>
          <td width="40%" align="right">標題區圖片</td>
          <td width="60%" align="left"><input name="pic" type="file" required/></td>
        </tr> -->
        <tr>
          <td width="40%" align="right">最新消息資料</td>
          <td width="60%" align="left"><textarea name="content" cols="100" rows="3" style="width:90%;" required></textarea></td>
        </tr>
        <tr>
          <td width="40%" align="right">
            <input type="submit" value="新增"><input type="reset" value="重置">
          </td>
          <td width="60%" align="left"></td>
        </tr>
      </tbody>
  </table>
  <input type="hidden" name="news"" value="add" /><!-- note -->
  </form>
</div>
