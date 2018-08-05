<?php
  if(isset($_POST['rootEdit'])){
    $id=$_POST['id'];
    $acc=$_POST['acc'];
    $pw=$_POST['pw'];
    isset($_POST['p1'])?$p1=1:$p1=0;
    isset($_POST['p2'])?$p2=1:$p2=0;
    isset($_POST['p3'])?$p3=1:$p3=0;
    isset($_POST['p4'])?$p4=1:$p4=0;
    isset($_POST['p5'])?$p5=1:$p5=0; 
    $permit=$p1.$p2.$p3.$p4.$p5;
    $sql="update admin set acc='{$acc}',pw='{$pw}',permit='{$permit}' where id='{$id}'";
    $conn->query($sql);
  }
  $sql="select * from admin where id='{$_GET['id']}';";
  $row=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
  $permit=str_split($row['permit']);
?>
<form action="" method="post">
<table width="80%" border="0" align="center">
  <caption><h1>新增管理帳號</h1></caption>
  <tr>
    <td class="tt ct">帳號</td>
    <td class="pp"><input type="text" name="acc" value="<?=$row['acc']?>" required /></td>
  </tr>
  <tr>
    <td class="tt ct">密碼</td>
    <td class="pp"><input type="text" name="pw" value="<?=$row['pw']?>" required /></td>
  </tr>
  <tr>
    <td class="tt ct">權限</td>
    <td class="pp">
      <input type="checkbox" name="p1" <?=$permit[0]==1?'checked':''?> />商品分類與管理<br>
      <input type="checkbox" name="p2" <?=$permit[1]==1?'checked':''?> />訂單管理<br>
      <input type="checkbox" name="p3" <?=$permit[2]==1?'checked':''?> />會員管理<br>
      <input type="checkbox" name="p4" <?=$permit[3]==1?'checked':''?> />頁尾版權區管理<br>
      <input type="checkbox" name="p5" <?=$permit[4]==1?'checked':''?> />最新消息管理<br>
    </td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="rootEdit" id="button" value="修改" />
      <input type="reset" name="button2" id="button2" value="重置" /></td>
    </tr>
</table>
<input type="hidden" name="id" value="<?=$row['id']?>">
</form>
