<?php
if (!empty($_POST['reg'])) {
      $err = '';
      if (empty($_POST['acc']) || empty($_POST['pw']) || empty($_POST['chkpw']) || empty($_POST['mail'])) {
          $err = "不可空白";
          ?><script>alert('<?=$err?>');</script><?php
  }
      if ($err == '') {
          if ($_POST['pw'] != $_POST['chkpw']) {
              $err = "密碼不相同";
              ?><script>alert('<?=$err?>');</script><?php
  }
      }
      if ($err == '') {
          $sql = "select * from user where acc='{$_POST['acc']}'";
          $result = $conn->query($sql);
          if ($result->rowCount() > 0) {
              $err = "帳號重複";
              ?><script>alert('<?=$err?>');</script><?php
  }
      }
      if ($err == '') {
          $sql = "INSERT INTO user VALUES(null,'{$_POST['acc']}','{$_POST['pw']}','{$_POST['mail']}','1')";
          $result = $conn->query($sql);
          ?><script>alert('註冊完成，歡迎加入');</script><?php
  }
}
  if(isset($_POST['delapply'])){
    foreach($_POST['del'] as $del){
      $sql="DELETE FROM user WHERE id='{$del}'";
      $conn->query($sql);
    }    
  }
?>
<form action="" method="post">
<table width="80%" border="0" align="center">
  <tr>
    <td>帳號</td>
    <td>密碼</td>
    <td>刪除</td>
  </tr>
  <?php
  $sql="SELECT * FROM user ";
  $result = $conn->query($sql);
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
?>
  <tr>
    <td><?=$row['acc']?></td>
    <td><?=$row['pw']?></td>
    <td><input type="checkbox" name="del[]" value=<?=$row['id']?> /></td>
  </tr>
<?php
  }
  ?>

  <tr>
    <td colspan="3" align="center"><input type="submit" name="delapply" id="button" value="確定刪除" />
      <input type="reset" name="button2" id="button2" value="清空選取" /></td>
    </tr>
</table>
</form>
<h1>新增會員</h1>
<form action="" method="post">
<table width="80%" border="0" align="center">
  <tr>
    <td>* 請設定您要註冊的帳號及密碼 ( 最長 12 個字元 )</td>
  </tr>
  <tr>
    <td>Step1: 登入帳號
      <input type="text" name="acc" /></td>
  </tr>
  <tr>
    <td>Step2: 登入密碼
      <input type="text" name="pw"  /></td>
  </tr>
  <tr>
    <td>Step3: 再次確認密碼
      <input type="text" name="chkpw"  /></td>
  </tr>
  <tr>
    <td>Step:信箱忘記密碼時使用
      <input type="text" name="mail"  /></td>
  </tr>
  <tr>
    <td><input type="submit" name="reg" id="button" value="註冊" />
      <input type="reset" name="button2" id="button2" value="清除" /></td>
  </tr>
</table>

</form>
