<?php   
  if(isset($_POST['action']) && $_POST['action']=='reg'){
    $err='';
    if(empty($_POST['acc']) || empty($_POST['ps']) || empty($_POST['psCheck']) || empty($_POST['mail'])){
      $err="不可以空白";
      ?><script>alert('<?=$err?>');</script><?php
    }
    if($err==''){
      if($_POST['ps']!=$_POST['psCheck']){
        $err="密碼不相同";
        ?><script>alert('<?=$err?>');</script><?php
      }
    }
    if($err==''){
      $sql="select * from user where acc='{$_POST['acc']}'";
      $resule=$conn->query($sql);
      if($resule->rowCount()>0){
        $err="帳號重複";
        ?><script>alert('<?=$err?>');</script><?php
      }
    }
    if($err==''){
      $sql="insert into user values(null,'{$_POST['acc']}','{$_POST['ps']}','{$_POST['mail']}','1')";
      $resule=$conn->query($sql);
      ?><script>alert("註冊完成，歡迎加入");document.location.href="?do=login"</script><?php
    }
  }
?>
<fieldset><legend>會員註冊</legend>
<form action="" method="post">
<table width="500" border="0">
  <tr>
    <td colspan="2">*請設定您要註冊的帳號及密碼(最長12個字元)</td>
    </tr>
  <tr>
    <td>Step1:登入帳號</td>
    <td><input type="text" name="acc"></td>
  </tr>
  <tr>
    <td>Step2:登入密碼</td>
    <td><input type="text" name="ps"></td>
  </tr>
  <tr>
    <td>Step3:再次確認密碼</td>
    <td><input type="text" name="psCheck"></td>
  </tr>
  <tr>
    <td>Step4:信箱(忘記密碼時使用)</td>
    <td><input type="text" name="mail"></td>
  </tr>
  <tr>
    <td>
    	<input type="submit" value="註冊">
      	<input type="reset" value="清除">
    </td>
    <td>&nbsp;</td>
  </tr>
</table>
<input type="hidden" name="action" value="reg">
</form>
</fieldset>
