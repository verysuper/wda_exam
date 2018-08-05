<?php
  if(isset($_POST['rootAdd'])){
    $acc=$_POST['acc'];
    $pw=$_POST['pw'];
    isset($_POST['p1'])?$p1=1:$p1=0;
    isset($_POST['p2'])?$p2=1:$p2=0;
    isset($_POST['p3'])?$p3=1:$p3=0;
    isset($_POST['p4'])?$p4=1:$p4=0;
    isset($_POST['p5'])?$p5=1:$p5=0; 
    $permit=$p1.$p2.$p3.$p4.$p5;
    $sql="insert into admin values(null,'{$acc}','{$pw}','{$permit}','1');";
    $conn->query($sql);
  }
?>
<form action="" method="post">
<table width="80%" border="0" align="center">
  <caption><h1>新增管理帳號</h1></caption>
  <tr>
    <td class="tt ct">帳號</td>
    <td class="pp"><input type="text" name="acc" required /></td>
  </tr>
  <tr>
    <td class="tt ct">密碼</td>
    <td class="pp"><input type="text" name="pw" required /></td>
  </tr>
  <tr>
    <td class="tt ct">權限</td>
    <td class="pp">
      <input type="checkbox" name="p1"  />商品分類與管理<br>
      <input type="checkbox" name="p2"  />訂單管理<br>
      <input type="checkbox" name="p3"  />會員管理<br>
      <input type="checkbox" name="p4"  />頁尾版權區管理<br>
      <input type="checkbox" name="p5"  />最新消息管理<br>
    </td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="rootAdd" id="button" value="新增" />
      <input type="reset" name="button2" id="button2" value="重置" /></td>
    </tr>
</table>
</form>
