<?php
  if(isset($_POST['edit_user'])){
    foreach($_POST as $key => $value){
      $$key = $value;
    }
    $sql="update user set name='{$name}',mail='{$mail}',addr='{$mail}',tel='{$tel}' where acc= '{$acc}'";
    $conn->query($sql);
  }
  if(!empty($_GET['acc'])){
    $sql="select * from user where acc='{$_GET['acc']}'";
    $row=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
  }
?>
<form action="" method="post">
<table width="80%" border="0" align="center">
<caption><h1>編輯會員資料</h1></caption>
  <tr>
    <td class="tt ct">會員帳號</td>
    <td class="pp"><?=$row['acc']?></td>
    <input type="hidden" name="acc" value="<?=$row['acc']?>">
  </tr>
  <tr>
    <td class="tt ct">密碼</td>
    <td class="pp"><?=$row['pw']?></td>
  </tr>
  <tr>
    <td class="tt ct">累計交易額</td>
    <td class="pp">999</td>
  </tr>
  <tr>
    <td class="tt ct">姓名</td>
    <td class="pp"><input type="text" name="name" value="<?=$row['name']?>"/></td>
  </tr>
  <tr>
    <td class="tt ct">電子信箱</td>
    <td class="pp"><input type="text" name="mail" value="<?=$row['mail']?>" /></td>
  </tr>
  <tr>
    <td class="tt ct">聯絡地址</td>
    <td class="pp"><input type="text" name="addr" value="<?=$row['addr']?>" /></td>
  </tr>
  <tr>
    <td class="tt ct">聯絡電話</td>
    <td class="pp"><input type="text" name="tel" value="<?=$row['tel']?>" /></td>
  </tr>
  <tr class="ct">
    <td colspan="2">
      <input type="submit" name="edit_user" id="button" value="編輯" />
      <input type="reset" name="button2" id="button2" value="重置" />
      <input type="button" value="取消" onclick="history.go(-1)"/>
    </td>
    </tr>
</table>

</form>
