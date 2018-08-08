<?php
  if(isset($_POST['register'])){
    foreach($_POST as $key => $value){
      $$key = $value;
    }
    $created= date('Y/m/d',time());
    $sql="insert into user values (null,'{$name}','{$acc}','{$pw}','{$tel}','{$addr}','{$mail}','{$created}')";
    $conn->query($sql);
  }
?>
<form action="" method="post">
<table width="80%" border="0" align="center">
  <caption><h1>註冊帳號</h1></caption>
  <tr>
    <td class="tt ct">姓名</td>
    <td class="pp"><input type="text" name="name" required /></td>
  </tr>
  <tr>
    <td class="tt ct">帳號</td>
    <td class="pp"><input type="text" name="acc" id="acc" required/>
      <input type="button" value="檢查帳號" onclick="chkexist_api()"/></td>
  </tr>
  <tr>
    <td class="tt ct">密碼</td>
    <td class="pp"><input type="text" name="pw" required /></td>
  </tr>
  <tr>
    <td class="tt ct">電話</td>
    <td class="pp"><input type="text" name="tel" required /></td>
  </tr>
  <tr>
    <td class="tt ct">住址</td>
    <td class="pp"><input type="text" name="addr" required /></td>
  </tr>
  <tr>
    <td class="tt ct">電子信箱</td>
    <td class="pp"><input type="text" name="mail" required /></td>
  </tr>
  <tr>
    <td colspan="2" class="ct"><input type="submit" name="register" id="button2" value="註冊" />
      <input type="reset" name="button3" id="button3" value="重置" /></td>
    </tr>
</table>

</form>
<script>
  function chkexist_api(){
    var acc=$("#acc").val();
    $.post('api.php',{'do':'chkexist_api',acc},function(aa){
      alert(aa);
    });
  }
</script>
