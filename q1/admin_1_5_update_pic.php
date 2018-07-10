<?php
  include_once("head_admin.php");
  $sql="select * from a_1_5_mv_pic where a_1_5_m_p_seq = '".$_GET["pic"]."'";
  $or =mysqli_query($link,$sql);
  $oo = mysqli_fetch_assoc($or);
?>
<div style="width:100%; height:87%; margin:auto; overflow:auto;">
  <p class="t cent botli">修改動畫圖片</p>
  <form method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
          <td width="45%" align="right">動畫圖片：</td>
          <td width="55%" align="left">
            <input name="update_pic" type="file">
            <input name="update_pic_no" type="hidden" value = "<?=$_GET["pic"]?>">
            <input name="update_pic_name" type="hidden" value = "<?=$oo["a_1_5_m_p_pic"]?>">
          </td>
        </tr>
    </table>
    <table width="100%">
        <tr>
          <td align="center"><input type="submit" value="新增"><input type="reset" value="重置"></td>
        </tr>
    </table>
  </form>
</div>