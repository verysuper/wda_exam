<?php
//====================================修改內容=====================================================
  if(isset($_POST["my_alt"][0])){
    $sql = "update a_1_7_total set a_1_7_t_cnt = '".$_POST["my_alt"]."'";
    mysqli_query($link,$sql);
    ?><script>document.location.href="admin.php?do=admin&redo=total"</script><?php
  }
//====================================修改內容=====================================================

    $sql="select * from a_1_7_total";
    $or =mysqli_query($link,$sql);
    $oo = mysqli_fetch_assoc($or);
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">進站總人數管理</p>
  <form method="post">
    <table width="100%">
        <tr>
          <td width="20%">進站總人數</td>
          <td width="80%"><input name="my_alt" value="<?=$oo["a_1_7_t_cnt"]?>" style="width:100%;"></td>
        </tr>
    </table>
    <table style="margin-top:40px; width:70%;">
      <tbody>
        <tr>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>    
  </form>
</div>