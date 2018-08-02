<?php
  if(!empty($_GET['p']) && $_GET['p']=='1'){
    ?>
    <table width="80%" border="0" align="center">
<caption><h1>最新消息</h1></caption>
  <tr>
    <td class="tt ct">標題</td>
    <td class="pp ct">年終特賣會開跑了</td>
  </tr>
  <tr>
    <td class="tt ct">內容</td>
    <td class="pp ct">即日期至年底，凡會員購物滿仟送佰，買越多送越多~</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="button" name="button" id="button" value="按鈕" onclick="history.go(-1)"/></td>
  </tr>
</table>
    <?php
  }
if (!empty($_GET['p']) && $_GET['p'] == '2') {
    ?>
    <table width="80%" border="0" align="center">
<caption><h1>最新消息</h1></caption>
  <tr>
    <td class="tt ct">標題</td>
    <td class="pp ct">情人節特惠活動</td>
  </tr>
  <tr>
    <td class="tt ct">內容</td>
    <td class="pp ct">為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="button" name="button" id="button" value="按鈕" onclick="history.go(-1)"/></td>
  </tr>
</table>
    <?php
}
?>
