<?php
if (isset($_POST['action']) && $_POST['action'] == 'aaccReg') {
    $err = '';
    if (empty($_POST['acc']) || empty($_POST['ps']) || empty($_POST['psCheck']) || empty($_POST['mail'])) {
        $err = "不可以空白";
        ?><script>alert('<?=$err?>');</script><?php
}
    if ($err == '') {
        if ($_POST['ps'] != $_POST['psCheck']) {
            $err = "密碼不相同";
            ?><script>alert('<?=$err?>');</script><?php
}
    }
    if ($err == '') {
        $sql = "select * from user where acc='{$_POST['acc']}'";
        $resule = $conn->query($sql);
        if ($resule->rowCount() > 0) {
            $err = "帳號重複";
            ?><script>alert('<?=$err?>');</script><?php
}
    }
    if ($err == '') {
        $sql = "insert into user values(null,'{$_POST['acc']}','{$_POST['ps']}','{$_POST['mail']}','1')";
        $resule = $conn->query($sql);
        ?><script>alert("註冊完成，歡迎加入");//document.location.href="?do=login"</script><?php
}
}
if (isset($_POST['action']) && $_POST['action'] == 'aaccDelete') {
  if(!empty($_POST['del'])){
    for($i=0;$i<count($_POST['del']);$i++){
      $sql = "delete from user where id='{$_POST['del'][$i]}'";
      $resule = $conn->query($sql); 
    }
  }  
}
?>
<fieldset><legend>帳號管理</legend>
<form action="" method="post">
<table width="100%" border="0" style="text-align:center;">
  <tr bgcolor="#CCCCCC">
    <td>帳號</td>
    <td>密碼</td>
    <td>刪除</td>
  </tr>
  <?php 
  $sql = "select * from user";
  $resule = $conn->query($sql);
  while($row=$resule->fetch(PDO::FETCH_ASSOC)){
  ?>
  <tr>
    <td><?=$row['acc']?></td>
    <td><?=$row['ps']?></td>
    <td><input type="checkbox" name="del[]" value="<?=$row['id']?>" /></td>
  </tr>
  <?php }?>
  <tr>
    <td colspan="3">
    <input value="確定刪除" type="submit" />
    <input value="清空選取" type="reset" />
    </td>
    </tr>
</table>
<input type="hidden" name="action" value="aaccDelete">
</form>
<form action="" method="post">
<table width="100%" border="0">
<caption><h1 align='left'>新增會員</h1></caption>
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
    	<input type="submit" value="新增">
      	<input type="reset" value="清除">
    </td>
    <td>&nbsp;</td>
  </tr>
</table>
<input type="hidden" name="action" value="aaccReg">
</form>
</fieldset>
