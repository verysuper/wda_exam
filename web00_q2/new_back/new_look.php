<?php

  if(!empty($_GET["read"])){ $now_page = $_GET["read"]; 
    $sql = "select * from article where a_look = 1 and a_seq = '$now_page'";
    $ro = mysqli_query($link,$sql);
    $rr = mysqli_fetch_assoc($ro);
  }
  ?>
  <fieldset id="left_list">
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table width="90%" border="0" align="center" cellpadding="10" cellspacing="5">
      <tr>
        <td align="center" width="50%">標題</td>
        <td align="center">內容</td>
      </tr>
  <tr>
    <td align="left" style="background-color:#f0f0f0;"><?=$rr["a_title"]?></td>
    <td align="left"><?=nl2br($rr["a_cont"])?>...</td>
  </tr>
    </table>
  </fieldset>